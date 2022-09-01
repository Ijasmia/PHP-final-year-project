<?php
//To Handle Session Variables on This Page
session_start();

//If user is already logged in then redirect them back to dashboard. 
//This is required if user tries to manually enter register.php in URL.
if(isset($_SESSION['id_user'])) {
    header("Location: mypost.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />


 
  <title>Register - AdsGray</title>

<meta property="og:title" content="Register - AdsGray earn money online Sri lanka" />
<meta property="og:url" content="https://adsgray.com/register.php" />
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
            color: green;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: -18px;
            border-bottom: -18px;
        }

        .input-group-prepend span{
            width: 30px;
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
                 
                    <li class="breadcrumb-item active" aria-current="page">REGISTER</li>
					 
					
                </ol>
				
            </nav>
	
        </div>
 
 <div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
          
                        <span class="logo_title mt-5">REGISTER </span>

        </div>
        <div class="card-body">
            <form method="post" action="adduser.php">
			
			<div class="form-group">
          
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required="">
              </div>
              <div class="form-group">
            
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="">
              </div>
              <div class="form-group">
			 
					<input placeholder="Phone Number" name="phone" type="number" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" autocomplete="username" required> 
                </div>
				 <div class="form-group">
					<input placeholder="whatsapp Number" name="whatsapp" type="number" class="form-control"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" > 
                </div>
               <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
              </div>
              <div class="form-group">
               
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
              </div>
			  <div class="form-group">
                    <input id="reg_passwordconf" name="con_password" type="password"  class="form-control" placeholder="Confirm password.."  required>
                </div>
			  
              <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
              <?php 
              //If User already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div>
                  <p class="text-center">
				  <span style="color:red; font-size:16px" >
 
Email Already Exists! Choose A Different Email!</span></p>
                </div>
				
              <?php
               unset($_SESSION['registerError']); }
              ?>    
			  
			  
			  
			   <?php 
              //If User already registered with this email then show error message.
              if(isset($_SESSION['passwordError'])) {
                ?>
                <div>
                  <p class="text-center">
				  <span style="color:red; font-size:16px" >
 
Password confirmation doesn\'t match your password!</span></p>
                </div>
				
              <?php
               unset($_SESSION['passwordError']); }
              ?>    
			  

            </form>
			
			</br>
			  <span style="color:#fff; font-size:18px"> have an account? </span><a class="login__link" href="login.php">LOG IN</a>
			
			
        </div>
    </div>
</div>
 
</br></br>
<?php include "foter.php"; ?>
</body>
</html>