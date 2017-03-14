<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Developer controller
 */
class Developer extends Admin_Controller
{
    protected $permissionCreate = 'Excerc.Developer.Create';
    protected $permissionDelete = 'Excerc.Developer.Delete';
    protected $permissionEdit   = 'Excerc.Developer.Edit';
    protected $permissionView   = 'Excerc.Developer.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->lang->load('excerc');
        
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
        Template::set_block('sub_nav', 'developer/_sub_nav');

        Assets::add_module_js('excerc', 'excerc.js');
    }

    /**
     * Display a list of excerc data.
     *
     * @return void
     */
    public function index()
    {
        
        
        
        
        
    Template::set('toolbar_title', lang('excerc_manage'));

        Template::render();
    }
    
    /**
     * Create a excerc object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);
        

        Template::set('toolbar_title', lang('excerc_action_create'));

        Template::render();
    }
    /**
     * Allows editing of excerc data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('excerc_invalid_id'), 'error');

            redirect(SITE_AREA . '/developer/excerc');
        }
        
        
        

        Template::set('toolbar_title', lang('excerc_edit_heading'));
        Template::render();
    }
}