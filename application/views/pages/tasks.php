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
	<?php
	$pieces = explode(",", $session_data['user_projects']);
	for($i=0;$i<count($tasks);$i++){
		for($d=0;$d<count($pieces);$d++){
			$g=$i+1;
			if ($g<count($tasks)){
				if($tasks[$i]->project_id==$pieces[$d] && $tasks[$g]->project_id!=$pieces[$d]){
					echo "<p>Project Name: <a href='home/project/".$tasks[$i]->project_id."'>".$tasks[$i]->project_name."</a></p>";
				}
			}else{
				if($tasks[$i]->project_id==$pieces[$d] && $tasks[$i-1]->project_id==$pieces[$d]){
					echo "<p>Project Name: <a href='home/project/".$tasks[$i]->project_id."'>".$tasks[$i]->project_name."</a></p>";
				}
			}
			
		}
	}
	
	
	
	/*foreach ($tasks as $task){
		for($i=0;$i<count($pieces);$i++){
			if($task->project_id==$pieces[$i]){
				echo "<p>".$task->task_id.") Task Name: ".$task->task_name."</br>";
				echo "Task Description: ".$task->task_description."</br>";
				echo "Task Start: ".$task->task_start."</br>";
				echo "Task Finish: ".$task->task_finish."</br>";
				echo "Task Status: ".$task->task_status."</br>";
				echo "Project Name: <a href='home/project/".$task->project_id."'>".$task->project_name."</a></p>";
			}
			
		}
		
	}*/
?>
</div>
</body>
</html>