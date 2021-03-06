<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Reports controller
 */
class Reports extends Admin_Controller
{
    protected $permissionCreate = 'Symptoms.Reports.Create';
    protected $permissionDelete = 'Symptoms.Reports.Delete';
    protected $permissionEdit   = 'Symptoms.Reports.Edit';
    protected $permissionView   = 'Symptoms.Reports.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->load->model('symptoms/symptoms_model');
        $this->lang->load('symptoms');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
        Template::set_block('sub_nav', 'reports/_sub_nav');

        Assets::add_module_js('symptoms', 'symptoms.js');
    }

    /**
     * Display a list of symptoms data.
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
                    $deleted = $this->symptoms_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('symptoms_delete_success'), 'success');
                } else {
                    Template::set_message(lang('symptoms_delete_failure') . $this->symptoms_model->error, 'error');
                }
            }
        }
        $pagerUriSegment = 5;
        $pagerBaseUrl = site_url(SITE_AREA . '/reports/symptoms/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->symptoms_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->symptoms_model->limit($limit, $offset);
        
        $records = $this->symptoms_model->find_all();

        Template::set('records', $records);
        
    Template::set('toolbar_title', lang('symptoms_manage'));

        Template::render();
    }
    
    /**
     * Create a symptoms object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);
        
        if (isset($_POST['save'])) {
            if ($insert_id = $this->save_symptoms()) {
                log_activity($this->auth->user_id(), lang('symptoms_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'symptoms');
                Template::set_message(lang('symptoms_create_success'), 'success');

                redirect(SITE_AREA . '/reports/symptoms');
            }

            // Not validation error
            if ( ! empty($this->symptoms_model->error)) {
                Template::set_message(lang('symptoms_create_failure') . $this->symptoms_model->error, 'error');
            }
        }

        Template::set('toolbar_title', lang('symptoms_action_create'));

        Template::render();
    }
    /**
     * Allows editing of symptoms data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('symptoms_invalid_id'), 'error');

            redirect(SITE_AREA . '/reports/symptoms');
        }
        
        if (isset($_POST['save'])) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_symptoms('update', $id)) {
                log_activity($this->auth->user_id(), lang('symptoms_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'symptoms');
                Template::set_message(lang('symptoms_edit_success'), 'success');
                redirect(SITE_AREA . '/reports/symptoms');
            }

            // Not validation error
            if ( ! empty($this->symptoms_model->error)) {
                Template::set_message(lang('symptoms_edit_failure') . $this->symptoms_model->error, 'error');
            }
        }
        
        elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->symptoms_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('symptoms_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'symptoms');
                Template::set_message(lang('symptoms_delete_success'), 'success');

                redirect(SITE_AREA . '/reports/symptoms');
            }

            Template::set_message(lang('symptoms_delete_failure') . $this->symptoms_model->error, 'error');
        }
        
        Template::set('symptoms', $this->symptoms_model->find($id));

        Template::set('toolbar_title', lang('symptoms_edit_heading'));
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
    private function save_symptoms($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->symptoms_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want
        
        $data = $this->symptoms_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method
        
		$data['modified_on']	= $this->input->post('modified_on') ? $this->input->post('modified_on') : '0000-00-00 00:00:00';

        $return = false;
        if ($type == 'insert') {
            $id = $this->symptoms_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->symptoms_model->update($id, $data);
        }

        return $return;
    }
}