<?php
session_start();

$file = "users.csv";

$current = file_get_contents($file);
$current .= '"' .$_POST['username']. '", "' .$_POST['password']. '", ' .$_POST['authorisation']."\n";
file_put_contents($file, $current);
header("Location: secret.php");
?>