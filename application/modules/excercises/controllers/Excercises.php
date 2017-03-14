<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Excercises controller
 */
class Excercises extends Front_Controller
{
    protected $permissionCreate = 'Excercises.Excercises.Create';
    protected $permissionDelete = 'Excercises.Excercises.Delete';
    protected $permissionEdit   = 'Excercises.Excercises.Edit';
    protected $permissionView   = 'Excercises.Excercises.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('excercises/excercises_model');
        $this->lang->load('excercises');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
        

        Assets::add_module_js('excercises', 'excercises.js');
    }

    /**
     * Display a list of excercises data.
     *
     * @return void
     */
    public function index($offset = 0)
    {
        
        $pagerUriSegment = 3;
        $pagerBaseUrl = site_url('excercises/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->excercises_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->excercises_model->limit($limit, $offset);
        

        // Don't display soft-deleted records
        $this->excercises_model->where($this->excercises_model->get_deleted_field(), 0);
        $records = $this->excercises_model->find_all();

        Template::set('records', $records);
        

        Template::render();
    }
    
}