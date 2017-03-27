<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Content extends Admin_Controller
{
    protected $permissionCreate = 'Articles.Content.Create';
    protected $permissionDelete = 'Articles.Content.Delete';
    protected $permissionEdit   = 'Articles.Content.Edit';
    protected $permissionView   = 'Articles.Content.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->load->model('articles/articles_model');
        $this->lang->load('articles');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");

        $config['encrypt_name'] = TRUE;
        $config['upload_path'] ='./assets/images';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        
        Template::set_block('sub_nav', 'content/_sub_nav');

        Assets::add_module_js('articles', 'articles.js');
    }

    /**
     * Display a list of articles data.
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
                    $deleted = $this->articles_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('articles_delete_success'), 'success');
                } else {
                    Template::set_message(lang('articles_delete_failure') . $this->articles_model->error, 'error');
                }
            }
        }
        $pagerUriSegment = 5;
        $pagerBaseUrl = site_url(SITE_AREA . '/content/articles/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->articles_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->articles_model->limit($limit, $offset);
        
        $records = $this->articles_model->find_all();

        Template::set('records', $records);
        
    Template::set('toolbar_title', lang('articles_manage'));

        Template::render();
    }
    
       
   
    
    
    
    
    /**
     * Create a articles object.
     *
     * @return void
     */
    public function create()
    {


        $this->auth->restrict($this->permissionCreate);
        
        if (isset($_POST['save'])) {
            $this->upload->do_upload('image');
            $upload_data =$this->upload->data();
            $file_name = $upload_data['file_name'];
            $_POST['image'] = $file_name;
            if ($insert_id = $this->save_articles()) {
                log_activity($this->auth->user_id(), lang('articles_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'articles');
                Template::set_message(lang('articles_create_success'), 'success');

                redirect(SITE_AREA . '/content/articles');
            }

            // Not validation error
            if ( ! empty($this->articles_model->error)) {
                Template::set_message(lang('articles_create_failure') . $this->articles_model->error, 'error');
            }
        }

        Template::set('toolbar_title', lang('articles_action_create'));

        Template::render();
    }
    /**
     * Allows editing of articles data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('articles_invalid_id'), 'error');

            redirect(SITE_AREA . '/content/articles');
        }

        if (isset($_POST['save'])) {
echo 'test';
            if (isset($_POST['image']['name']) && $_POST['image']['name'] != '') {
            $this->upload->do_upload('image');
            $upload_data =$this->upload->data();
                echo $this->upload->display_errors();
                echo 'test';
            $file_name = $upload_data['file_name'];


            $_POST['image'] = $file_name;
            }
            else {
                $_POST['image'] = $_POST['image-old'];
            }

            $this->auth->restrict($this->permissionEdit);

            if ($this->save_articles('update', $id)) {
                log_activity($this->auth->user_id(), lang('articles_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'articles');
                Template::set_message(lang('articles_edit_success'), 'success');
                redirect(SITE_AREA . '/content/articles');
            }

            // Not validation error
            if ( ! empty($this->articles_model->error)) {
                Template::set_message(lang('articles_edit_failure') . $this->articles_model->error, 'error');
            }
        }
        
        elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->articles_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('articles_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'articles');
                Template::set_message(lang('articles_delete_success'), 'success');

                redirect(SITE_AREA . '/content/articles');
            }

            Template::set_message(lang('articles_delete_failure') . $this->articles_model->error, 'error');
        }
        
        Template::set('articles', $this->articles_model->find($id));

        Template::set('toolbar_title', lang('articles_edit_heading'));
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
    private function save_articles($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['article_id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->articles_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want
        
        $data = $this->articles_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method
        
		$data['created_on']	= $this->input->post('created_on') ? $this->input->post('created_on') : '0000-00-00 00:00:00';
		$data['modified_on']	= $this->input->post('modified_on') ? $this->input->post('modified_on') : '0000-00-00 00:00:00';

        $return = false;
        if ($type == 'insert') {
            $id = $this->articles_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->articles_model->update($id, $data);
        }

        return $return;
    }
}