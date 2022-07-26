<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller  {

    function __construct() {
        parent::__construct();
        $this->load->model('QuestionnaireModel');
        $this->load->library('session');
        date_default_timezone_set('US/Eastern');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $data = array();
        $condition = array(
            'username' => $username,
            'password' => $password,
            'status' => 1
        );
        $user = $this->QuestionnaireModel->checkLogin($condition);
        if($user)
        {
            $this->session->set_userdata('user_id',$user->id);
            $this->session->set_userdata('username',$user->username);
            $this->session->set_userdata('user_first_name',$user->first_name);
            $this->session->set_userdata('user_last_name',$user->last_name);
            $this->session->set_userdata('user_gender',$user->gender);
            $this->session->set_userdata('user_dob',$user->date_of_birth);
            $this->session->set_userdata('user_email',$user->email);
          //  $data['swals'] = $this->QuestionnaireModel->getQuestions();
            $this->load->view('admin/dashboard',$data);

        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            $this->load->view("admin/login");
        }
    }

    public function coverPhotoUpdate(){
        $cover = $this->QuestionnaireModel->get("question_background_cover");
        $data['cover'] = $cover;
        $this->load->view('admin/fileUploader',$data);
    }

    public function getBackground(){
        $cover = $this->QuestionnaireModel->get("question_background_cover");
        echo json_encode(array("data" => $cover));
        exit;
    }

    public function uploadPhoto(){
        $img = $_FILES["file"]["name"]; 
        $tmp = $_FILES["file"]["tmp_name"]; 
        $errorimg = $_FILES["file"]["error"]; 
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt');
        $path = 'assets/uploads/';
        if(!empty($_POST['name']) || $_FILES['file'])
        {
            $img = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $location = $path . $img;
            if(in_array($ext, $valid_extensions)) 
            {
                if(move_uploaded_file($tmp,$location)) 
                {

                    $name =  $this->input->post('fileName');
                    $table = 'question_background_cover';
                    $data = array(
                        'name' => $name,
                        'path' => $location,
                        'status' => 1
                    );
                    $condition = array( 'cover_id' => 1 );
                    $cover = $this->QuestionnaireModel->update($table,$data,$condition);
                    echo $location;
                }
            } 
            else 
            {
                echo 'invalid';
            }
        }
    }

    public function user_logout(){
        $this->session->sess_destroy();
        redirect('Admin', 'refresh');
    }

}