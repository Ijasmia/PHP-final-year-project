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
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>myads</title>
<link rel="stylesheet" type="text/css" href="css/myads.css">

</head>

<br><br><br>
						
<body>
   
    <?php

if (isset($_POST['out'])) {

	
	$id = $_POST['id'];
	 $outst = $_POST['outstock'];


	$query = "UPDATE postadd SET stock = '{$outst}' WHERE id = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}
  
  echo "<script> document.location.href='myads.php';</script>";
}
 
?>

 <?php

if (isset($_POST['in'])) {

	
	$id = $_POST['id'];
	 $outst = $_POST['outstock'];


	$query = "UPDATE postadd SET stock = '{$outst}' WHERE id = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}
  
  echo "<script> document.location.href='myads.php';</script>";
}
 
?>


    
     <?php

if (isset($_POST['del'])) {

	
	$id = $_POST['id'];
	 $Deleted = $_POST['Deleted'];


	$query = "UPDATE postadd SET statusads = '{$Deleted}' WHERE id = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}
  
  echo "<script> document.location.href='myads.php';</script>";
}
 
?>


 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index" style="text-decoration:none">HOME</a></li>
                   <li class="breadcrumb-item"><a href="mypost" style="text-decoration:none">POST-ADS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">MY-ADS</li>
					 
					
                </ol>
				
            </nav>
	
        </div>
	

	
	
	  <div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
		
		
		<?php 


    $id_user = $_SESSION['id_user'];
	$results_per_page = 100000;  
  
    $query = "select * from postadd  where userid ='$id_user' AND (statusads = 'Accepted' OR statusads = 'Pending') order by id DESC";  
    
    $result = mysqli_query($link, $query);  
    $number_of_result = mysqli_num_rows($result);  
    
     if ($number_of_result < 1 ) {  
      echo"
	  
	   <br> <br><br> <br>
      <div class='container mt-5 mb-5'>
      <div style='text-align:center; color:#0000FF;'><span style='color:red;'><b>No Any Results Found... </b></span><br>
     </div>
   </div>
	";
    }
  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    $page_first_result = ($page-1) * $results_per_page;  
  
    $query = "SELECT * FROM postadd  where userid ='$id_user' AND (statusads = 'Accepted' OR statusads = 'Pending') order by id DESC LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
     
                  $id = $row['id'];
                  $pro_title = $row['Ptitle'];
				   $pro_date = $row['date'];
	
				   $pro_phone = $row['phone'];
				    $pro_image1 = $row['image1'];
				 $pro_category = $row['category'];
				   $pro_statusads = $row['statusads'];
				   $pro_statusresan = $row['statusresan'];
				     $pro_userid = $row['userid'];
					  $Stock = $row['stock'];
 
  ?>
  
  
  
		
		
		
          
            <div class="mt-3">
                <ul class="list list-inline">
                    <li class="d-flex justify-content-between">
                      
					
					
									
								
					
					
                            <div class="d-flex flex-column mr-2">
							
						            <?php 
										
										if($pro_statusads == 'Accepted'){
											echo"<span style='color:green; font-size:18px'><b>$pro_statusresan</b></span>";
										}
										else{
											echo"<span style='color:#F6390F; font-size:18px'><b>$pro_statusresan</b></span>";
										}
								     ?>
									 
									 
								  <?php 
		  
		  if($pro_category == 'Job'){
					echo"
					   <div class='profile-image'><img class='rounded-circle' src='uploads/job/image/$pro_image1' width='100'></div>
										
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
				<div class='profile-image'><img class='rounded-circle' src='uploads/image/imagetum/$pro_image1' width='100'></div>			
					";
											
										}
			else{
				echo"
					<div class='profile-image'><img class='rounded-circle' src='uploads/image/imagetum/$pro_image1' width='100'></div>			
					";
			}
		  
		  ?>	 
									 
							
                             
                            
                        </div>
					  
					  
                            <div class="ml-2">
                                <h6 class="mb-0"><?php echo $pro_title  ?></h6>
                                <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                    <div><span>product id: <span><b><?php echo $id  ?></b></span></span></div>
                                    <div class="ml-3"><span>Phone No: <span><b><?php echo  $pro_phone   ?></b></span></span></div>
									
                                </div>
								
								Status: 
				   
				   
									<?php 
										
										if($pro_statusads == 'Accepted'){
											echo"<span style='color:#00FF00;'>$pro_statusads</span>";
										}
										else{
											echo"<span style='color:#c91c5f;'>$pro_statusads</span>";
										}
								     ?>
                         <br>
                         
                         	Stock: 
				   
				   
				   <?php
			     
			     if( $Stock == 'In Stock Now'){
			     
			     	echo "
								<span style='color:green; font-size:16px'>$Stock</span>
						
					
						<form action='myads.php' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='$id'>
	          
			   
	             <input type='hidden' name='outstock' value='Out Of Stock Now'>
				 
				
		<input type='submit' class='btn btn-primary btn-xs ml-2' name='out' value='To out'>
	
</form>	
					";
			     }
			     else{
			         echo "
									
						<span style='color:red; font-size:16px'>$Stock</span>
						
						
						<form action='myads.php' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='$id'>
	          
			   
	             <input type='hidden' name='outstock' value='In Stock Now'>
				 
				
		<input type='submit' class='btn btn-primary btn-xs ' name='in' value='To In'>
	
</form>
						
								

								";
			         
			     }
			     
			     ?>
				  
                        
                        <div class="d-flex flex-column mr-2">
					
                                    <div class="d-flex flex-row mt-2 text-black-50 date-time">
						<?php
				
				if($pro_statusads == 'Accepted'){
											echo"
											
										<form action='myads.php' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='$id'>
	          
			   
	             <input type='hidden' name='Deleted' value='Deleted'>
				 
				
		<input type='submit' class='btn btn-danger' name='del' value='Delete'>
	
</form>
											
											
											";
											
											
										}
										
										
										else{
											
											echo"
											
											
												<form action='myads.php' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='$id'>
	          
			   
	             <input type='hidden' name='Deleted' value='Deleted'>
				 
				
		<input type='submit' class='btn btn-danger' name='del' value='Delete'>
	
</form>
											
											
											
											
											";
										}
								     ?>
				
			</br>
				
				<?php 
										
										if($pro_statusads == 'Accepted'){
											echo"<a href='details?id=$id'><button class='btn btn-info ml-2'>Go Ads</button></a>";
										}
										else{
											echo"<a href='sms:0759333153;?&body=Ad%20Verify%20from%20AdsGray.com.%20%20MY%20ID%20is%20$id.%20MY%20PhoneNo:%20is%20$pro_phone%20'><button class='btn btn-warning ml-2'><span class='veryfy'>Verify</span></button></a>
											
											
											
											";
										}
								     ?>
									  </div> 
									   
                    </li>
                   
                </ul>
            </div>
			
			
			 <?php }?> 
			
			
        </div>
    </div>
</div>

</br></br></br></br></br>
</body>
</html>