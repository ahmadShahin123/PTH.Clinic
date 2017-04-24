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
        $query1 = $this->db->query("select * from bf_categories where parent = 0");
        $query2 = $this->db->query("select * from bf_categories where parent <> 0");

        $parents = $query1->result();
        $children = $query2->result();
        Template::set('parents', $parents);
        Template::set('children', $children);
        $cat_id = $this->uri->segment(3);
        $query3 = $this->db->query("select * from bf_q_and_a where cat_id = $cat_id and deleted = 0 order by q_and_a_id DESC");
        $questions = $query3->result();
        Template::set('questions', $questions);
        Template::render('qa');
    }

    public function answer() {
        $id = $this->uri->segment(3);
        $query1 = $this->db->query("select * from bf_categories where parent = 0");
        $query2 = $this->db->query("select * from bf_categories where parent <> 0");
        $query3 = $this->db->query("select * from bf_q_and_a where q_and_a_id = $id");
        $parents = $query1->result();
        $children = $query2->result();
        $answer = $query3->result();
        Template::set('answer', $answer);
        Template::set('parents', $parents);
        Template::set('children', $children);
        Template::render('answer');
    }

    public function ask() {
        $query3 = $this->db->query("select * from bf_categories where parent = 0");
        $query2 = $this->db->query("select * from bf_categories where parent <> 0");
        $parents = $query3->result();
        $children = $query2->result();
        Template::set('parents', $parents);
        Template::set('children', $children);
        $query = $this->db->query("select * from bf_categories where parent <> 0");
        $query1 = $this->db->query("select * from bf_categories where link <> '' and parent = 0");
        $child = $query->result();
        $parent = $query1->result();
        foreach ($child as $key=>$children){
            $cats[$children->cat_id] = $children->cat_name;
        }
        foreach ($parent as $key=>$parents){
            $cats[$parents->cat_id] = $parents->cat_name;
        }
        if(isset($_POST['send'])) {
            $user_id = $this->uri->segment(3);
            $cat_id = $_POST['cat'];
            $question = $_POST['question'];
            $this->db->query("insert into `bf_q_and_a` (cat_id, question, asked_by) VALUES ($cat_id, '$question', $user_id)");
            redirect(site_url() . '/q_and_a/qa/' . $cat_id);
        }
        Template::set('cats', $cats);
        Template::render('ask');
    }

    public function myqa() {
        $user_id = $this->uri->segment(3);
        $query = $this->db->query("select * from bf_q_and_a where asked_by = $user_id and deleted = 0");
        $questions = $query->result();

        $query1 = $this->db->query("select * from bf_categories where parent = 0");
        $query2 = $this->db->query("select * from bf_categories where parent <> 0");
        $parents = $query1->result();
        $children = $query2->result();

        Template::set('parents', $parents);
        Template::set('children', $children);
        Template::set('questions', $questions);
        Template::render('myqa');
    }
}