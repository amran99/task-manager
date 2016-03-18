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
	
	echo "<h2>Project: ".$project[0]->project_name."</h2>";
	
	foreach ($project as $task){
		echo "<p>".$task->task_id.") Task Name: ".$task->task_name."</br>";
		echo "Task Description: ".$task->task_description."</br>";
		echo "Task Start: ".$task->task_start."</br>";
		echo "Task Finish: ".$task->task_finish."</br>";
		echo "Task Status: ".$task->task_status."</br>";
	}
?>
</div>
</body>
</html>