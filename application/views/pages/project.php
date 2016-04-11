<p><a href="<?php echo base_url()."index.php/home";?>">Back to Projects</a></p>
<?php echo "<h2>Project: ".$project[0]->project_name."</h2>";?>

<?php
	
$h3 = ["Not Started","Started","To Review","Finished"];
<<<<<<< HEAD
echo "<div id='behindDiv' class='behindDiv'>";

//This function brings a div to the front with the inputs to update a task
function openUpdateForm($tasks,$project) {
        echo "<div class='updateForm'>";
        echo "<span class='close'><a href='?'>X</a></span>";
	$id=$_GET['taskid'];
	
	foreach($tasks as $task){
		if($task->task_id == $id){
			echo form_open('home/updatetask');
			echo form_label('', 'project_id');
			echo "<input type='text' class='hide' name='project_id' value='". $project->project_id ."'>";
			echo form_label('', 'task_id');
			echo "<input type='text' class='hide' name='task_id' value='". $task->task_id ."'><br>";
			echo form_label('Task Name: ', 'task_name');
			echo "<input type='text' name='task_name' value='". $task->task_name ."' required><br>";
			echo form_label('Task Description: ', 'task_desc');
			echo "<textarea type='text' name='task_desc' style='margin: 0px; height: 92px; width: 283px;' required>". $task->task_description ."</textarea><br>";
			echo form_label('Due Date: ', 'due_date');
			echo "<input type='date' name='due_date' min='".date("Y-m-d")."' value='". $task->task_finish ."' required><br>";
			echo form_label('Move Task To: ', 'movetaskto');
=======
echo "<div id='behindDiv' class='behindDiv'>";	
for($i=0;$i<4;$i++){
	echo "<div class='column' id='column".$i."'>";
	echo "<h3>".$h3[$i]."</h3>";
	foreach ($projectTasks as $task){
		if($task->task_status===strtolower($h3[$i])){
			echo "<div class='hiddenContent' id='".$task->task_id."'>";
			echo "<p><span class='hiddenContentTitle' onclick='openContent(".$task->task_id.")'>Task Name: ".$task->task_name."</span>";
			echo "Task Description: ".$task->task_description."</br>";
			echo "Task Start: ".$task->task_start."</br>";
			echo "Task Finish: ".$task->task_finish."</br>";
			echo "Task Status: ".$task->task_status."</p>";
				
			//Update Task
			echo form_open('home/updatetask');
			echo form_label('', 'project_id');
			echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
			echo form_label('', 'task_id');
			echo "<input type='text' class='hide' name='task_id' value='". $task->task_id ."'>";
			echo form_label('Move To:', 'movetaskto');
>>>>>>> ab08d41b40400179d5f8b93638a0d996ba7d58d3
			echo "<select name='movetaskto' required>";
			echo "<option value='not started'>Not Started</option>";
			echo "<option value='started'>Started</option>";
			echo "<option value='to review'>To Review</option>";
			echo "<option value='finished'>Finished</option>";
<<<<<<< HEAD
			echo "</select><br>";
			echo form_submit('add_btn', 'Update Task');
			echo form_close();
			
=======
			echo "</select>";
			echo form_submit('add_btn', 'Update Task');
			echo form_close();
				
>>>>>>> ab08d41b40400179d5f8b93638a0d996ba7d58d3
			//Delete Task
			echo "<br><span>Delete Task:</span>";
			echo form_open('home/deletetask');
			echo form_label('', 'project_id');
<<<<<<< HEAD
			echo "<input type='text' class='hide' name='project_id' value='". $project->project_id ."'>";
=======
			echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
>>>>>>> ab08d41b40400179d5f8b93638a0d996ba7d58d3
			echo form_label('', 'task_id');
			echo "<input type='text' class='hide' name='task_id' value='". $task->task_id ."'>";
			echo form_submit('add_btn', 'Delete Task');
			echo form_close();
<<<<<<< HEAD
		}
	}

        echo "</div>";
}

//If task id is in the url it will activate the open update form function
if (isset($_GET['taskid'])) {
	openUpdateForm($projectTasks,$project[0]);
}

for($i=0;$i<4;$i++){
	echo "<div class='column' id='column".$i."'>";
	echo "<h3>".$h3[$i]."</h3>";
	foreach ($projectTasks as $task){
		if($task->task_status===strtolower($h3[$i])){
			echo "<div class='hiddenContent' id='".$task->task_id."'>";
			echo "<p><span class='hiddenContentTitle' onclick='openContent(".$task->task_id.")'>Task Name: ".$task->task_name."</span>";
			echo "Task Description: ".$task->task_description."</br>";
			echo "Task Start: ".$task->task_start."</br>";
			echo "Task Finish: ".$task->task_finish."</br>";
			echo "Task Status: ".$task->task_status."</p>";
			
			echo "<a href='?taskid=".$task->task_id."'>Edit Task</a>";
			
=======
>>>>>>> ab08d41b40400179d5f8b93638a0d996ba7d58d3
				
			echo "</div>";
				
		}
	}
	echo "</div>";
}
echo "</div>";
?>
	
<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////    Add Task    ///////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
echo "<div class='underColumns'><h3>Create New Task: </h3>";
	
echo form_open('home/addtask');
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_label('', 'taskname');
echo "<input type='text' name='taskname' placeholder='Task Name' required><br>";
echo form_label('', 'taskdesc');
echo "<textarea name='taskdesc' placeholder='Task Description' required></textarea><br>";
echo form_label(' Task End Date: ', 'taskfinish');
echo "<input type='date' name='taskfinish' min='".date("Y-m-d")."' required><br>";
echo form_submit('add_btn', 'Add Task');
echo form_close();
echo "</div>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////    Link to Project Settings    ///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
echo "<a href='".base_url()."index.php/home/settings/".$project[0]->project_id."'class='setLin'><div class='settingLink'>Project Settings</div></a>";
	
?>
