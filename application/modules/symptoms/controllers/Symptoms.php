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
    public function sympt() {
        $query = $this->db->query("select DISTINCT level0 from bf_symptoms where deleted = 0");
        $symp = $query->result();
        $level = 0;
        Template::set('symps', $symp);
        Template::set('level', $level);

        if(isset($_POST['send'])) {
            $level_old = $this->uri->segment(3);
            $level_new = $level_old + 1;
            $column_old = 'level' . $level_old;
            $column_new = 'level' . $level_new;
            $symptom = $_POST['level'];
            if($level_new >= 6) {
                $query2 = $this->db->query("select * from bf_symptoms where $column_old = '$symptom'");
                $illnesses = $query2->result();
                Template::set('illnesses', $illnesses);
                Template::render('symptoms');
            }
            $query1 = $this->db->query("select DISTINCT $column_new from `bf_symptoms` where $column_old = '$symptom'");
            $symps = $query1->result();
            foreach ($symps as $key=>$symp) {
                if($symp->$column_new == NULL) {
                    $query3 = $this->db->query("select * from bf_symptoms where $column_old = '$symptom'");
                    $illnesses = $query3->result();
                    Template::set('illnesses', $illnesses);
                    Template::render('symptoms');
                }
            }
            Template::set('symps', $symps);
            Template::set('level', $level_new);
        }
        Template::render('symptoms');
    }
    
}