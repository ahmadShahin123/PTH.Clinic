<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Regular_user controller
 */
class Regular_user extends Front_Controller
{
    protected $permissionCreate = 'Regular_user.Regular_user.Create';
    protected $permissionDelete = 'Regular_user.Regular_user.Delete';
    protected $permissionEdit   = 'Regular_user.Regular_user.Edit';
    protected $permissionView   = 'Regular_user.Regular_user.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('regular_user/regular_user_model');
        $this->lang->load('regular_user');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
        

        Assets::add_module_js('regular_user', 'regular_user.js');
    }

    /**
     * Display a list of regular user data.
     *
     * @return void
     */
    public function index()
    {
        
        
        
        

        // Don't display soft-deleted records
        $this->regular_user_model->where($this->regular_user_model->get_deleted_field(), 0);
        $records = $this->regular_user_model->find_all();

        Template::set('records', $records);
        

        Template::render();
    }
    
}