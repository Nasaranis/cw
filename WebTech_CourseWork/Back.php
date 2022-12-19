<?php // allows user to exit back to the homepage of the attendance system
 if(!isset($_SESSION['loggedin'])) header("Location: session.php");
 if($_SESSION['loggedin']===FALSE) header("Location: session.php");
 header("Location: secret.php");
 exit();
 ?>
