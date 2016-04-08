<p><a href="<?php echo base_url()."index.php/home/project/".$project[0]->project_id;?>">Back to Project: <?php echo $project[0]->project_name?></a></p>
<?php echo "<h2>".$project[0]->project_name.": Settings</h2>";

//Rename Project
echo "<h2>Rename Project</h2>";
echo form_open('home/renameProject');
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_label('', 'new_name');
echo "<input type='text' name='new_name' placeholder='New Project Name' required>";
echo form_submit('add_btn', 'Rename Project');
echo form_close();

//Add another user to Project
echo "<h2>Add another User to this Project</h2>";
echo "<p>Insert the email of the user you want to join this project below and an invitation will be sent to that user</p>";
echo form_open('home/addUser');
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_label('', 'userEmail');
echo "<input type='email' name='userEmail' placeholder='New Users Email' required>";
echo form_submit('add_btn', 'Add User');
echo form_close();

if(isset($errorMsg)){
    echo $errorMsg;
}

//Delete Project
echo "<h2>Delete Project</h2>";
echo "<h3>Delete Project</h3>";
echo form_open('home/deleteprojectconfirmation');
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_submit('add_btn', 'Delete Project');
echo form_close();
?>