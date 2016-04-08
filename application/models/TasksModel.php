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
 
 function updateTask($task_id, $movetaskto, $task_name, $task_desc, $task_finish){
  $data = array(
   'task_status' => $movetaskto,'task_name' => $task_name,'task_description' => $task_desc,'task_finish' => $task_finish
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
 
 
}

?>