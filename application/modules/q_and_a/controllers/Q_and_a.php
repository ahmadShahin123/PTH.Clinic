<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Q_and_a controller
 */
class Q_and_a extends Front_Controller
{
    protected $permissionCreate = 'Q_and_a.Q_and_a.Create';
    protected $permissionDelete = 'Q_and_a.Q_and_a.Delete';
    protected $permissionEdit   = 'Q_and_a.Q_and_a.Edit';
    protected $permissionView   = 'Q_and_a.Q_and_a.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('q_and_a/q_and_a_model');
        $this->lang->load('q_and_a');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
        

        Assets::add_module_js('q_and_a', 'q_and_a.js');
    }

    /**
     * Display a list of q and a data.
     *
     * @return void
     */
    public function index()
    {
        
        
        
        

        // Don't display soft-deleted records
        $this->q_and_a_model->where($this->q_and_a_model->get_deleted_field(), 0);
        $records = $this->q_and_a_model->find_all();

        Template::set('records', $records);
        

        Template::render();
    }
    public function qa() {
        Template::render('qa');
    }
    
}