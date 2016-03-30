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
 
 function getProject($project_id){
  $this->db->select('*');
  $this->db->from('tasks');
  $this->db->where('project_id', $project_id);
  $query = $this->db->get();
  return $query->result();
 }
 
 function insertProject($user_id,$projectname){
  $newProject=array("user_id"=>$user_id,"project_name"=>$projectname);
  return $this->db->insert('projects', $newProject);
 }
 
 
}

?>