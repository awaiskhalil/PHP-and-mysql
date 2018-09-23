<?php

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

           if(!mysqli_query($db,$sql)){
             die('Error:' . mysqli_error($db));
            }
         echo "new record added";   
        }
    }
mysqli_close($db);    
?>