<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
       <title>  PHP and SQL </title>
       <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2> User Login </h2>
</div>	
	<form method="post" action="login.php">
		<!-- display error validation here -->
     <?php include 'errors.php';  ?>
<div class="input-group">
		<label>Email</label>
        <input type="text" name="email">
	</div>
	<div class="input-group">
		<label>Password</label>
        <input type="Password" name="password">
	</div>	
<div class="input-group">
     <button type="submit" name="login" class="btn">Login</button>
 </div>
<p>
	Not yet a member <a href="register.php"> Sign Up </a>
</p>
</form>     
</body>
</html>