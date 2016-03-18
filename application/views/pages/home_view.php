<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Home</title>
   <link href="<?php echo base_url()."/css/style.css";?>" rel="stylesheet" type="text/css">
 </head>
 <body>
   <h2>Welcome <?php echo $session_data['first_name']?>!</h2>
   <a href="<?php echo base_url()."/index.php/home/logout";?>" class="myButton">Logout</a>
 </body>
</html>