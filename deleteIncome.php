<?php
ini_set('display_errors', 1); error_reporting(~0);
require_once('connection.php');

$name = mysqli_real_escape_string($dbCon, $_POST['name']);
$amount = mysqli_real_escape_string($dbCon, $_POST['amount']);
$date = mysqli_real_escape_string($dbCon, $_POST['date']);

$sql = "DELETE FROM income WHERE name='$name' AND amount='$amount' AND date='$date'";
mysqli_query($dbCon, $sql);

?>