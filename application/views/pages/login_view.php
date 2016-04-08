<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="<?php echo base_url()."/css/style.css";?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."/css/login.css";?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."/css/navbar.css";?>" rel="stylesheet" type="text/css">
    
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()."/javascript/jquery-1.11.2.js";?>"></script>
    <script src="<?php echo base_url()."/javascript/jquery.js";?>"></script>
    
</head>
<body>
    <p><?php if(isset($msg)){
        echo $msg;
    }?></p>
        <div id="loginDiv">
            <h1>Login</h1>
            <?php 
            $attributes = array('id' => 'login', 'class' => 'forms');
            echo form_open('verifylogin', $attributes); ?>
            <label for="email"> </label>
            <input type="text" size="20" name="email" placeholder="Email" required/>
            <label for="password"></label>
            <input type="password" size="20" name="password" placeholder="Password" required/>
            <input type="submit" value="Login" id="button"/>
            <?php echo form_close();echo validation_errors();?>
            
        </div>
        
        <div id="registerDiv">
            <?php
            $attributes = array('id' => 'signup', 'class' => 'forms');
            $button = 'id = "button"';
            echo form_open('users/adduser', $attributes);
                echo "<h1>Sign up to the Task Manager Website.</h1>";
                echo "<label for='first_name'> </label>";
                echo "<input type='text' size='20' name='first_name' placeholder='First Name' required/>";
                echo "<label for='last_name'> </label>";
                echo "<input type='text' size='20' name='last_name' placeholder='Last Name' required/>";
                echo "<label for='email'> </label>";
                echo "<input type='text' size='20' name='email' placeholder='Email' required/>";
                echo "<label for='password'> </label>";
                echo "<input type='password' size='20' name='password' placeholder='Password' required/>";
                echo form_submit('add_btn', 'Register', $button);
            echo form_close();
            ?>
        </div>
        

    <p>User 1: amran@aaa.com ....... 12345678<br>
    User 2: safraz@aaa.com ....... 87654321</p>


</body>
</html>