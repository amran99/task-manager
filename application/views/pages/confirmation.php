<p><a href="<?php echo base_url()."index.php/home/settings/".$project[0]->project_id;?>">Back to Project Settings</a></p>
<?php
//Delete Project
echo "<h2>Are you sure you want to delete ".$project[0]->project_name."</h2>";
echo form_open('home/deleteproject');
echo form_label('', 'project_id');
echo "<input type='text' class='hide' name='project_id' value='". $project[0]->project_id ."'>";
echo form_submit('add_btn', 'Delete Project');
echo form_close();
?>
