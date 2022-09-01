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

<title>myorders</title>

<link rel="stylesheet" type="text/css" href="css/myorders.css">

</head>

<br><br><br>
						
<body>
    
  <?php 

if (isset($_POST['delet'])) {

	
	$id = $_POST['id'];
	
	$sql = "select * from postadd where id='$id'";
	$result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
          
          
    
			
            
        }
$result=mysqli_query($link, "DELETE FROM postadd WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
 echo "<script> document.location.href='myads';</script>";


}


	$results = mysqli_query($link, "SELECT * FROM postadd");


?>  
    
   
     <?php

if (isset($_POST['Deleted'])) {

	
	$id = $_POST['id'];
	 $status = $_POST['status'];


	$query = "UPDATE orders SET Ustatus = '{$status }' WHERE id = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}
  
  echo "<script> document.location.href='myorders';</script>";
}
 
?>
    
     <?php

if (isset($_POST['checked'])) {

	
	$id = $_POST['id'];
	 $status = $_POST['status'];


	$query = "UPDATE orders SET status = '{$status }' WHERE id = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}
  
  echo "<script> document.location.href='myorders';</script>";
}
 
?>


 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index" style="text-decoration:none">HOME</a></li>
                   <li class="breadcrumb-item"><a href="mypost" style="text-decoration:none">POST-ADS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
					 
					
                </ol>
				
            </nav>
	
        </div>
	

	
	
	  <div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
		
		
		<?php 


    $id_user = $_SESSION['id_user'];
	$results_per_page = 100000;  
  
    $query = "select * from orders  where userid ='$id_user' AND Ustatus = 'show' order by id DESC";  
    
    $result = mysqli_query($link, $query);  
    $number_of_result = mysqli_num_rows($result);  
    
     if ($number_of_result < 1 ) {  
      echo"
	  
	   <br> <br><br> <br>
      <div class='container mt-5 mb-5'>
      <div style='text-align:center; color:#0000FF;'><span style='color:red;'><b>No Any Orders Found... </b></span><br>
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
  
    $query = "SELECT * FROM orders  where userid ='$id_user' AND Ustatus = 'show' order by id DESC LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
     
                  $id = $row['id'];
                  $name = $row['name'];
				   $pro_date = $row['cdate'];
	
				   $address = $row['address'];
				    $phone = $row['phone'];
				
				   $Wphone = $row['Wphone'];
				   $AdsId = $row['AdsId'];
				   $pro_userid = $row['userid'];
				    $pro_status = $row['status'];
				     $pro_Ustatus = $row['Ustatus'];
					 
 
  ?>
  
  
  
		
		
		
          
            <div class="mt-3">
                <ul class="list list-inline">
                    <li class="d-flex justify-content-between">
					
                            <div class="d-flex flex-column mr-2">
					
                                    <div class="d-flex flex-column mt-1 text-black-50 date-time">
                                        
                                    <div><span >Status: <span><b><?php 
                                    
                                    
                                   if($pro_status == 'New'){
											echo"<span style='color:green;'><b>$pro_status</b></span>";
										}
										else{
											echo"<span style='color:#F6390F;'><b>$pro_status</b></span>";
										}
                                    
                                    
                                    ?></b></span></span></div>
                                     <div><span >Order id: <span><b><?php echo $id  ?></b></span></span></div>
                                    <div><span >name: <span><b><?php echo $name  ?></b></span></span></div>
                                    <div><span >product id: <span><b><?php echo $AdsId  ?></b></span></span></div>
                                    <div><span >Phone No: <span><b><?php echo $phone  ?></b></span></span></div>
                                    <div><span >Address: <span><b><?php echo $address  ?></b></span></span></div>
                                    </div>
                            
                            
                             <div class="d-flex flex-column mr-2">
					
                                    <div class="d-flex flex-row mt-2 text-black-50 date-time">
                                   
             <form action='myorders' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='<?php echo $id; ?>'>
	          
			   
	             <input type='hidden' name='status' value='Deleted'>
				 
				
		<input type='submit' class='btn btn-danger ml-2' name='Deleted' value='Delet'>
	
</form>

<form action='myorders' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='<?php echo $id; ?>'>
	          
			   
	             <input type='hidden' name='status' value='checked'>
				 
				
		<input type='submit' class='btn btn-warning ml-2' name='checked' value='checked'>
	
</form>


 <a href="tel:<?php echo $phone; ?>"><button class="btn btn-primary ml-2" ><i class="fa fa-phone"></i></button></a>
     
       <?php
	

								if(	$Wphone == true){
								echo "
									
							<a href=' https://wa.me/94$Wphone'><button class='btn btn-success ml-2'><i class='fa fa-comments'></i></button></a>
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