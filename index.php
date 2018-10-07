<?php include('server.php'); 
    // if user is not logged in they cannot access this page
    if (empty($_SESSION['email'])) {
    	header('location: login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
       <title> Welcome Page PHP and SQL </title>
       <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2> Phone Directory Management System </h2>
</div>
<form method="post" action="server.php">
      <!-- display error validation here -->
     <?php include 'errors.php';  ?>	
     
    <div class="content">
       	 <?php if (isset($_SESSION['success'])): ?>
       	   <div class="error success">
       	   	  <h3>
       	   	  	<?php 
       	   	  	   echo $_SESSION['success'];
       	   	  	   unset($_SESSION['success']);
       	   	  	?>
       	   	  </h3>
       	   	</div>
       	  <?php endif ?>
       	  
       	<?php if (isset($_SESSION["email"])): ?>
       	      <p> Welcome here <strong> <?php echo $_SESSION['email']; ?></strong> 
              </p>
      
        <div class="input-group">
          <label>Name</label> <input type="text" name="Name">
        </div>

       <div class="input-group"> <label>Phone No</label>
        <input type="number" name="phone_no">
       </div>
       

      <div class="input-group">
        <button type="save" name="add_phone" class="btn">Add Contact</button>
      </div> 
      <p><a href="index.php?logout='1'" style="color: red;">Logout </a> </p> 
        <?php endif ?>
    </div>
</body>
</html>