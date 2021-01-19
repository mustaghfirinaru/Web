<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class acc extends CI_Controller
{ 
    public function __construct()
  {
    parent::__construct();
    $this->load->model('bookmodel');
    $this->load->model('modelacc');
  }
  public function login()
  {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('pass','Password','required');
    if($this->form_validation->run()==FALSE){
      $titelpage['title'] = "Login";
      $this->load->view('book/fragment/header',$titelpage);
      $this->load->view('login/index');
      $this->load->view('book/fragment/footer');
      
    }
    else{
      $auth=$this->modelacc->checklogin();
      if(!$auth){
        $this->session->set_flashdata('mess','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Username and Password not valid
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('acc/login');
      }
      else{
        $this->session->set_userdata('username',$auth->name);
        $this->session->set_userdata('s_email',$auth->email);
        $this->session->set_userdata('s_id',$auth->username);
        $this->session->set_userdata('s_add',$auth->address);
        $this->session->set_userdata('role',$auth->role);
        switch ($auth->role)  {
          case 1:redirect('admin');
            break;
            case 2:redirect('book');
          break;
          
          default:
            break;
        }
      }
    }
  }public function regis()
  {
    $this->form_validation->set_rules('username','Username','required|is_unique[user.username]',['is_unique'=>'Username Already Exist']);
    $this->form_validation->set_rules('name','Full name','required');
    $this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('dob','Date of birth','required');
    $this->form_validation->set_rules('gender','Gender','required');
    $this->form_validation->set_rules('add','City','required');
    $this->form_validation->set_rules('pass1','Password','required|matches[pass2]',['matches'=>'Password does not match']);
    $this->form_validation->set_rules('pass2','Password','required');
    if($this->form_validation->run()==FALSE){
      $titelpage['title'] = "Register";
      $this->load->view('book/fragment/header',$titelpage);
      $this->load->view('login/registration');
      $this->load->view('book/fragment/footer');
      
    }
    else{
      $data=array(
        'username'=>$this->input->post('username'),
        'name'=>$this->input->post('name'),
        'email'=>$this->input->post('email'),
        'dob'=>$this->input->post('dob'),
        'gender'=>$this->input->post('gender'),
        'address'=>$this->input->post('add'),
        'pass'=>$this->input->post('pass1'),
        'role'=>2,
      );
      $this->db->insert('user',$data);
      redirect('acc/login');
    }
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('acc/login');
  }

  
}