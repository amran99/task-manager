<?php
class tasksmodel extends CI_Model {
 function __construct(){
  parent::__construct();
 }
 
 function getUsersProjects(){
  $this->db->select('*');
  $this->db->from('projects');
  $query = $this->db->get();
  return $query->result();
 }
 
 function getProjectTasks($project_id){
  $this->db->select('*');
  $this->db->from('tasks');
  $this->db->where('project_id', $project_id);
  $query = $this->db->get();
  return $query->result();
 }
 
 function getProject($project_id){
  $this->db->select('*');
  $this->db->from('projects');
  $this->db->where('project_id', $project_id);
  $query = $this->db->get();
  return $query->result();
 }
 
 function insertProject($user_id,$projectname){
  $newProject=array("user_id"=>$user_id,"project_name"=>$projectname);
  return $this->db->insert('projects', $newProject);
 }
 
 function insertTask($project_id,$taskname, $taskdesc, $taskfinish){
  $newTask=array("project_id"=>$project_id,"task_name"=>$taskname,"task_description"=>$taskdesc,"task_start"=>date("Y-m-d"),"task_finish"=>$taskfinish,"task_status"=>"not started");
  return $this->db->insert('tasks', $newTask);
 }
 
<<<<<<< HEAD
 function updateTask($task_id, $movetaskto, $task_name, $task_desc, $task_finish){
  $data = array(
   'task_status' => $movetaskto,'task_name' => $task_name,'task_description' => $task_desc,'task_finish' => $task_finish
=======
 function moveTask($task_id, $movetaskto){
  $data = array(
   'task_status' => $movetaskto
>>>>>>> ab08d41b40400179d5f8b93638a0d996ba7d58d3
  );
  $this->db->where('task_id', $task_id);
  $this->db->update('tasks',$data);
  }
 
 function deleteTask($task_id){
  $this->db->where('task_id', $task_id);
  $result=$this->db->delete('tasks');
 }
 
 function deleteProject($project_id){
  $this->db->where('project_id', $project_id);
  $result=$this->db->delete('tasks');
  $this->db->where('project_id', $project_id);
  $result1=$this->db->delete('projects');
 }
 
 function renameProject($project_id, $new_name){
  $data = array(
   'project_name' => $new_name
  );
  $this->db->where('project_id', $project_id);
  $this->db->update('projects',$data);
 }
 
<<<<<<< HEAD
 function getUserId($userEmail){
  $this->db->select('user_id');
  $this->db->from('users');
  $this->db->where('email', $userEmail);
  $query = $this->db->get();
  return $query->result();
 }
 
 function addUserInvite($userId,$project_id){
  $newInvite=array("user_id"=>$userId,"project_id"=>$project_id);
  return $this->db->insert('invites', $newInvite);
 }
 
 function checkInvites($userId,$project_id){
  $this->db->select('*');
  $this->db->from('invites');
  $this->db->where('project_id', $project_id);
  $this->db->where('user_id', $userId);
  $query = $this->db->get();
  return $query->result();
 }
 
 function getInvites($user_id){
  $this->db->select('*');
  $this->db->from('invites');
  $this->db->where('user_id', $user_id);
  $query = $this->db->get();
  return $query->result();
 }
=======
>>>>>>> ab08d41b40400179d5f8b93638a0d996ba7d58d3
 
}

?>