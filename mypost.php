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
require_once("db.php");
require_once("dbconnect.php");
?>
<?php include "navigation.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <title>AdsGray user Add myPost</title>


<link href="css/mypost.css" rel="stylesheet">

</head>
<body>

<?php


$tem = "image/imagetum/";
$main = "image/image1/";

$image1= uniqid() . "-" .time();
$image2= uniqid() . "-" .time();
$image3= uniqid() . "-" .time();

$target_T_img1 = $tem.$image1;
$target_img1 = $main.$image1;

$target_T_img2 = $tem.$image2;
$target_img2 = $main.$image2;

$target_T_img3 = $tem.$image3;
$target_img3 = $main.$image3;

$name1   = $image1 . ".webp"; // 5dab1961e93a7_1571494241.jpg


  if (isset($_POST['upload'])) {
	  
	$Ptitle = $_POST['Ptitle'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$city = $_POST['city'];
	$category = $_POST['category'];
	$Subcategory = $_POST['Subcategory'];
	$status = $_POST['status'];
	$price = $_POST['price'];
	$description = $_POST['description'];
    $ipa = $_POST['ipa'];
	$userid = $_POST['userid'];
	$statusads = $_POST['statusads'];
	$pro_statusresan = $_POST['statusresan'];
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
	$whatsapp = $_POST['whatsapp'];
  
  
   $valid_ext = array('png','jpeg','jpg','gif');
	
	$extension1 = strtolower(pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION));
	$extension2 = strtolower(pathinfo($_FILES["image2"]["name"], PATHINFO_EXTENSION));
	$extension3 = strtolower(pathinfo($_FILES["image3"]["name"], PATHINFO_EXTENSION));

if($extension2 == true){
	$name2   = $image2 . ".webp";
}
else{
	$name2   = $image2 . ".";
}

if($extension3 == true){
	$name3   = $image3 . ".webp";
}
else{
	$name3   = $image3 . ".";
}

   
   $insert = "INSERT INTO postadd (Ptitle, image1, image2, image3, phone, location, city, category, Subcategory, status, price, description, userid, statusads, statusresan, ip, usertype, username, whatsapp) VALUES ('$Ptitle', '$name1', '$name2', '$name3', '$phone', '$location', '$city', '$category', '$Subcategory', '$status', '$price', '$description', '$userid', '$statusads', '$pro_statusresan', '$ipa', '$usertype', '$username', '$whatsapp')";
   
   
   
   
   $img1 = ($_FILES["image1"]["size"] < 3 * 1024 * 1024);
   $img2 = ($_FILES["image2"]["size"] < 3 * 1024 * 1024);
   $img3 = ($_FILES["image3"]["size"] < 3 * 1024 * 1024);
   

  if($img1 AND $img2 AND $img3 == true )
  {
	  
     if($extension1 == 'PNG' || $extension1 == 'png' || $extension1 == 'jpg' || $extension1 == 'JPG' || $extension1 == 'jpeg' || $extension1 == 'JPEG' || $extension1 == 'gif' || $extension1 == 'GIF' ){
		 
		 if($extension2 == 'PNG' || $extension2 == 'png' || $extension2 == 'jpg' || $extension2 == 'JPG' || $extension2 == 'jpeg' || $extension2 == 'JPEG' || $extension2 == 'gif' || $extension2 == 'GIF' || $extension2 == ''){
			 
			 if($extension3 == 'PNG' || $extension3 == 'png' || $extension3 == 'jpg' || $extension3 == 'JPG' || $extension3 == 'jpeg' || $extension3 == 'JPEG' || $extension3 == 'gif' || $extension3 == 'GIF' || $extension3 == ''){

  
  if(mysqli_query( $link,$insert))  
	  
      {

if(in_array($extension1,$valid_ext) ){
			
			compressImage($_FILES["image1"]["tmp_name"],$target_T_img1.".webp",10);
			compressImage($_FILES["image1"]["tmp_name"],$target_img1.".webp",50);
	
		}
		
       if(in_array($extension2,$valid_ext)){
			
			compressImage($_FILES["image2"]["tmp_name"],$target_T_img2.".webp",10);
			compressImage($_FILES["image2"]["tmp_name"],$target_img2.".webp",50);

		}
		
       if(in_array($extension3,$valid_ext)){
			
			compressImage($_FILES["image3"]["tmp_name"],$target_T_img3.".webp",10);
			compressImage($_FILES["image3"]["tmp_name"],$target_img3.".webp",50);
		}
		
   
     echo "<script>alert('You Are Successfully Submitted')</script>";
    echo "<script> document.location.href='myads.php';</script>";
      
}
  else{
	   
     echo "<script>alert('Error..please Try Again')</script>";
     echo "<script> document.location.href='mypost.php';</script>";
  }
	 }
  else{
	   echo "<script>alert('Error..please check your image3 file type...')</script>";
     echo "<script> document.location.href='mypost.php';</script>";
  }
   }
  else{
	   echo "<script>alert('Error..please check your image2 file type...')</script>";
     echo "<script> document.location.href='mypost.php';</script>";
  }
   }
  else{
	   echo "<script>alert('Error..please check your image1 file type...')</script>";
     echo "<script> document.location.href='mypost.php';</script>";
  }
  }
  else{
	   echo "<script>alert('Error..please check your file size..')</script>";
     echo "<script> document.location.href='mypost.php';</script>";
  }
  

  
   } 


