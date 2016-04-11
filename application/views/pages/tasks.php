<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////    Display all Users Projects    ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
echo "<h3>Your Projects: </h3>";
	
foreach($projects as $project){
	$pieces = explode(",", $project->user_id);
	for($i=0;$i<count($pieces);$i++){
		if($pieces[$i]==$session_data['user_id']){
			echo "<p><a href='home/project/".$project->project_id."'>".$project->project_name."</a></p>";
		}
	}
		
}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////    Add Projects    /////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
echo "<h3>Create Project: </h3>";
	
echo form_open('home/addproject');
echo form_label('', 'user_id');
echo "<input type='text' class='hide' name='user_id' value='". $session_data['user_id'] ."'>";
echo form_label('Project Name:', 'projectname');
echo "<input type='text' name='projectname' required>";
echo form_submit('add_btn', 'Create Project');
echo form_close();
<<<<<<< HEAD



///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////    Invites    ///////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($invites[0])){
	echo "<h3>Your Invites:</h3>";
	echo "<p>Below are the project/s that you have been invited to:</p>";
	foreach($invites as $invite){
		foreach($projects as $project){
			if($project->project_id == $invite->project_id){
				echo form_open('home/confirm');
				echo form_label('', 'project_id');
				echo "<input type='text' class='hide' name='project_id' value='". $project->project_id ."'>";
				echo form_submit('add_btn', $project->project_name);
				echo form_close();
			}
		}
	}
}

?>
=======
?>
>>>>>>> ab08d41b40400179d5f8b93638a0d996ba7d58d3
