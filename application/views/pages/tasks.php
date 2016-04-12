<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////    Display all Users Projects    ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
echo "<h3>Your Projects: </h3>";
//since there is an option for multiple users per project, i have stored all user_id's that are involved in each project in the projects table in the database under user_id.
//it is stored in this format: 1,3,4            Each number is a user id
//the code below seperates the user id from each project and if one of the user id's is the same as the user id in the session data, it displays the project
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



///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////    Invites    ///////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($invites[0])){
	echo "<h3>Your Invites:</h3>";
	echo "<p>Below are the project/s that you have been invited to:</p>";
	//Having loops within loops is usually risky because it could output multiples, but not in this case.
	foreach($invites as $invite){
		foreach($projects as $project){
			if($project->project_id == $invite->project_id){
				echo form_open('home/confirm');
				echo form_label('', 'invite_id');
				echo "<input type='text' class='hide' name='invite_id' value='". $invite->invite_id ."'>";
				echo form_label('', 'project_id');
				echo "<input type='text' class='hide' name='project_id' value='". $project->project_id ."'>";
				echo form_submit('add_btn', $project->project_name);
				echo form_close();
				echo "<br>";
			}
		}
	}
}

?>