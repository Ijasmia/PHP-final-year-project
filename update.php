<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files

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
            margin-top: 10px;
            border-bottom: 0;
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
                    <li class="breadcrumb-item"><a href="login" style="text-decoration:none">LOGIN</a></li>
                 
                    <li class="breadcrumb-item active" aria-current="page">RESET</li>
					 
					
                </ol>
				
            </nav>
	
        </div>

<div class="container">
    <div class="card card-login mx-auto text-center bg-secondary">
        <div class="card-header mx-auto bg-secondary">
        
                        <span class="logo_title mt-5"> Reset Password </span>


<?php
require_once 'db.php';
$kode=$_GET['code'];
$phone = $_GET['phone'];

//check link
 if (isset($kode) && isset($phone)){
 $db_user = user($phone);
 $row = mysqli_fetch_assoc($db_user);
 $token = $row ['token'];
 $db_username = $row ['phone'];

//check between tokens & usernames that are in links and databases
if ($token==$kode && $db_username==$phone){
  //check submit
  if  (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $konfir_pass = $_POST['konfir_password'];
  //check password
  if ($password==$konfir_pass) {

      update_pass($konfir_pass, $phone);
    
     echo "<script>alert('You Are Successfully Reset your password')</script>";
    
      echo "<script> document.location.href='login';</script>";
   
  }else {echo "<p><span style='color:red; font-size:16px' > password is different </span></p>";}
  }
}else{echo "<p><span style='color:red; font-size:16px' > token & username is different </span></p>";}
}else{echo "<p><span style='color:red; font-size:16px' > link is wrong </span></p>";}

?>

 </div>
<form action=""  method="post">
<div class="input-group form-group">
<input type="password"  name="password" class="form-control" placeholder="New password">
</div>

<div class="input-group form-group">
<input type="password" name="konfir_password" class="form-control" placeholder="Confirm password">
</div>

<div class="form-group">
<input type="submit" name="submit" value="Reset" class="btn btn-primary float-center login_btn">
        
         </div> 

    </div>
</div>

</body>

</html>
