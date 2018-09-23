<!DOCTYPE html>
<html>
<head>
       <title>  PHP and SQL </title>
       <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2> Log In </h2>
</div>	
	<form method="post" action="login.php">
<div class=""input-group">
		<label>Email</label>
        <input type="text" name="Email">
	</div>
	<div class=""input-group">
		<label>Password</label>
        <input type="Password" name="password_1">
	</div>	
<div class="input-group">
     <button type="submit" name="Submit" class="btn">Submit</button>
 </div>
<p>
	Not yet a member <a href="register.php"> Sign Up </a>
</p>
</form>     
</body>
</html>