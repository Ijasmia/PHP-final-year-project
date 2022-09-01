<?php
  //To Handle Session Variables on This Page
  session_start(); 

  //If user is already logged in then redirect them back to dashboard. 
  //This is required if user tries to manually enter login.php in URL.
  if(isset($_SESSION['id_user'])) {
    header("Location: mypost.php");
    exit();
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <title>Login in AdsGray</title>
  
  
   <meta property="og:title" content="Login Here - AdsGray earn money online Sri lanka" />
<meta property="og:url" content="https://adsgray.com/postadd/login.php" />
<meta property="og:description" content="post free ads sign up now ">
<meta property="og:image" itemprop="image" content="https://adsgray.com/css/logo1.png"/>
<meta property="og:type" content="article" />
<meta property="og:locale" content="en_GB" />

  <link rel="shortcut icon" type="image/png" href="css/logo.png">

 
 
 <style>
 

        .card {
            border: 1px solid #28a745;
        }
        .card-login {
            margin-top: 1px;
            padding: 18px;
            max-width: 30rem;
        }

        .card-header {
            color: #fff;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: -18px;
            border-bottom: -18px;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #ff0000;
            color: #fff;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn{
            width: 130px;
        }

        .login_btn:hover{
            color: #fff;
            background-color: #ff0000;
        }

        .btn-outline-danger {
            color: #fff;
            font-size: 18px;
            background-color: #28a745;
            background-image: none;
            border-color: #28a745;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #28a745;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #28a745;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0;
        }
 
 
 </style>

</head>
<body>

<?php include "navigation.php"; ?>
 </br></br></br>
 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index" style="text-decoration:none">HOME</a></li>
                 
                    <li class="breadcrumb-item active" aria-current="page">LOGIN</li>
					 
					
                </ol>
				
            </nav>
	
        </div>

<div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
           
                        <span class="logo_title mt-5"> Login Dashboard </span>
						

        </div>
        <div class="card-body">
           <form method="post" action="checklogin.php">
              <div class="form-group">
             
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
              </div>
              <div class="form-group">
              
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
              </div>
              <div class="form-group">
                <a href="Forgot.php">Forgot Password</a>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
              <?php 
              //If User have successfully registered then show them this success message
              //Todo: Remove Success Message without reload?
              if(isset($_SESSION['registerCompleted'])) {
                ?>
                <div>
                  <p id="successMessage" class="text-center">
				  <span style='color:red;'>Check your email!</span></p>
                </div>
              <?php
               unset($_SESSION['registerCompleted']); }
              ?>   
              <?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['loginError'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:red;'>Invalid Email/Password! Try Again!</span></p>
                </div>
              <?php
               unset($_SESSION['loginError']); }
              ?>      

              <?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['userActivated'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:red;'> Account Is Active. You Can Login</span></p>
                </div>
              <?php
               unset($_SESSION['userActivated']); }
              ?>    

               <?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['loginActiveError'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:red;'> Account Is Not Active. Check Your Email.</span></p>
                </div>
              <?php
               unset($_SESSION['loginActiveError']); }
              ?>        
            </form>
			
			
        </div>
    </div>
</div>
</br></br></br></br></br></br>
<?php include "foter.php"; ?>
</body>
 <script type="text/javascript">
      $(function() {
        $("#successMessage:visible").fadeOut(2000);
      });
    </script>

</html>
