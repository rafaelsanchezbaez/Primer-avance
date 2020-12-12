<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
public function GetUser($user,$password)
{
  $this->db->select('Id_usuario,Email,Username');
  $this->db->from('usuarios');
  $this->db->where('Username', $user);
  $this->db->where('Password', $password);
  return $this->db->get()->row();
}
}
