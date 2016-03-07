<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {
	public function index()
	{
		$this->load->model('TasksModel');
		$data['tasks']=$this->TasksModel->getTasks();
		
		$this->load->view('tasks', $data);
	}
}
