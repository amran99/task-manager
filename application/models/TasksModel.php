<?php
class tasksmodel extends CI_Model {
 function __construct(){
  parent::__construct();
 }
 
 function getTasks(){
  $this->db->select('*');
  $this->db->from('tasks');
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
 
 
}

?>