function compressImage($source, $destination, $quality) {


$logoImage = imagecreatefrompng('logo.png');

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

          $imageWidth=imagesx($image);
          $imageHeight=imagesy($image);
		 
          $logoWidth = imagesx($logoImage); 
          $logoHeight = imagesy($logoImage);  

imagecopy(
   // destination
   $image, 
   // source
   $logoImage, 
   // destination x and y 
   ($imageWidth-$logoWidth)/2, ($imageHeight-$logoHeight)/2,    
   // source x and y
   0, 0,
   // width and height of the area of the source to copy
   $logoWidth, $logoHeight);
		  
  imagewebp($image, $destination, $quality);

}
   
?>


<?php

$folder_dir = "uploads/job/file/";

  if (isset($_POST['jobupload'])) {
	  
	
	$Ptitle = $_POST['Ptitle'];
	$category = $_POST['category'];
	$Subcategory = $_POST['Subcategory'];
	$description = $_POST['description'];
    $statusads = $_POST['statusads'];
	$pro_statusresan = $_POST['statusresan'];
	$ipa = $_POST['ipa'];
	$userid = $_POST['userid'];
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
	$subTitle = $_POST['subTitle'];
	$information = $_POST['information'];
	$onlineUrl = $_POST['onlineUrl'];
	$websitUrl = $_POST['websitUrl'];
  
 
   $file1 = basename($_FILES['file1']['name']);
   $file2 = basename($_FILES['file2']['name']);
   $file3 = basename($_FILES['file3']['name']);
   $file4 = basename($_FILES['file4']['name']);
   
   $resumeFileType1 = pathinfo($file1, PATHINFO_EXTENSION);
   $resumeFileType2 = pathinfo($file2, PATHINFO_EXTENSION);
   $resumeFileType3 = pathinfo($file3, PATHINFO_EXTENSION);
   $resumeFileType4 = pathinfo($file4, PATHINFO_EXTENSION);
   
   $FileType1 = strtolower(pathinfo($_FILES["file1"]["name"], PATHINFO_EXTENSION)); // file extention only .jpg
	$FileType2 = strtolower(pathinfo($_FILES["file2"]["name"], PATHINFO_EXTENSION));
	$FileType3 = strtolower(pathinfo($_FILES["file3"]["name"], PATHINFO_EXTENSION));
	$FileType4 = strtolower(pathinfo($_FILES["file4"]["name"], PATHINFO_EXTENSION));
   
   $files1 = uniqid() . "." . $resumeFileType1;
   $files2 = uniqid() . "." . $resumeFileType2;
   $files3 = uniqid() . "." . $resumeFileType3;
   $files4 = uniqid() . "." . $resumeFileType4;
   
   $filename1 = $folder_dir .$files1;
   $filename2 = $folder_dir .$files2; 
   $filename3 = $folder_dir .$files3; 
   $filename4 = $folder_dir .$files4; 
   
  
   
   
   
   
   
   //image file upload

   /*
   usual coding for uniq name with file type
    $image1 = basename($_FILES['image1']['name']);
   $image2 = basename($_FILES['image2']['name']);
   $image3 = basename($_FILES['image3']['name']);
   
   
    $resumeFileTypeimage1 = pathinfo($image1, PATHINFO_EXTENSION);
   $resumeFileTypeimage2 = pathinfo($image2, PATHINFO_EXTENSION);
   $resumeFileTypeimage3 = pathinfo($image3, PATHINFO_EXTENSION);
   
   
   $img1 = uniqid() . "." . $resumeFileTypeimage1;
   $img2 = uniqid() . "." . $resumeFileTypeimage2;
   $img3 = uniqid() . "." . $resumeFileTypeimage3;
   
  
  usual coding
   $im1 = $folder_dir .$img1; 
   $im2 = $folder_dir .$img2; 
   $im3 = $folder_dir .$img3; 
   
   */
   
    $FileTypeimage1 = strtolower(pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION)); // file extention only .jpg
	$FileTypeimage2 = strtolower(pathinfo($_FILES["image2"]["name"], PATHINFO_EXTENSION));
	$FileTypeimage3 = strtolower(pathinfo($_FILES["image3"]["name"], PATHINFO_EXTENSION));
	
	


  
    $tem = "uploads/job/image/"; // upload folder parth
	
	
    $image1= uniqid() . "-" .time(); // set uniq name of image without extention
	$image2= uniqid() . "-" .time();
	$image3= uniqid() . "-" .time();
	
	$target_T_img1 = $tem.$image1;   // create name and parth
	
	$target_T_img2 = $tem.$image2;
	
	$target_T_img3 = $tem.$image3;
 
	if($FileTypeimage1 == true){    // create name for database save to file webp format
	$img1   = $image1 . ".webp";
	}
	else{
	$img1   = $image1 . ".";
	}
	if($FileTypeimage2 == true){
	$img2   = $image2 . ".webp";
	}
	else{
	$img2   = $image2 . ".";
	}

	if($FileTypeimage3 == true){
	$img3   = $image3 . ".webp";
	}
	else{
	$img3   = $image3 . ".";
	}
  
  $valid_ext = array('png','jpeg','jpg','gif','');
  $valid_ext1 = array('pdf','');
  
  
   $insert = "INSERT INTO postadd (Ptitle, image1, image2, image3, category, Subcategory, description, userid, statusads, statusresan, ip, usertype, username, subTitle, information, onlineUrl, websitUrl, file1, file2, file3, file4) VALUES ('$Ptitle', '$img1', '$img2', '$img3', '$category', '$Subcategory', '$description', '$userid', '$statusads', '$pro_statusresan', '$ipa', '$usertype', '$username', '$subTitle', '$information', '$onlineUrl', '$websitUrl', '$files1', '$files2', '$files3', '$files4')";
   
   $fil5 = ($_FILES["image1"]["size"] < 3 * 1024 * 1024); // max size 5mp
   $fil6 = ($_FILES["image2"]["size"] < 3 * 1024 * 1024);
   $fil7 = ($_FILES["image3"]["size"] < 3 * 1024 * 1024);
   $fil1 = ($_FILES["file1"]["size"] < 5 * 1024 * 1024);
   $fil2 = ($_FILES["file2"]["size"] < 5 * 1024 * 1024);
   $fil3 = ($_FILES["file3"]["size"] < 5 * 1024 * 1024);
   $fil4 = ($_FILES["file4"]["size"] < 5 * 1024 * 1024);
   
  if(($fil1 AND $fil2 AND $fil3 AND $fil4 == true) AND ($fil5 AND $fil6 AND $fil7 == true))
  {
  
		if((in_array($FileTypeimage3,$valid_ext)) AND (in_array($FileTypeimage2,$valid_ext)) AND (in_array($FileTypeimage1,$valid_ext))){ //IMAGE 3
			
						
						if((in_array($FileType1,$valid_ext1)) AND (in_array($FileType2,$valid_ext1)) AND (in_array($FileType3,$valid_ext1)) AND in_array($FileType4,$valid_ext1) ){  // file 1
							
		 
			 if(mysqli_query($link,$insert))  
										  
										  {
														move_uploaded_file($_FILES["file1"]["tmp_name"], $filename1);
														move_uploaded_file($_FILES["file2"]["tmp_name"], $filename2);
														move_uploaded_file($_FILES["file3"]["tmp_name"], $filename3);
														move_uploaded_file($_FILES["file4"]["tmp_name"], $filename4);
												
														if($FileTypeimage1 == true){ 

														 compressImage3($_FILES["image1"]["tmp_name"],$target_T_img1.".webp",100);
															}
															if($FileTypeimage2 == true){ 

														 compressImage2($_FILES["image2"]["tmp_name"],$target_T_img2.".webp",50);
															}
															
														if($FileTypeimage3 == true){ 

														 compressImage2($_FILES["image3"]["tmp_name"],$target_T_img3.".webp",50);
															}
														
													
														$_SESSION['succuss'] = true;
														header("Location: mypost.php");
														exit();
														
										
										  }
										  else{
											  
											  $_SESSION['uplodError'] = true;
														header("Location: mypost.php");
														exit();
										  }
										  
										  }
			
			else{ // file 1
				
				$_SESSION['uplodErrorFile1'] = true;
				header("Location: mypost.php");
				exit();
				
			}
						
			}
			else{ // IMAGE 1
				
				$_SESSION['uplodError1'] = true;
				header("Location: mypost.php");
				exit();
				
			}
		
  }
  else{
	$_SESSION['uplodErrorMAX'] = true;
	header("Location: mypost.php");
	exit();
	  
  }
  
  }
  

	
	  
