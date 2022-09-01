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
 
   $name = $_POST['name'];
	  $address = $_POST['address'];
	$phone = $_POST['Pnumber'];
	$Wphone = $_POST['Wnumber'];
	$AdsId = $_POST['adsid'];
		$userId = $_POST['userid'];
 $comments = $_POST['comments'];
	
	$email ='ijaslee5@gmail.com';
	
if ($email==true){
    
  $to = $email;
  $judul = "Orders";
  $isi = "Ads_Id: ".$AdsId."\r\n"."Name: ".$name."\r\n"."Address: ".$address."\r\n"."Phone: ".$phone."\r\n"."Wnumber: ".$Wphone."\r\n"."User_Id: ".$userId."\r\n"."Comments: ".$comments;
  $headers = "From: adsgray@adsgray.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

}
}

?>