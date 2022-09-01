<?php

 include "dbconnect.php";

  if (isset($_POST['upload'])) {
	  
	
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$email = $_POST['email'];
 
   
   $insert = "INSERT INTO joinus (name, phone, email) VALUES ('$name', '$phone', '$email')";
   

  if(mysqli_query( $link,$insert))
	  
    
{

  	
   
    echo "<script>alert('You Are Successfully Sent Join Request ')</script>";
    
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
 
    $phone = $_POST['phone'];
	$name = $_POST['name'];
	$pemail = $_POST['email'];
	
	$email ='ijaslee5@gmail.com';
	
if ($email==true){
    
  $to = $email;
  $judul = "Joint User";
  $isi = "Name: ".$name."\r\n"."Gmail: ".$pemail."\r\n"."Phone: ".$phone;
  $headers = "From: adsgray@adsgray.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

}
}

?>
