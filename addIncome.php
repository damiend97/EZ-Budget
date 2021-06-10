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
$iName = mysqli_real_escape_string($dbCon, $_POST['iName']);
$iAmount = mysqli_real_escape_string($dbCon, $_POST['iAmount']);
$iDate = mysqli_real_escape_string($dbCon, $_POST['iDate']);

// prepare sql statement
$sql = "INSERT INTO `income` (`id`, `user`, `name`, `amount`, `date`) VALUES ('NULL', '$iUser', '$iName', '$iAmount', '$iDate');";

// query sql
if(!mysqli_query($dbCon, $sql)) {
	echo "failed".mysqli_error($dbCon);
} else {
	// redirect user to dashboard
	header("location: dashboard.php");
}

?>