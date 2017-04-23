<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Settings controller
 */
class Settings extends Admin_Controller
{
    protected $permissionCreate = 'Q_and_a.Settings.Create';
    protected $permissionDelete = 'Q_and_a.Settings.Delete';
    protected $permissionEdit   = 'Q_and_a.Settings.Edit';
    protected $permissionView   = 'Q_and_a.Settings.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->load->model('q_and_a/q_and_a_model');
        $this->lang->load('q_and_a');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
        Template::set_block('sub_nav', 'settings/_sub_nav');

        Assets::add_module_js('q_and_a', 'q_and_a.js');
    }

    /**
     * Display a list of q and a data.
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
                    $deleted = $this->q_and_a_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('q_and_a_delete_success'), 'success');
                } else {
                    Template::set_message(lang('q_and_a_delete_failure') . $this->q_and_a_model->error, 'error');
                }
            }
        }
        
        
        
        $records = $this->q_and_a_model->find_all();

        Template::set('records', $records);
        
    Template::set('toolbar_title', lang('q_and_a_manage'));

        Template::render();
    }
    
    /**
     * Create a q and a object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);
        
        if (isset($_POST['save'])) {
            if ($insert_id = $this->save_q_and_a()) {
                log_activity($this->auth->user_id(), lang('q_and_a_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'q_and_a');
                Template::set_message(lang('q_and_a_create_success'), 'success');

                redirect(SITE_AREA . '/settings/q_and_a');
            }

            // Not validation error
            if ( ! empty($this->q_and_a_model->error)) {
                Template::set_message(lang('q_and_a_create_failure') . $this->q_and_a_model->error, 'error');
            }
        }

        Template::set('toolbar_title', lang('q_and_a_action_create'));

        Template::render();
    }
    /**
     * Allows editing of q and a data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('q_and_a_invalid_id'), 'error');

            redirect(SITE_AREA . '/settings/q_and_a');
        }
        
        if (isset($_POST['save'])) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_q_and_a('update', $id)) {
                log_activity($this->auth->user_id(), lang('q_and_a_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'q_and_a');
                Template::set_message(lang('q_and_a_edit_success'), 'success');
                redirect(SITE_AREA . '/settings/q_and_a');
            }

            // Not validation error
            if ( ! empty($this->q_and_a_model->error)) {
                Template::set_message(lang('q_and_a_edit_failure') . $this->q_and_a_model->error, 'error');
            }
        }
        
        elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->q_and_a_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('q_and_a_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'q_and_a');
                Template::set_message(lang('q_and_a_delete_success'), 'success');

                redirect(SITE_AREA . '/settings/q_and_a');
            }

            Template::set_message(lang('q_and_a_delete_failure') . $this->q_and_a_model->error, 'error');
        }
        
        Template::set('q_and_a', $this->q_and_a_model->find($id));

        Template::set('toolbar_title', lang('q_and_a_edit_heading'));
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
    private function save_q_and_a($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['q_and_a_id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->q_and_a_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want
        
        $data = $this->q_and_a_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method
        
		$data['created_on']	= $this->input->post('created_on') ? $this->input->post('created_on') : '0000-00-00 00:00:00';
		$data['modified_on']	= $this->input->post('modified_on') ? $this->input->post('modified_on') : '0000-00-00 00:00:00';

        $return = false;
        if ($type == 'insert') {
            $id = $this->q_and_a_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->q_and_a_model->update($id, $data);
        }

        return $return;
    }
}