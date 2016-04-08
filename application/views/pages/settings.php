<p><a href="<?php echo base_url()."index.php/home/project/".$project[0]->project_id;?>">Back to Project: <?php echo $project[0]->project_name?></a></p>
<?php echo "<h2>".$project[0]->project_name.": Settings</h2>";

//Rename Project
echo form_open('home/renameProject');
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_label('', 'new_name');
echo "<input type='text' name='new_name' placeholder='New Project Name' required>";
echo form_submit('add_btn', 'Rename Project');
echo form_close();


//Delete Project
echo "<h3>Delete Project</h3>";
echo form_open('home/deleteprojectconfirmation');
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_submit('add_btn', 'Delete Project');
echo form_close();
?>