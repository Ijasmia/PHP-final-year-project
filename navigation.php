<html lang="en">

<head>

     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  
	
<style>
 body {
            background: #A9A9A9 !important;
        }


.logo{
	
	 height: 35px;
	 float:left;
}


.buttona {

  background-color: yellow;
  border: none;
  color: black;

font-size: 14px;

  border-radius: 20%;
  
}

.navbar-customclass {
    background-color: #000;
}

.image{

  margin-right: -8px;
    
}

  
</style>

  
</head>

<?php include 'dbconnect.php' ?>
<div class="fixed-top">
 <nav class="navbar navbar-dark navbar-customclass navbar-expand-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">
	
     
       <span><img src="css/logo.png" height="32" class="image" alt="logo"> <span style='color:#fff; font-size:13px'>AdsGray.com</span></span>
   
    </a>
	<!-- <a href="mypost"><button class="buttona">Post Ads</button></a> -->
	
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-11" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-list-11">
      <ul class="nav navbar-nav text-center ml-auto">
         <?php 
                    if(isset($_SESSION['id_user'])) {
                        if ($_SESSION['rank']=='1997') {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/admin.php"><b><span style='color:green;'>ADMIN</span></b></a>
                            </li>
                           
                  
                    <?php } } ?>
					
					
					 <li class="nav-item"><a class="nav-link" href="index.php"><b>HOME</b></a></li>

                    <?php 
                    if(!isset($_SESSION['id_user'])) {
                        
                            ?>
                             <li class="nav-item">
                        <a  class="nav-link" href="register.php"><b>REGISTER_HERE!</b></a>
                    </li>
            
                    <?php  } ?>
					
					
					
					
					
					
					 <?php 
                    if(!isset($_SESSION['id_user'])) {
                        
                            ?>
                             <li class="nav-item">
                        <a class="nav-link" href="login.php"><b>LOGIN</b></a>
                    </li>
            
                    <?php  } ?>
                    
                    
                    
                    
                    	<?php 
                    if(isset($_SESSION['id_user'])) {
                        
                            ?>
                             <li class="nav-item">
                        <a class="nav-link" href="myorders.php"><b>MY_ORDERS</b></a>
                    </li>
            
                    <?php  } ?>
                    
					
					<?php 
                    if(isset($_SESSION['id_user'])) {
                        
                            ?>
                             <li class="nav-item">
                        <a class="nav-link" href="myads.php"><b>MY_ADS</b></a>
                    </li>
            
                    <?php  } ?>
					
					<?php 
                    if(isset($_SESSION['id_user'])) {
                        
                            ?>
                             <li class="nav-item">
                        <a class="nav-link" href="mypost.php"><b>POST_ADS</b></a>
                    </li>
            
                    <?php  } ?>
					<?php 
                    if(isset($_SESSION['id_user'])) {
                        
                            ?>
                             <li class="nav-item">
                        <a class="nav-link" href="profile.php"><b>PROFILE</b></a>
                    </li>
            
                    <?php  } ?>
                    
                    
						<?php 
                    if(isset($_SESSION['id_user'])) {
                        
                            ?>
                             <li class="nav-item">
                        <a class="nav-link" href="logout.php"><b>LOG_OUT</b></a>
                    </li>
            
                    <?php  } ?>
        
      </ul>
    </div>
  </div>
</nav>
  </div>

  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  

