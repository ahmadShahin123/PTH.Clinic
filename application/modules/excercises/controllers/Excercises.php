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
    public function bmi() {
        if(isset($_POST['bmisubmit'])) {
            $_POST['bmi'] = $_POST['weight'] / round(pow($_POST['height'], 2), 1);
        }
        Template::render('bmi');
    }
    
    public function excercises_frontend() {
        $query1 = $this->db->query("select * from bf_exc_cats where parent = 0");
        $query2 = $this->db->query("select * from bf_exc_cats where parent <> 0");

        $parents = $query1->result();
        $children = $query2->result();
        Template::set('parents', $parents);
        Template::set('children', $children);
        $section = $this->uri->segment(3);
        $query = $this->db->query("select * from bf_excercises where deleted = 0 && section LIKE '%$section%'");
        $excercises = $query->result();
        $query3 = $this->db->query("select * from bf_exc_cats where cat_id = $section");
        $sec_name = $query3->result();
        Template::set('section_name', $sec_name);
        Template::set('excercises', $excercises);
         Template::render('excercises_frontend');
    }

    public function excercises_inner() {
        $exc_id = $this->uri->segment(3);
        $query = $this->db->query("select * from `bf_excercises` where exc_id = $exc_id");
        $excercise = $query->result();
        Template::set('excercise', $excercise);
        Template::render('excercises_inner');
    }
    
}