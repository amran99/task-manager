<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Task Manager</title>
</head>
<body>
<div id="container">
	<h1>Welcome to the Task Manager</h1>
	<p><a href="<?php echo base_url()."index.php/home";?>">Back to Projects</a></p>
	<?php echo "<h2>Project: ".$project[0]->project_name."</h2>";?>
	
	<div class="column">
		<h3>Not Started</h3>
		<?php
		foreach ($projectTasks as $task){
			if($task->task_status==="not started"){
				echo "<p>Task Name: ".$task->task_name."</br>";
				echo "Task Description: ".$task->task_description."</br>";
				echo "Task Start: ".$task->task_start."</br>";
				echo "Task Finish: ".$task->task_finish."</br>";
				echo "Task Status: ".$task->task_status."</p>";
			}
		}
		?>
	</div>
	
	<div class="column">
		<h3>Started</h3>
		<?php
		foreach ($projectTasks as $task){
			if($task->task_status==="started"){
				echo "<p>Task Name: ".$task->task_name."</br>";
				echo "Task Description: ".$task->task_description."</br>";
				echo "Task Start: ".$task->task_start."</br>";
				echo "Task Finish: ".$task->task_finish."</br>";
				echo "Task Status: ".$task->task_status."</p>";
			}
			
		}
		?>
	</div>
	
	<div class="column">
		<h3>To Review</h3>
		<?php
		foreach ($projectTasks as $task){
			if($task->task_status==="to review"){
				echo "<p>Task Name: ".$task->task_name."</br>";
				echo "Task Description: ".$task->task_description."</br>";
				echo "Task Start: ".$task->task_start."</br>";
				echo "Task Finish: ".$task->task_finish."</br>";
				echo "Task Status: ".$task->task_status."</p>";
			}
			
		}
		?>
	</div>
	
	<div class="column">
		<h3>Finished</h3>
		<?php
		foreach ($projectTasks as $task){
			if($task->task_status==="finished"){
				echo "<p>Task Name: ".$task->task_name."</br>";
				echo "Task Description: ".$task->task_description."</br>";
				echo "Task Start: ".$task->task_start."</br>";
				echo "Task Finish: ".$task->task_finish."</br>";
				echo "Task Status: ".$task->task_status."</p>";
			}
		}
		?>
	</div>
	
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
	echo "<input type='date' name='taskfinish' required>";
	echo form_submit('add_btn', 'Add Task');
	echo form_close();
	
	
	?>
	
	
	
</div>
</body>
</html>