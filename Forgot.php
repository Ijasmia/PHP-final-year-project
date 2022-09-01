<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
 
  
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <title>Login in AdsGray</title>
  
  
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
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none">HOME</a></li>
                    <li class="breadcrumb-item"><a href="login.php" style="text-decoration:none">LOGIN</a></li>
                 
                    <li class="breadcrumb-item active" aria-current="page">RESET</li>
					 
					
                </ol>
				
            </nav>
	
        </div>

<div class="container">
    <div class="card card-login mx-auto text-center bg-secondary">
        <div class="card-header mx-auto bg-secondary">
        
                        <span class="logo_title mt-5">Enter Your Registered Mobile Number and Email</span>
                        
                        
<br>
    <?php
require_once 'db.php';

//check submit
if  (isset($_POST['submit'])) {
$phone = $_POST['phone'];
$email = $_POST['email'];
$db = user($phone);
$jumlah = mysqli_num_rows($db);

//check is there phone in database
if ($jumlah !=0) {
  while ($row=mysqli_fetch_assoc($db)){
    $db_email = $row['email'];
  }

//check input email similiar with email in database
if ($email==$db_email){
// make random code
  $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
  $code = str_shuffle($code);
  $code = substr($code,0, 10);

// for send token
  $alamat = "https://adsgray.com/update.php?code=$code&phone=$phone";
  $to = $db_email;
  $judul = "passwrod reset";
  $isi = "this is automatic email, dont repply. For reset your password please click this link ".$alamat;
  $headers = "From: adsgray_reset@adsgray.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

//echo $alamat;
if (update_token($code, $phone)){
  echo "<b><span style='color:green; font-size:16px' >You will receive an email with a link to reset your password. check your email and continue.</span></b>";
}else {
  echo "<p><span style='color:red; font-size:16px' > please try again </span></p>";
}

}else {echo" <p><span style='color:red; font-size:16px' >your email didn't register </span></p>  ";}

}else {echo" <p><span style='color:red; font-size:16px' > your phone number didn't register </span></p> ";}
}


?>

 </div>
<form action=""  method="post">
<div class="input-group form-group">
<input type="number" name="phone" class="form-control" placeholder="phone" required>
</div>

<div class="input-group form-group">
<input type="email" name="email" class="form-control" placeholder="email" required>
</div>

<div class="form-group">
<input type="submit" name="submit"  value="Send" class="btn btn-primary float-center login_btn">
        
         </div> 

    </div>
</div>

</body>

</html>
