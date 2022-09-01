<?php

  include "dbconnect.php";


  if (isset($_POST['upload'])) {
	  
	  $name = $_POST['name'];
	  $address = $_POST['address'];
	$phone = $_POST['Pnumber'];
	$Wphone = $_POST['Wnumber'];
	$AdsId = $_POST['adsid'];
		$userId = $_POST['userid'];
 $comments = $_POST['comments'];
   
	
   $insert = "INSERT INTO orders (name, address, phone, Wphone, AdsId, userid, comments) VALUES ('$name', '$address', '$phone', '$Wphone', '$AdsId', '$userId', '$comments')";
   

  if(mysqli_query( $link,$insert))
	  
    
{

  	
   
    echo "<script>alert('You Are Successfully Sent Order... we will considering your Order very soon... ')</script>";
    
      echo "<script> document.location.href='ads.php';</script>";
}
 
    
  else{
	   
     echo "<script>alert('Error.. Please Try Again ')</script>";
     echo "<script> document.location.href='ads.php';</script>";
  }
  }
   // Inchidere conexiune
  mysqli_close($link);
?>