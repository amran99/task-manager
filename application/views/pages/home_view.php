<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
 <head>
   <title>Task Manager</title>
   <link href="<?php echo base_url()."/css/style.css";?>" rel="stylesheet" type="text/css">
   <script src="<?php echo base_url()."/javascript/jquery.js";?>"></script>
 </head>
 <body>
   <h2>Welcome <?php echo $session_data['first_name']?>!</h2>
   <a href="<?php echo base_url()."/index.php/home/logout";?>" class="myButton">Logout</a>
   <div id="container">
    <h1>Task Manager</h1>