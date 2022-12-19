<?php
session_start();
if(isset($_SESSION['loggedin'])) header("Location: secret.php");
/* process login data */
 if(!isset($_POST['username']) || !isset($_POST['password'])) {
  header("Location: session.php");
 }
 if (($handle = fopen("users.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
   $users[$data[0]] = array("password"=>$data[1], "admin"=>$data[2]); 
 }
 fclose($handle);
 }
 $u = $_POST['username']; 
 $p = $_POST['password'];
 
 // Verify data entered against csv file
 if(isset($users[$u]) and $users[$u]['password'] == $p ) {
  $_SESSION['loggedin']=TRUE; $_SESSION['username']=$u;

  // Sets the value for admin privilege

  switch($users[$u]['admin']) {
     case 1:
      $_SESSION['admin'] = 1; // Admin access
      break;
     case 0:
      $_SESSION['admin'] = 0; //regular access
      break;
  }
  header("Location: secret.php");
 }
 else{
    header("Location: session.php");
 }
 ?>
