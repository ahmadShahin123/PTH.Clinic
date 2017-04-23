<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Symptoms controller
 */
class Symptoms extends Front_Controller
{
    protected $permissionCreate = 'Symptoms.Symptoms.Create';
    protected $permissionDelete = 'Symptoms.Symptoms.Delete';
    protected $permissionEdit   = 'Symptoms.Symptoms.Edit';
    protected $permissionView   = 'Symptoms.Symptoms.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('symptoms/symptoms_model');
        $this->lang->load('symptoms');
        
            Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
            Assets::add_js('jquery-ui-1.8.13.min.js');
            Assets::add_css('jquery-ui-timepicker.css');
            Assets::add_js('jquery-ui-timepicker-addon.js');
        

        Assets::add_module_js('symptoms', 'symptoms.js');
    }

    /**
     * Display a list of symptoms data.
     *
     * @return void
     */
    public function index($offset = 0)
    {
        
        $pagerUriSegment = 3;
        $pagerBaseUrl = site_url('symptoms/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->symptoms_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->symptoms_model->limit($limit, $offset);
        

        // Don't display soft-deleted records
        $this->symptoms_model->where($this->symptoms_model->get_deleted_field(), 0);
        $records = $this->symptoms_model->find_all();

        Template::set('records', $records);
        

        Template::render();
    }
    
}