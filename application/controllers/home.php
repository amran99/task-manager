<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['session_data'] = $session_data;
     $this->load->model('tasksmodel');
     $data['projects']=$this->tasksmodel->getUsersProjects();
     
     $this->load->view('pages/home_view', $data);
     $this->load->view('pages/tasks', $data);
     $this->load->view("includes/footer");
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
 function project()
 {
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['session_data'] = $session_data;
   
   if ($this->uri->segment(3) === FALSE){
    $project_id = 0;
   }else{
    $project_id = $this->uri->segment(3);
   }
   
   $this->load->model('tasksmodel');
   $data['project']=$this->tasksmodel->getProject($project_id);
   $data['projectTasks']=$this->tasksmodel->getProjectTasks($project_id);
   
   $this->load->view('pages/home_view', $data);
   $this->load->view('pages/project', $data);
   $this->load->view("includes/footer");
   
   
   }else{redirect('login', 'refresh');}
 }
 
 function addProject(){
  $user_id=$this->input->post('user_id');
  $projectname=$this->input->post('projectname');
  $this->load->model('tasksmodel');
  $this->tasksmodel->insertProject($user_id, $projectname);
  redirect('home', 'refresh');
 }
 
 function addTask(){
  $project_id=$this->input->post('project_id');
  $taskname=$this->input->post('taskname');
  $taskdesc=$this->input->post('taskdesc');
  $taskfinish=$this->input->post('taskfinish');
  $this->load->model('tasksmodel');
  $this->tasksmodel->insertTask($project_id, $taskname, $taskdesc, $taskfinish);
  redirect('home/project/'.$project_id, 'refresh');
 }
 
 function updateTask(){
  $project_id=$this->input->post('project_id');
  $task_id=$this->input->post('task_id');
  $task_name=$this->input->post('task_name');
  $task_desc=$this->input->post('task_desc');
  $task_finish=$this->input->post('due_date');
  $movetaskto=$this->input->post('movetaskto');
  $this->load->model('tasksmodel');
  $this->tasksmodel->updateTask($task_id, $movetaskto, $task_name, $task_desc, $task_finish);
  redirect('home/project/'.$project_id, 'refresh');
 }
 
 function deleteTask(){
  $project_id=$this->input->post('project_id');
  $task_id=$this->input->post('task_id');
  $this->load->model('tasksmodel');
  $this->tasksmodel->deleteTask($task_id);
  redirect('home/project/'.$project_id, 'refresh');
 }
 
 function settings()
 {
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['session_data'] = $session_data;
   
   if ($this->uri->segment(3) === FALSE){
    $project_id = 0;
   }else{
    $project_id = $this->uri->segment(3);
   }
   
   $this->load->model('tasksmodel');
   $data['project']=$this->tasksmodel->getProject($project_id);
   $data['projectTasks']=$this->tasksmodel->getProjectTasks($project_id);
   
   $this->load->view('pages/home_view', $data);
   $this->load->view('pages/settings', $data);
   $this->load->view("includes/footer");
   
   
   }else{redirect('login', 'refresh');}
 }
 
 function deleteProjectConfirmation(){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['session_data'] = $session_data;
   $data['project_id']=$this->input->post('project_id');
   $this->load->model('tasksmodel');
   $data['project']=$this->tasksmodel->getProject($data['project_id']);
   $this->load->view('pages/home_view', $data);
   $this->load->view('pages/confirmation', $data);
   $this->load->view("includes/footer");
  }
 }
 
 function deleteProject(){
  $project_id=$this->input->post('project_id');
  $this->load->model('tasksmodel');
  $this->tasksmodel->deleteProject($project_id);
  redirect('home', 'refresh');
 }
 
 function renameProject(){
  $project_id=$this->input->post('project_id');
  $new_name=$this->input->post('new_name');
  $this->load->model('tasksmodel');
  $this->tasksmodel->renameProject($project_id, $new_name);
  redirect('home/project/'.$project_id, 'refresh');
 }
 
 function getUserId(){
  if($this->session->userdata('logged_in')){
   $data['project_id']=$this->input->post('project_id');
   $userEmail=$this->input->post('userEmail');
   $this->load->model('tasksmodel');
   
   if($this->tasksmodel->getUserId($data['userEmail'])){
    $userId=$this->tasksmodel->getUserId($data['userEmail']);
   }else{
    $session_data = $this->session->userdata('logged_in');
    $data['session_data'] = $session_data;
    $data['errorMsg']="The email you have entered is not registered to this website, please try again with a different email";
    $data['project']=$this->tasksmodel->getProject($data['project_id']);
    $data['projectTasks']=$this->tasksmodel->getProjectTasks($data['project_id']);
    $this->load->view('pages/home_view', $data);
    $this->load->view('pages/settings', $data);
    $this->load->view("includes/footer");
   }
   
  }
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }
}

?>