<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
//This function will open the first page after the user has logged in
 function index()
 {
  //The view will only be loaded if the user is logged in
   if($this->session->userdata('logged_in'))
   {
    //session data can be used to stor any amount of data but in this case, it is used to store some of the users details and can be accessed using the code below.
     $session_data = $this->session->userdata('logged_in');
     $data['session_data'] = $session_data;
     $user_id = $session_data['user_id'];
     //The code below loads the task model
     $this->load->model('tasksmodel');
     //these are functions in the model which can be activated in controllers
     $data['projects']=$this->tasksmodel->getUsersProjects();
     //you can also feed data in for more complex queries
     $data['invites']=$this->tasksmodel->getInvites($user_id);
     
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
   //This checks the url for the project id
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
 //a confirmation function to avoid user error, In the future this could be addapted to work for any confirmation page simply to reduce the amount of code
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
 
 function addUser(){
  if($this->session->userdata('logged_in')){
   $project_id=$this->input->post('project_id');
   $userEmail=$this->input->post('userEmail');
   $this->load->model('tasksmodel');
   
   $isalldne = false;
   
   if($this->tasksmodel->getUserId($userEmail)){
    $userId=$this->tasksmodel->getUserId($userEmail);
    $userId=$userId[0]->user_id;
    if($this->tasksmodel->checkInvites($userId,$project_id)){
     $data['errorMsg']="This user has either:<br> a) Already recieved an invite <br>or <br> b) Already joined the project";
    }else{
     $projectUsers = $this->tasksmodel->getProjectUsers($project_id);
     $pieces = explode(",", $projectUsers[0]->user_id);
     for($i=0;$i<count($pieces);$i++){
      if($pieces[$i]==$userId){
       $data['errorMsg']="This user has already joined the project";
       $isalldne = true;
      }
     }
    }
    
    if($isalldne == false){
     $this->tasksmodel->addUserInvite($userId,$project_id);
     $data['errorMsg']="Your invitation has been sent";
    }
    
    
   }else{
    $data['errorMsg']="The email you have entered is not registered to this website, please try again with a different email";
   }
   $session_data = $this->session->userdata('logged_in');
   $data['session_data'] = $session_data;
   $data['project']=$this->tasksmodel->getProject($project_id);
   $data['projectTasks']=$this->tasksmodel->getProjectTasks($project_id);
   $this->load->view('pages/home_view', $data);
   $this->load->view('pages/settings', $data);
   $this->load->view("includes/footer");
  }
 }
 
 function confirm(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['session_data'] = $session_data;
     $data['user_id'] = $session_data['user_id'];
     $project_id=$this->input->post('project_id');
     $data['invite_id']=$this->input->post('invite_id');
     $this->load->model('tasksmodel');
     $data['project']=$this->tasksmodel->getProject($project_id);
     $this->load->view('pages/home_view', $data);
     $this->load->view('pages/confirm', $data);
     $this->load->view("includes/footer");
   }
   else{
     redirect('login', 'refresh');
   }
 }
 
 function accept(){
  $project_id=$this->input->post('project_id');
  $user_id=$this->input->post('user_id');
  $invite_id=$this->input->post('invite_id');
  $this->load->model('tasksmodel');
  $this->tasksmodel->delInvite($invite_id);
  $projectUsers = $this->tasksmodel->getProjectUsers($project_id);
  $newUsrList = $projectUsers[0]->user_id.",".$user_id;
  $this->tasksmodel->addUsrtoPrjct($project_id, $newUsrList);
  redirect('home', 'refresh');
 }
 
 function decline(){
  $project_id=$this->input->post('project_id');
  $user_id=$this->input->post('user_id');
  $invite_id=$this->input->post('invite_id');
  $this->load->model('tasksmodel');
  $this->tasksmodel->delInvite($invite_id);
  redirect('home', 'refresh');
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }
}

?>