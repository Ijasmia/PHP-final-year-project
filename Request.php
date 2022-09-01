<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
  require_once("dbconnect.php");
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

 
  <title>Request - AdsGray</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/favcon.png">
  <link rel="stylesheet" type="text/css" href="css/requst.css">

</head>

<body>
 
<?php
 include "navigation.php";
?>                              
	
<?php

  if (isset($_POST['upload'])) {
	  
	
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$reqst = $_POST['reqst'];
 
   
   $insert = "INSERT INTO request (name, phone, reqst)  VALUES ('$name', '$phone', '$reqst')";
   

  if(mysqli_query( $link,$insert))
	  
    
{

  	
   
    echo "<script>alert('You Are Successfully Sent Request ')</script>";
    
      echo "<script> document.location.href='index';</script>";
}
 
    
  else{
	   
     echo "<script>alert('Error.. Please Try Again ')</script>";
     echo "<script> document.location.href='Request';</script>";
  }
  }
   // Inchidere conexiune
  mysqli_close($link);
?>

 </br></br></br>
 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index" style="text-decoration:none">HOME</a></li>
                 
                    <li class="breadcrumb-item active" aria-current="page">JOINUS</li>
					 
					
                </ol>
				
            </nav>
	
        </div>
         <div class="container mt-3 mb-3">
             
  <main class="main__register">

      <div class="register__window">

      
        <div class="register__content">

          <h1>Request Form </h1>
          </div>
          <div class="register__inputs">
		 
		<form style='text-align: center' method='POST' action='Request' enctype='multipart/form-data'>
    	<input type='hidden' name='size value='1000000'>

	
		 

	<input  class='input-selectfil3' type='text' name='name' placeholder='Name'> 
					
		
	<input  class='input-selectfil3' type='number' name='phone' placeholder='Phone Number'> 
	
   
            
	   <textarea name='reqst' class='input-descrip'  rows='5' cols='30' placeholder='Type Your Request'></textarea></br></br>
			
          </div>
          <div class="register__button">
		    
            <button type="submit"  name='upload'>Sent Request</button>
          </div>
        </div>

      </div>
    </form>
  </main>
  </div>
   </br> </br> </br></br>
  	<?php include "foter.php"; ?>
	
 </body>

</html>