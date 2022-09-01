<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter dashboard.php in URL.
if(empty($_SESSION['id_user'])) {
	header("Location: index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files

require_once("dbconnect.php");
?>
<?php include "navigation.php"; ?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <title>AdsGray user MyProfile</title>

 <link href="css/profile.css" rel="stylesheet">

</head>

<body>

    
  	</br></br></br>
 
 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index" style="text-decoration:none">HOME</a></li>
                  
                    <li class="breadcrumb-item active" aria-current="page">POST-ADS</li>
					 
					
                </ol>
				
            </nav>
	
        </div>
 
 <div class="container mt-3 mb-5">
 

 <?php
		  
	
	
	
          $curr_user_id = $_SESSION['id_user'];
          
          $query = "SELECT * FROM users where id_user = $curr_user_id";

          $select_user = mysqli_query($link, $query);

          while ($row = mysqli_fetch_assoc($select_user)) {
			 
			   $id_user = $row['id_user'];
               $username = $row['firstname'];
               $user_email = $row['email'];
               $user_password = md5($row['password']);
            $user_phone = $row['phone'];
			 $usertype = $row['usertype'];
			 $verify = $row['verify'];
			  $payout = $row['payout'];
			
            ?>
            
          
			<div class="card">
			      

  </br>
 <h1 style="text-align:center"><?php echo $username; ?>
 
 <?php 	
										if($verify == 'Not verified'){
										 echo"<a href='sms:0759333153;?&body=Account%20Verify%20from%20AdsGray.com.%20%20MY%20ID%20is%20$id_user.%20MY%20PhoneNo:%20is%20$user_phone%20'><button class='verify'>Verify Account</button></a>";
										}
										else{
										    echo"<a href='updateaccount.php'><button class='update'>update</button></a>";
										}
										
										
								     ?>
   
   

 
 </h1>
 
 
								     
								    
								  
  <p class="title" style="text-align:center">Your Account Type is <?php echo $usertype; ?></p>
  
<!--
 <p><b>My Total Earnings:  </b>RS </p>
  -->
   <p><b>Account Status: </b><?php echo $verify; ?>
   
   
   	
   </p>
  <p><b>User Id: </b><?php echo $id_user; ?></p>
  
  <p><b>Email: </b><?php echo $user_email; ?></p>
   <p> <b>Phone No: </b><?php echo $user_phone; ?></p>
  

        
        <div class="card-body">
           <form method="post" action="updateprofile.php">
          <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $link->query($sql);

            //If user exists then show his details.
            //Todo: Create Seprate Page For Password Change.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>
        
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
              </div>
         
        
            <div class="form-group">
              <label for="address">Address</label>
              <textarea id="address" name="address" class="form-control" rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['location']; ?>" placeholder="city">
            </div>
			
            <div class="form-group">
              <label for="state">Genter</label>
              <input type="text" class="form-control" id="state" name="genter" placeholder="state" value="<?php echo $row['sex']; ?>">
            </div>
   
       
             <div class="form-group">
                <label for="contactno">Contact Number</label>
                <input type="text" class="form-control" id="contactno" name="phone" placeholder="Contact Number" value="<?php echo $row['phone']; ?>">
              </div>
			  <div class="form-group">
                <label for="contactno">whatsapp Number</label>
                <input type="text" class="form-control" id="contactno" name="whatsapp" placeholder="Contact Number" value="<?php echo $row['whatsapp']; ?>">
              </div>
			 
             
              <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" min="1960-01-01" max="2005-01-31" value="<?php echo $row['dob']; ?>">
              </div>
             
             
              <div class="text-center">
                <button type="submit" class="btn btn-success">Update Profile</button>
              </div>
            </div>
          
              
              
            <?php
                }
              }
            ?>  
			
            </form>
			
			
      
</br></br></br>
  
<div class="card-body">
<form action='profile.php' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='<?php echo $id_user ?>'>
	          
	
					<div class="form-group">
					<input type="password" class="form-control" name="NPassword" placeholder="Enter New Password" required> 
					</div>
		
		<div class="text-center">
		<input type='submit' class="btn btn-success" name='submit' value='Update Password'>
	 </div>
</form>
</br>
</div>
  </div>
 <?php } ?>
 
 </div>
 
 
    <?php



if (isset($_POST['submit'])) {

	
	$id = $_POST['id'];
//	 $pro_pass = md5($_POST['NPassword']);
	$pro_pass = $_POST['NPassword'];
	
	$password = base64_encode(strrev(md5($pro_pass)));

	$query = "UPDATE users SET password = '{$password}' WHERE id_user = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}
  
  echo "<script>alert('Successfully Updated your Password')</script>";
    
  echo "<script> document.location.href='logout.php';</script>";
}

?>

 
 <?php include "foter.php"; ?>
 
 
 	<script src="js/copytxt.js"></script>
 		 <script>
  $('#answer-example-share-button').on('click', () => {
  if (navigator.share) {
    navigator.share({
        title: 'Web Share In Ogaas',
       
        url: 'https://adsgray.com/register.php?referralid=<?php echo $id_user ?>',
      })
      .then(() => console.log(''))
      .catch((error) => console.log('Error sharing', error));
  } else {
    console.log('Share not supported on this browser, do it the old way.');
  }
});

</script>

</body>

</html>
