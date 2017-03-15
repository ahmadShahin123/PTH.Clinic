<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Settings controller
 */
class Settings extends Admin_Controller
{
    protected $permissionCreate = 'Regular_user.Settings.Create';
    protected $permissionDelete = 'Regular_user.Settings.Delete';
    protected $permissionEdit   = 'Regular_user.Settings.Edit';
    protected $permissionView   = 'Regular_user.Settings.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->load->model('regular_user/regular_user_model');
        $this->lang->load('regular_user');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
        Template::set_block('sub_nav', 'settings/_sub_nav');

        Assets::add_module_js('regular_user', 'regular_user.js');
    }

    /**
     * Display a list of regular user data.
     *
     * @return void
     */
    public function index()
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
                    $deleted = $this->regular_user_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('regular_user_delete_success'), 'success');
                } else {
                    Template::set_message(lang('regular_user_delete_failure') . $this->regular_user_model->error, 'error');
                }
            }
        }
        
        
        
        $records = $this->regular_user_model->find_all();

        Template::set('records', $records);
        
    Template::set('toolbar_title', lang('regular_user_manage'));

        Template::render();
    }
    
    /**
     * Create a regular user object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);
        
        if (isset($_POST['save'])) {
            if ($insert_id = $this->save_regular_user()) {
                log_activity($this->auth->user_id(), lang('regular_user_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'regular_user');
                Template::set_message(lang('regular_user_create_success'), 'success');

                redirect(SITE_AREA . '/settings/regular_user');
            }

            // Not validation error
            if ( ! empty($this->regular_user_model->error)) {
                Template::set_message(lang('regular_user_create_failure') . $this->regular_user_model->error, 'error');
            }
        }

        Template::set('toolbar_title', lang('regular_user_action_create'));

        Template::render();
    }
    /**
     * Allows editing of regular user data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('regular_user_invalid_id'), 'error');

            redirect(SITE_AREA . '/settings/regular_user');
        }
        
        if (isset($_POST['save'])) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_regular_user('update', $id)) {
                log_activity($this->auth->user_id(), lang('regular_user_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'regular_user');
                Template::set_message(lang('regular_user_edit_success'), 'success');
                redirect(SITE_AREA . '/settings/regular_user');
            }

            // Not validation error
            if ( ! empty($this->regular_user_model->error)) {
                Template::set_message(lang('regular_user_edit_failure') . $this->regular_user_model->error, 'error');
            }
        }
        
        elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->regular_user_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('regular_user_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'regular_user');
                Template::set_message(lang('regular_user_delete_success'), 'success');

                redirect(SITE_AREA . '/settings/regular_user');
            }

            Template::set_message(lang('regular_user_delete_failure') . $this->regular_user_model->error, 'error');
        }
        
        Template::set('regular_user', $this->regular_user_model->find($id));

        Template::set('toolbar_title', lang('regular_user_edit_heading'));
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
    private function save_regular_user($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['reg_user_id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->regular_user_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want
        
        $data = $this->regular_user_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method
        
		$data['created_on']	= $this->input->post('created_on') ? $this->input->post('created_on') : '0000-00-00 00:00:00';
		$data['modified_on']	= $this->input->post('modified_on') ? $this->input->post('modified_on') : '0000-00-00 00:00:00';

        $return = false;
        if ($type == 'insert') {
            $id = $this->regular_user_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->regular_user_model->update($id, $data);
        }

        return $return;
    }
}