<?php
/*
$host = 'localhost';
$user = 'adsgrayc_public';
$pass = 'Jas@199712270718';
$db = 'adsgrayc_ads';
*/

 $host="localhost";
  $user="root";
  $pass="";
  $db="gray";
  
$link = mysqli_connect ($host, $user, $pass, $db) or die (mysqli_error()); 
 ?>


<?php

function result ($query) {
  global $link;
  if ($result = mysqli_query($link, $query) or die (' data')){
  return $result;
  }
}

function run($query) {
  global $link;
  if (mysqli_query ($link, $query)) return true;
  else return false;
  }

function user($phone) {
  $query = "SELECT * FROM users WHERE phone='$phone'";
  return result ($query);
}

function update_token($code,$phone) {
$query = "UPDATE users SET token='$code' WHERE phone='$phone'";
return run ($query);
}

function update_pass($konfir_pass,$phone) {
$query = "UPDATE users SET password='$konfir_pass' WHERE phone='$phone'";
return run ($query);
}
 ?>