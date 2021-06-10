<?php

// using this to avoid header error
ob_start();

// display errors
ini_set('display_errors', 1); error_reporting(~0);

// grab connection
require_once('connection.php');

// grab SESSION from dashboard
include('dashboard.php');

// grab session user
$iUser = mysqli_real_escape_string($dbCon, $_SESSION['username']);
// grab form data
$eName = mysqli_real_escape_string($dbCon, $_POST['eName']);
$eAmount = mysqli_real_escape_string($dbCon, $_POST['eAmount']);
$eDate = mysqli_real_escape_string($dbCon, $_POST['eDate']);

// prepare sql statement
$sql = "INSERT INTO `expenses` (`id`, `user`, `name`, `amount`, `date`) VALUES ('NULL', '$iUser', '$eName', '$eAmount', '$eDate');";

// query sql
if(!mysqli_query($dbCon, $sql)) {
	echo "failed".mysqli_error($dbCon);
} else {
	// redirect user to dashboard
	header("location: dashboard.php");
}

?>