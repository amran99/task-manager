<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////    Confirm Invitation to project   ///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
echo "<h3>Join ".$project[0]->project_name."</h3>";

echo form_open('home/accept');
echo form_label('', 'invite_id');
echo "<input type='text' class='hide' name='invite_id' value='". $invite_id ."'>";
echo form_label('', 'user_id');
echo "<input type='text' class='hide' name='user_id' value='". $user_id ."'>";
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_submit('add_btn', 'Accept');
echo form_close();

echo "<br>";

echo form_open('home/decline');	
echo form_label('', 'user_id');
echo "<input type='text' class='hide' name='user_id' value='". $user_id ."'>";
echo form_label('', 'invite_id');
echo "<input type='text' class='hide' name='invite_id' value='". $invite_id ."'>";
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_submit('add_btn', 'Decline');
echo form_close();



?>