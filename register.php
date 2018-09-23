<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
       <title>  PHP and SQL </title>
       <link rel="stylesheet" type="text/css" href="style.css">
</head>
 <body>
    <div class="header">
	      <h2> Register </h2>
    </div>	
	<form method="post" action="register.php">
	<!-- display error validation here -->
     <?php include 'errors.php';  ?>
		<div class="input-group">
		    <label>Full name</label>
            <input type="text" name="name" >
	    </div>
        <div class="input-group">
		    <label>Email</label>
            <input type="text" name="email" >
	    </div>
	    <div class="input-group">
		    <label>Password</label>
            <input type="Password" name="password_1">
	    </div>
	    <div class="input-group">
		    <label>Confirm Password</label>
            <input type="Password" name="password_2">
	    </div>	
        <div class="input-group">
             <button type="submit" name="register" class="btn">Register</button>
        </div>     
        <p> Already a member? <a href="login.php"> Sign In </a> 
        </p>

    </form>    

 </body>
 </html>