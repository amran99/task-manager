<?php
class Users extends CI_Controller
{
 public function addUser()
 {
  $email=$this->input->post('email');
  $this->load->model("UsersModel");
  $users=$this->UsersModel->getUsers();
  $success = true;
  foreach($users as $user){
   if($user->email == $email){
    $success = false;
    $data['msg']="The email you used is already regitered, please try again with a different email or login with your old one.";
   }
  }
  if($success = true){
   $first_name=$this->input->post('first_name');
   $last_name=$this->input->post('last_name');
   $email=$this->input->post('email');
   $password=$this->input->post('password');
   $this->load->model("UsersModel");
   if($this->UsersModel->insertUser($first_name, $last_name, $email, $password)){
     $data['msg']="Your Registeration has been successful, please login";
    }else{
      $data['msg']="Something went wrong, please try again";
    }
  }
 $this->load->view('pages/login_view', $data);
 }
 
}
?>