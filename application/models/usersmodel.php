<?php
class UsersModel extends CI_Model {
 function __construct(){
  parent::__construct();
 }
 
 function getUsers(){
  $this->db->select('*');
  $this->db->from('users');
  
  $query = $this->db->get('');
  return $query->result();
 }

 function insertUser($first_name,$last_name,$email,$password){
  $newUser=array("first_name"=>$first_name,"last_name"=>$last_name,"email"=>$email,"password"=>$password);
  return $this->db->insert('users', $newUser);
 }
 
}

?>