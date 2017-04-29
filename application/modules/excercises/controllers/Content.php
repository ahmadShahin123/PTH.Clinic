<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Content extends Admin_Controller
{
    protected $permissionCreate = 'Excercises.Content.Create';
    protected $permissionDelete = 'Excercises.Content.Delete';
    protected $permissionEdit   = 'Excercises.Content.Edit';
    protected $permissionView   = 'Excercises.Content.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->load->model('excercises/excercises_model');
        $this->lang->load('excercises');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
        Template::set_block('sub_nav', 'content/_sub_nav');

        Assets::add_module_js('excercises', 'excercises.js');
    }

    /**
     * Display a list of excercises data.
     *
     * @return void
     */
    public function index($offset = 0)
    {
        // Deleting anything?
        if (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);
            $checked = $this->input->post('checked');
            if (is_array($checked) && count($checked)) {

                // If any of the deletions fail, set the result to false, so
                // failure message is set if any of the attempts fail, not just
                // the last attempt

                $result = true;
                foreach ($checked as $pid) {
                    $deleted = $this->excercises_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('excercises_delete_success'), 'success');
                } else {
                    Template::set_message(lang('excercises_delete_failure') . $this->excercises_model->error, 'error');
                }
            }
        }
        $pagerUriSegment = 5;
        $pagerBaseUrl = site_url(SITE_AREA . '/content/excercises/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->excercises_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->excercises_model->limit($limit, $offset);
        $query = $this->db->query("select e.*, c.cat_name FROM bf_excercises e join bf_exc_cats c on c.cat_id = e.section and e.deleted = 0");
        $records = $query->result();
        //$records = $this->excercises_model->find_all_by('deleted', 0);

        Template::set('records', $records);
        
    Template::set('toolbar_title', lang('excercises_manage'));

        Template::render();
    }
    
    /**
     * Create a excercises object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);
        
        if (isset($_POST['save'])) {
            $sections = implode(', ', $_POST['section']);
            $_POST['section'] = $sections;
            if ($insert_id = $this->save_excercises()) {
                log_activity($this->auth->user_id(), lang('excercises_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'excercises');
                Template::set_message(lang('excercises_create_success'), 'success');

                redirect(SITE_AREA . '/content/excercises');
            }

            // Not validation error
            if ( ! empty($this->excercises_model->error)) {
                Template::set_message(lang('excercises_create_failure') . $this->excercises_model->error, 'error');
            }
        }
        $query = $this->db->query("select * from bf_exc_cats");
        $cats = $query->result();
        Template::set('cats', $cats);

        Template::set('toolbar_title', lang('excercises_action_create'));

        Template::render();
    }
    /**
     * Allows editing of excercises data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('excercises_invalid_id'), 'error');

            redirect(SITE_AREA . '/content/excercises');
        }
        
        if (isset($_POST['save'])) {
            $sections = implode(', ', $_POST['section']);
            $_POST['section'] = $sections;

            $this->auth->restrict($this->permissionEdit);

            if ($this->save_excercises('update', $id)) {
                log_activity($this->auth->user_id(), lang('excercises_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'excercises');
                Template::set_message(lang('excercises_edit_success'), 'success');
                redirect(SITE_AREA . '/content/excercises');
            }

            // Not validation error
            if ( ! empty($this->excercises_model->error)) {
                Template::set_message(lang('excercises_edit_failure') . $this->excercises_model->error, 'error');
            }
        }
        
        elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->excercises_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('excercises_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'excercises');
                Template::set_message(lang('excercises_delete_success'), 'success');

                redirect(SITE_AREA . '/content/excercises');
            }

            Template::set_message(lang('excercises_delete_failure') . $this->excercises_model->error, 'error');
        }
        $query = $this->db->query("select * from bf_exc_cats where link <> ''");
        $cats = $query->result();
        Template::set('cats', $cats);
        Template::set('excercises', $this->excercises_model->find($id));

        Template::set('toolbar_title', lang('excercises_edit_heading'));
        Template::render();
    }

    //--------------------------------------------------------------------------
    // !PRIVATE METHODS
    //--------------------------------------------------------------------------

    /**
     * Save the data.
     *
     * @param string $type Either 'insert' or 'update'.
     * @param int    $id   The ID of the record to update, ignored on inserts.
     *
     * @return boolean|integer An ID for successful inserts, true for successful
     * updates, else false.
     */
    private function save_excercises($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['exc_id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->excercises_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want
        
        $data = $this->excercises_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method
        
		$data['created_on']	= $this->input->post('created_on') ? $this->input->post('created_on') : '0000-00-00 00:00:00';
		$data['modified_on']	= $this->input->post('modified_on') ? $this->input->post('modified_on') : '0000-00-00 00:00:00';

        $return = false;
        if ($type == 'insert') {
            $id = $this->excercises_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->excercises_model->update($id, $data);
        }

        return $return;
    }
}