<?php 
   $Name = "";
   $phone_no="";
   $errors=array();
  $db = mysqli_connect('localhost', 'root', '', 'mydb');

  if (isset($_POST['add_phone'])) {
        $Name = mysqli_real_escape_string($db, $_POST['Name']);
        $phone_no = mysqli_real_escape_string($db, $_POST['phone_no']);

    if (empty($Name)){
    	array_push($errors, "Name is required");
        }
    if (empty($phone_no)){
    	array_push($errors, "Phone Number is required");
        }
        //if there are no errors, save user to database
    if (count($errors) == 0){
    	$sql = "INSERT INTO phone (Name, phone_no) 
    	               VALUES ('$Name', '$phone_no')";

           mysqli_query($db,$sql);
           header('location: index.php'); // redirect to home page   
  if ($db->mysqli_query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    } 
        }
    
  }
?>