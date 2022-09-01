<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("dbconnect.php");

//if user Actually clicked update profile button
if(isset($_POST)) {

	//Escape Special Characters
	$firstname = mysqli_real_escape_string($link, $_POST['fname']);
	$lastname = mysqli_real_escape_string($link, $_POST['lname']);
	$address = mysqli_real_escape_string($link, $_POST['address']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$dob = mysqli_real_escape_string($link, $_POST['dob']);
	$genter = mysqli_real_escape_string($link, $_POST['genter']);
	$phone = mysqli_real_escape_string($link, $_POST['phone']);
	$whatsapp = mysqli_real_escape_string($link, $_POST['whatsapp']);
	

	//Update User Details Query
	$sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', address='$address', location='$city', sex='$genter', dob='$dob', phone='$phone', whatsapp='$whatsapp' WHERE id_user='$_SESSION[id_user]'";

	if($link->query($sql) === TRUE) {
		//If data Updated successfully then redirect to dashboard
		header("Location: profile.php");
		exit();
	} else {
		//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
		echo "Error ". $sql . "<br>" . $link->error;
	}
	//Close database connection. Not compulsory but good practice.
	$link->close();

} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: profile.php");
	exit();
}