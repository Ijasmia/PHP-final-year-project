<?php
  /*
 $host="localhost";
  $user="adsgrayc_public";
  $pass="Jas@199712270718";
  $db="adsgrayc_ads";
*/
    // Create database connection
//$db = mysqli_connect("localhost", "root", "", "ogaasonlineshop");
 
 
 // 	$db = mysqli_connect("localhost", "ogaascom_myorder", "@123JasJas", "ogaascom_form");

   $host="localhost";
  $user="root";
  $pass="";
  $db="gray";
  
  
  $link = mysqli_connect($host, $user, $pass, $db);
  if ($link->connect_error) {
      die("ERROR: Connection failed: " . $link->connect_error);
  }

?>
