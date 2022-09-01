<?php
 include "dbconnect.php";
  if (isset($_POST['upload'])) {
	  
	  
	  $Ads_id = $_POST['Aid'];
	 
	  $name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$Report = $_POST['report'];
 
   
	
   $insert = "INSERT INTO report (name, phone, email, report, AdsId) VALUES ('$name', '$phone', '$email', '$Report', '$Ads_id')";
   

  if(mysqli_query( $link,$insert))
	  
    
{

  	
   
    echo "<script>alert('You Are Successfully Sent Report... we will considering your report very soon... ')</script>";
    
      echo "<script> document.location.href='index';</script>";
}
 
    
  else{
	   
     echo "<script>alert('Error.. Please Try Again ')</script>";
     echo "<script> document.location.href='index';</script>";
  }
  }
   // Inchidere conexiune
  mysqli_close($link);
?>

<?php

if  (isset($_POST['upload'])) {
 
    $Ads_id = $_POST['Aid'];
	 
	  $name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$Report = $_POST['report'];
	
	$email ='ijaslee5@gmail.com';
	
if ($email==true){
    
  $to = $email;
  $judul = "Report";
  $isi = "Name: ".$name."\r\n"."Gmail: ".$pemail."\r\n"."Phone: ".$phone."\r\n"."Ads_Id: ".$Ads_id."\r\n"."Report: ".$Report;
  $headers = "From: adsgray@adsgray.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

}
}

?>