function compressImage2($source, $destination, $quality) {


$logoImage = imagecreatefrompng('logo.png');

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

          $imageWidth=imagesx($image);
          $imageHeight=imagesy($image);
		 
          $logoWidth = imagesx($logoImage); 
          $logoHeight = imagesy($logoImage);  

imagecopy(
   // destination
   $image, 
   // source
   $logoImage, 
   // destination x and y 
   ($imageWidth-$logoWidth)/2, ($imageHeight-$logoHeight)/2,    
   // source x and y
   0, 0,
   // width and height of the area of the source to copy
   $logoWidth, $logoHeight);
		  
  imagewebp($image, $destination, $quality);

}

function compressImage3($source, $destination, $quality) {



  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

          $imageWidth=imagesx($image);
          $imageHeight=imagesy($image);
		 

imagecopy(
   // destination
   $image, 
  
   // destination x and y 
   ($imageWidth)/2, ($imageHeight)/2,    
   // source x and y
   0, 0);
   
		  
  imagewebp($image, $destination, $quality);

}
	
	
	
   
?>


<?php

if  (isset($_POST['upload'])) {
 
  	$Ptitle = $_POST['Ptitle'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$userid = $_POST['userid'];
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
	$whatsapp = $_POST['whatsapp'];
	
	$email ='ijaslee5@gmail.com';
	
if ($email==true){
    
  $to = $email;
  $judul = "New Post";
  $isi = "Title: ".$Ptitle."\r\n"."UserId: ".$userid." ".$username." ".$usertype."\r\n"."City: ".$city ."\r\n"."Phone: ".$phone."\r\n"."Wnumber: ".$whatsapp;
  $headers = "From: adsgray@adsgray.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

}
}

?>


 	</br></br></br>
 
 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none">HOME</a></li>
                  
                    <li class="breadcrumb-item active" aria-current="page">POST-ADS</li>
					 
					
                </ol>
				
            </nav>
	
        </div>
		
	<?php include "funtions/func.php";	?>	
 
 <div class="container mt-3 mb-5">
 	<div class="card">
	   <div class="card-body">
 


          <p>Fill Out The Ads Forms</p>
 
          <?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['uplodError'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:red;'>Wrong</span></p>
                </div>
              <?php
               unset($_SESSION['uplodError']); }
              ?>    
<?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['uplodError1'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:red;'>FILE TYPE 1 IMAGE</span></p>
                </div>
              <?php
               unset($_SESSION['uplodError1']); }
              ?>  
<?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['uplodErrorMAX'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:red;'>uplodErrorFile MAX</span></p>
                </div>
              <?php
               unset($_SESSION['uplodErrorMAX']); }
              ?>  		  
			  

<?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['uplodErrorFile1'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:red;'>uplodErrorFile1</span></p>
                </div>
              <?php
               unset($_SESSION['uplodErrorFile1']); }
              ?>  	

<?php 
              //If User Failed To log in then show error message.
              if(isset($_SESSION['succuss'])) {
                ?>
                <div>
                  <p class="text-center"><span style='color:green;'>succussfully upload</span></p>
                </div>
              <?php
               unset($_SESSION['succuss']); }
              ?>      
			  
 
   <div class="form-group">
    <select class="form-control" id="seeAnotherFieldGroup">
          <option value="0">Select Main Option.</option>
          <option value="1">main</option>
		  <option value="2">job</option>
    </select>
  </div>
  <div class="form-group" id="otherFieldGroupDiv">
   
     <form style='text-align: center' method='POST' action='mypost.php' enctype='multipart/form-data' autocomplete="off">

 
 
		<input type='hidden' name='size value='1000000'>
	    <input type='hidden' name='ipa' value='<?php echo $_SERVER['REMOTE_ADDR'];?>' > 
        <input type='hidden' name='userid' value='<?php echo $_SESSION['id_user'];?>' > 
		<input type='hidden' name='usertype' value='<?php echo $_SESSION['usertype'];?>' > 
		<input type='hidden' name='username' value='<?php echo $_SESSION['name'];?>' > 
		<input type='hidden' name='statusads' value='Pending' > 
		<input type='hidden' name='statusresan' value='Click on verify button and Send Text Message' >  
<br>		
	<input  class="form-control" placeholder='Product Name or Title' type='text' name='Ptitle' > 
<br>	
    <select name='location' class="form-control" id='loc_select' >
			<option value='' selected='selected' hidden='hidden'>District</option>
               
                    <?php getdistic(); ?>
    </select>
 <br>    
    <select name='city' class="form-control" id='city_select' >
			<option value='' selected='selected' hidden='hidden'>City</option>
                
				  <?php getcity(); ?>
     </select>
<br>	 
    <select name='category' class="form-control" id='main_select' >
			<option value='' selected='selected' hidden='hidden'>Category</option>
               
				  <?php getgetogary(); ?>
    </select>
 <br>    
    <select name='Subcategory' class="form-control" id='sub_select' >
		   <option value='' selected='selected' hidden='hidden'>Brand</option>
                 
				   <?php getmodal(); ?>   
    </select>
<br>	
    <label><span style='color:#2F4F4F; font-size:10px'>Min..Size 2MP & jpg,jpeg,png. only support</span> </label><br>
	<input  class="form-control" type='file' name='image1'  value="" required> </br>
	<input  class="form-control" type='file' name='image2' value=""  > </br>
	<input  class="form-control" type='file' name='image3' > 
 <br>	
	<input  class="form-control" placeholder="Phone Number" type='number' name='phone' maxlength = '10' value='<?php if($_SESSION['phone'] == true){ echo $_SESSION['phone']; }?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
	required> 
		
 <br> 
	<input  class="form-control" placeholder="whatsapp Number" type='number' name='whatsapp' maxlength = '10' value='<?php if($_SESSION['whatsapp'] == true){ echo $_SESSION['whatsapp']; } ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
<br>
	<select  name='status' class="form-control" >
	<option value='' selected='selected' hidden='hidden'>Status</option>
	<option value='New' >New</option>
	<option value='Used' >Used</option>
	</select>
<br>
	<input  class="form-control" placeholder="price" type='number' name='price' placeholder='price' maxlength="10" size="20" > 
<br>
	   <textarea name='description'  placeholder="Description : Here mention on date of product and more details"   class="form-control"  rows='5' cols='30' ></textarea></br></br>
			
    
	<button class="btn btn-success" type="submit"  name='upload'>Submit</button>

</form>
	
	
	
	
  </div>
  
  
  <div class="form-group" id="otherFieldGroupDiv2">
   
         <form style='text-align: center' method='POST' action='mypost.php' enctype='multipart/form-data' autocomplete="off">

 
 
		<input type='hidden' name='size value='1000000'>
	    <input type='hidden' name='ipa' value='<?php echo $_SERVER['REMOTE_ADDR'];?>' > 
        <input type='hidden' name='userid' value='<?php echo $_SESSION['id_user'];?>' > 
		<input type='hidden' name='usertype' value='<?php echo $_SESSION['usertype'];?>' > 
		<input type='hidden' name='username' value='<?php echo $_SESSION['name'];?>' > 
		<input type='hidden' name='statusads' value='Pending' > 
		<input type='hidden' name='statusresan' value='Click on verify button and Send Text Message' >  
<br>		
	<input  class="form-control" placeholder='Job Title' type='text' name='Ptitle' > 
<br>	
    
    <select name='category' class="form-control" id='jobmain_select'>
			<option value='' selected='selected' hidden='hidden'>Category</option>
               
				  <?php getgetogary(); ?>
    </select>
 <br>    
    <select name='Subcategory' class="form-control" id='jobsub_select'>
		   <option value='' selected='selected' hidden='hidden'>Brand</option>
                 
				   <?php getmodal(); ?>   
    </select>
	<br>	
	<input  class="form-control" placeholder='Sub Title' type='text' name='subTitle'> 
	<br>	
	<input  class="form-control" placeholder='Any information' type='text' name='information'> 
	<br>
	<input  class="form-control" placeholder='Apply Online Url' type='text' name='onlineUrl'> 
	<br>
	<input  class="form-control" placeholder='Websit Url' type='text' name='websitUrl'> 
	
	
<br>	
    <label><span style='color:#2F4F4F; font-size:16px'>main icon image</span> </label><br>
	<input  class="form-control" type='file' name='image1'  value=""> </br>
	<label><span style='color:#2F4F4F; font-size:16px'>image detail 1</span> </label><br>
	<input  class="form-control" type='file' name='image2' value=""  > </br>
	<label><span style='color:#2F4F4F; font-size:16px'>image detail 2</span> </label><br>
	<input  class="form-control" type='file' name='image3' > 
 <br>	
 <label><span style='color:green; font-size:18px'>Detail english pdf</span> </label><br>
 <input  class="form-control" type='file' name='file1'  value=""> </br>
 <label><span style='color:green; font-size:18px'>Detail singala pdf</span> </label><br>
 <input  class="form-control" type='file' name='file2' value=""  > </br>
 <label><span style='color:green; font-size:18px'>Detail tamil pdf</span> </label><br>
 <input  class="form-control" type='file' name='file3' > 
  <label><span style='color:green; font-size:18px'>Application form</span> </label><br>
	<input  class="form-control" type='file' name='file4' > 
 
 
	<br>	
	   <textarea name='description'  placeholder="Description : Here mention on more details"   class="form-control"  rows='5' cols='30'></textarea></br></br>
			
    
	<button class="btn btn-success" type="submit"  name='jobupload'>Submit</button>

</form>
  
   </div>
	 
	 
	 
	 
	 
	 
  </div>
 
 
 
 
 


</div>
  </div>
 
 
 
 
 
<script src="js/hide-show-fields-form.js"></script>
 <script src="js/city.js"></script>
 <script src="js/lodsubmit.js"></script>
</body>
</html>