<?php
class Users extends CI_Controller
{
 public function user()
 {
 $this->load->model("UsersModel");
 $data['user']=$this->UsersModel->getUsers();
 $this->load->view("pages/login_view",$data);
 $this->load->view("includes/footer",$data);
 }

 public function addUser()
 {
 $first_name=$this->input->post('first_name');
 $last_name=$this->input->post('last_name');
 $email=$this->input->post('email');
 $password=$this->input->post('password');
 $this->load->model("UsersModel");
 if($this->UsersModel->insertUser($first_name, $last_name, $email, $password)){
 $data['msg']="Successfully added the new User";
 }else{
 $data['msg']="Something went wrong";
 }
 redirect('home', 'refresh');
 }
 
}
?>