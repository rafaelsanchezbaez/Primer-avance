<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('User_model'));
  }

  function index()
  {
    if ($this->session->set_userdata('login')) {
      redirect(base_url().'Dashboard');
    }
    else {
      $this->load->view('Auth/login');
    }

  }
  public function Login()
  {
    $email=$this->input->post('Email');
    $pass=$this->input->post('pass');
    $user=$this->User_model->GetUser($email,$pass);
    if (!$user) {
    $this->session->set_flashdata("Error", "El usuario no ha introducido los datos correctamente");
     redirect (base_url());
   }
   elseif ($user->Username==$email) {
     $acceso = array(
       'userId' =>$user->Id_usuario,
       'usermail' =>$user->Email,
       'username'=>$user->Username,
       'login'=>TRUE
     );
     $this->session->set_userdata($acceso);
     redirect(base_url().'Dashboard');
   }
  }
  function LogOff()
  {
  $this->session->sess_destroy();
  redirect(base_url());
  }

  }
