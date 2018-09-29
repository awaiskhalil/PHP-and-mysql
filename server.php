<?php

    SESSION_start();
    $name = "";
    $email = "";
    $errors = array();

    //connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'mydb');

   // Check connection
   if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

    //if the registration button is clicked
    if (isset($_POST['register'])) {
    	$name = mysqli_real_escape_string($db, $_POST['name']);
    	$email = mysqli_real_escape_string($db, $_POST['email']);
    	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // ensure that form fields are filled properly 
    if (empty($name)){
    	array_push($errors, "Name is required");
        }
    if (empty($email)){
    	array_push($errors, "Email is required");
        }
    if (empty($password_1)){
    	array_push($errors, "Password is required");
        }
    if ($password_1 != $password_2){
    	array_push($errors, "Password and Confirm Passowrd do not match");
        }

    //if there are no errors, save user to database
    if (count($errors) == 0){
    	$password = md5($password_1); //encypt password before storing in database
    	$sql = "INSERT INTO registration (name, email, password) 
    	               VALUES ('$name', '$email', '$password')";

           mysqli_query($db,$sql);
           $_SESSION['email'] = $email;
           $_SESSION['success'] = "You are now logged in";
           header('location: index.php'); // redirect to home page   
        }

    }

    // login user from login page
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password= mysqli_real_escape_string($db, $_POST['password']);

    // ensure that form fields are filled properly 
    if (empty($email)) {
        array_push($errors, "Email is required");
        }
    if (empty($password)) {
        array_push($errors, "Password is required");
        }
    if (count($errors) == 0) {
        $password= md5($password); //encypt the password
        $query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            // user log in
           $_SESSION['email'] = $email;
           $_SESSION['success'] = "You are now logged in";
           header('location: index.php'); // redirect to home page
        } else{
            array_push($errors, "wrong username or password");
           // header('location: login.php');
        }
      }
    }

  // logout session
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }
	
?>