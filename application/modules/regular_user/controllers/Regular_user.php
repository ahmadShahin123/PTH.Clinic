<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Regular_user controller
 */
class Regular_user extends Front_Controller
{
    protected $permissionCreate = 'Regular_user.Regular_user.Create';
    protected $permissionDelete = 'Regular_user.Regular_user.Delete';
    protected $permissionEdit = 'Regular_user.Regular_user.Edit';
    protected $permissionView = 'Regular_user.Regular_user.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        //$this->load->model('regular_user/regular_user_model');
       // $this->lang->load('regular_user');

        Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
        Assets::add_js('jquery-ui-1.8.13.min.js');
        Assets::add_css('jquery-ui-timepicker.css');
        Assets::add_js('jquery-ui-timepicker-addon.js');
        $config['encrypt_name'] = TRUE;
        $config['upload_path'] ='./assets/images';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->load->library('form');
        $this->load->library('session');
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

    public function signup()
    {

        if (isset($_POST['create'])) {
            $first_name =  $_POST['first_name'];
            $last_name =  $_POST['last_name'];
            $password = $_POST['password'];
            $email =  $_POST['email'];
            $this->form_validation->set_rules('password', 'Password', 'min_length[8]',  array('min_length' => 'كلمة المرور يجب ان تتكون من ثمانية رموز او اكثر.'));
           // $this->form_validation->set_rules('first_name', 'First Name', 'alpha');
            //$this->form_validation->set_rules('last_name', 'Last Name', 'alpha');
            $this->form_validation->set_rules('email', 'Email', 'is_unique[bf_reg_user.email]', array('is_unique' => 'البريد الالكتروني مستخدم مسبقا.'));
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('valid_error', validation_errors());
                redirect(base_url() . 'index.php/regular_user/signUp');
            }

                $password = password_hash($password, PASSWORD_DEFAULT);




            $this->db->query("INSERT INTO `bf_reg_user` (first_name, last_name, email, password)
                              VALUES ('$first_name', '$last_name', '$email', '$password')");

            redirect(base_url() . 'index.php');
        }
        Template::render('signUp');

    }

    public function signIn() {
        if(isset($_POST['signIn'])) {
            $email = $_POST['email'];
            $records = $this->db->query("select * from `bf_reg_user` where email = '$email'");
            $users = $records->result();
            if(empty($users)) {
                $this->session->set_flashdata('email_error', 'البريد الالكتروني غير صحيح');
                redirect(base_url() . 'index.php/regular_user/signIn');
            }
            foreach($users as $key=>$user){
                $pass = $user->password;
            }
            if(password_verify($_POST['psw'], $pass)){
                foreach($users as $key=>$user){
                    $_SESSION['id'] = $user->reg_user_id;
                    $_SESSION['avatar'] = $user->avatar;
                    $_SESSION['first_name'] = $user->first_name;
                    $_SESSION['last_name'] = $user->last_name;
                    $_SESSION['email'] = $user->email;
                }

                redirect(base_url() . 'index.php');
            }
            else {
                $this->session->set_flashdata('pass_error','كلمة المرور غير صحيحه');
                redirect(base_url() . 'index.php/regular_user/signIn');
            }
        }
        Template::render('signIn');
    }
    public function avatar() {
        if(isset($_POST['upload'])) {
            $this->upload->do_upload('avatar');
            $upload_data = $this->upload->data();
            $_POST['avatar'] = $upload_data['file_name'];;
            $avatar = $_POST['avatar'];
            $id = $this->uri->segment(3);
            $this->db->query("update `bf_reg_user` set avatar = '$avatar' where reg_user_id = $id");
            $_SESSION['avatar'] = $avatar;
        }
        redirect(base_url() . 'index.php');
    }
    public function signOut() {
        session_unset();
        session_destroy();
        redirect(base_url() . 'index.php', 'refresh');
    }
}