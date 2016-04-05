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
  $movetaskto=$this->input->post('movetaskto');
  $this->load->model('tasksmodel');
  $this->tasksmodel->moveTask($task_id, $movetaskto);
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
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }
}

?>