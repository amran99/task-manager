<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Task Manager</title>
	<script src="<?php echo base_url()."/javascript/jquery.js";?>"></script>
</head>
<body>
<div id="container">
	<h1>Welcome to the Task Manager</h1>
	<p><a href="<?php echo base_url()."index.php/home";?>">Back to Projects</a></p>
	<?php echo "<h2>Project: ".$project[0]->project_name."</h2>";?>

	<?php
	
	$h3 = ["Not Started","Started","To Review","Finished"];
	
	for($i=0;$i<4;$i++){
		echo "<div class='column'>";
		echo "<h3>".$h3[$i]."</h3>";
		foreach ($projectTasks as $task){
			if($task->task_status===strtolower($h3[$i])){
				echo "<div class='hiddenContent' id='".$task->task_id."'>";
				echo "<p><span class='hiddenContentTitle' onclick='openContent(".$task->task_id.")'>Task Name: ".$task->task_name."</span></br>";
				echo "Task Description: ".$task->task_description."</br>";
				echo "Task Start: ".$task->task_start."</br>";
				echo "Task Finish: ".$task->task_finish."</br>";
				echo "Task Status: ".$task->task_status."</p>";
				
				///Update Task
				echo form_open('home/updatetask');
				echo form_label('', 'project_id');
				echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
				echo form_label('', 'task_id');
				echo "<input type='text' class='hide' name='task_id' value='". $task->task_id ."'>";
				echo form_label('Move To:', 'movetaskto');
				echo "<select name='movetaskto' required>";
				echo "<option value='not started'>Not Started</option>";
				echo "<option value='started'>Started</option>";
				echo "<option value='to review'>To Review</option>";
				echo "<option value='finished'>Finished</option>";
				echo "</select>";
				echo form_submit('add_btn', 'Update Task');
				echo form_close();
				
				//Delete Task
				echo form_open('home/deletetask');
				echo form_label('', 'project_id');
				echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
				echo form_label('', 'task_id');
				echo "<input type='text' class='hide' name='task_id' value='". $task->task_id ."'>";
				echo form_submit('add_btn', 'Delete Task');
				echo form_close();
				
				echo "</div>";
				
			}
		}
		echo "</div>";
	}
	?>
	
	<?php
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////    Add Task    /////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	echo "<h3>Create New Task: </h3>";
	
	echo form_open('home/addtask');
	echo form_label('', 'project_id');
	echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
	echo form_label('Task Name:', 'taskname');
	echo "<input type='text' name='taskname' required>";
	echo form_label('Task Description:', 'taskdesc');
	echo "<textarea name='taskdesc' required></textarea>";
	echo form_label('Task End Date:', 'taskfinish');
	echo "<input type='date' name='taskfinish' min='".date("Y-m-d")."' required>";
	echo form_submit('add_btn', 'Add Task');
	echo form_close();
	
	
	?>
	
</div>
</body>
</html>