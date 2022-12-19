<?php
session_start();

$file = "attendance.csv";

$fp = fopen($file, "r");
$id = 0;
while (($data = fgetcsv($fp)) !== FALSE) {
    $id = $data[0];
}

$current = file_get_contents($file);
$current .=  (intval($id)+1). ", " . $_SESSION['username'] . ", " . $_POST['fName']. ", " . $_POST['sName']. ", " . $_POST['mCode']. ", " . $_POST['attendDate']."\n";
file_put_contents($file, $current);
header("Location: secret.php");
?>