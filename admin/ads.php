<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter dashboard.php in URL.
if(empty($_SESSION['id_user'])) {
	header("Location: ../index.php");
	exit();
}

 if (( $_SESSION['rank'] !== '1997')) {
	  
		    echo "<script> document.location.href='../index.php';</script>";
} 
else{
include"../dbconnect.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1>

</head>

<?php 
include "navigation.php";

?>


<body class="fixed-nav sticky-footer bg-secondary" id="page-top">

  <div class="container mt-5">

  
  
  <form method="get" action="adssearch.php" enctype="multipart/form-data">
								
									<input type="number" name="id" placeholder="Search in ID" required > 
									
									<button type="submit"  name="search" value="Search">Search</button>
								</form>
						   <br>	
						   
						
  
  
    <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
										<th>U_Id</th>
										
										<th>Status</th>
							            <th>T_Ads</th>
										  <th>Operation</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
  
<?php 

	
  
    $query = "select *from postadd order by id desc";  
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
     
                   $id = $row['id'];
               
                  $pro_status = $row['status'];
                 
				   $pro_statusads = $row['statusads'];
				   $pro_statusresan = $row['statusresan'];
				     $pro_userid = $row['userid'];
				 $pro_category = $row['category'];
					  $pro_usertype = $row['usertype'];
                
  ?>
 
                         
						  <tr>
						  
						  
						  <td><?php echo  $id; ?></td>
                        <td><?php echo  $pro_userid; ?></td>
                       
								  <td><?php 
										
										if($pro_statusads == 'Accepted'){
											echo"<span style='color:#00FF00;'>$pro_statusads</span>";
										}
										else{
											echo"<span style='color:red;'>$pro_statusads</span>";
										}
								     ?>
									 
									 </td>
									 
									 
								<td><?php
                             $query = "SELECT * FROM postadd WHERE statusads = 'Accepted' AND userid='$pro_userid'";
                        $get_user = mysqli_query($link,$query);
                        $total_user = mysqli_num_rows($get_user);
						
						echo $total_user;
					?></td>
							  
							
								 <td><a href='goads.php?id=<?php echo $id ?>'> Go</a></td>
								  <td>
								  
								<?php 
			 
			 if($pro_category == 'Job'){
					echo"
					<form action='ads.php' method='post' enctype='multipart/form-data'>

						<input type='hidden' name='id' value='$id'>
						
					      <input type='submit' name='deletjob' value='Delet'>
				
                 </form>	
								
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
			<form action='ads.php' method='post' enctype='multipart/form-data'>

						<input type='hidden' name='id' value='$id'>
						
					      <input type='submit' name='delet' value='Delet'>
				
                 </form>
											
					";
											
										}
			else{
				echo"
				
				<form action='ads.php' method='post' enctype='multipart/form-data'>

						<input type='hidden' name='id' value='<?php echo $id ?>'>
						
					      <input type='submit' name='delet' value='Delet'>
				
                 </form>
				
					";
			}
			 
	
			 
			 ?>  
				  </td>
								
			
								 <td>
								 
		<form action='ads.php' method='post' enctype='multipart/form-data'>

	        <input type='hidden' name='id' value='<?php echo $id ?>'>
			<input type='hidden' name='adate' value='<?php echo time(); ?>'>
			<input type='hidden' name='statusads' value='Accepted'>
			<input type='hidden' name='statusresan' value='Your Ad Now on Live'>
	    
		<input type='submit' name='submit' value='Cnfm' class='input-buttoon'>
	
</form>			
						</td>		
								
								
								
                            </tr>
							
 
		
         <?php }?> 
</tbody>
</table>
</div>

<?php


if (isset($_POST['submit'])) {

	
	$id = $_POST['id'];
	 $pro_statusresan = $_POST['statusresan'];
	 $pro_statusads = $_POST['statusads'];
	 $adate = $_POST['adate'];

	$query = "UPDATE postadd SET statusresan = '{$pro_statusresan }', statusads = '{$pro_statusads}', adate = '{$adate}'  WHERE id = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}
 echo "<script> document.location.href='ads.php';</script>";
}

?>


<?php 
	
if (isset($_POST['delet'])) {
	
	$id = $_POST['id'];
	
	
	$sql = "select * from postadd where id='$id'";
	$result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
            $image1 = $row['image1'];
			 $image2 = $row['image2'];
			  $image3 = $row['image3'];
			  
			  
           $file1= '../uploads/image/image1/'.$image1;
			$file2= '../uploads/image/image1/'.$image2;
			$file3= '../uploads/image/image1/'.$image3;
			$file4= '../uploads/image/imagetum/'.$image1;
			$file5= '../uploads/image/imagetum/'.$image2;
			$file6= '../uploads/image/imagetum/'.$image3;
			
              $extension  = pathinfo($image1, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
							
							 unlink($file1);
							 unlink($file4);
								}
								
								
			$extension2  = pathinfo($image2, PATHINFO_EXTENSION ); // jpg					
								if(	$extension2 == true){
							
							 unlink($file2);
							 unlink($file5);
								}
						
						
			$extension3  = pathinfo($image3, PATHINFO_EXTENSION ); // jpg					
								if(	$extension3 == true){
							
							 unlink($file3);
							 unlink($file6);
								}
        }
$result=mysqli_query($link, "DELETE FROM postadd WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
 echo "<script> document.location.href='ads.php';</script>";


}


	$results = mysqli_query($link, "SELECT * FROM postadd");


?>


<?php 
	
if (isset($_POST['deletjob'])) {
	
	$id = $_POST['id'];
	
	
	$sql = "select * from postadd where id='$id'";
	$result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
            $image1 = $row['image1'];
			 $image2 = $row['image2'];
			  $image3 = $row['image3'];
			$doc1 =  $row['file1'];
			$doc2 =  $row['file2'];
			$doc3 =  $row['file3'];
			$doc4 =  $row['file4'];
			  
			  
            $file1= '../uploads/job/image/'.$image1;
			$file2= '../uploads/job/image/'.$image2;
			$file3= '../uploads/job/image/'.$image3;
			$file4= '../uploads/job/file/'.$doc1;
			$file5= '../uploads/job/file/'.$doc2;
			$file6= '../uploads/job/file/'.$doc3;
			$file7= '../uploads/job/file/'.$doc4;
			
			
              $extension  = pathinfo($image1, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
							
							 unlink($file1);
							
								}
								
								
			$extension2  = pathinfo($image2, PATHINFO_EXTENSION ); // jpg					
								if(	$extension2 == true){
							
							 unlink($file2);
							
								}
						
						
			$extension3  = pathinfo($image3, PATHINFO_EXTENSION ); // jpg					
								if(	$extension3 == true){
							
							 unlink($file3);
							
								}
								
		    $extension4  = pathinfo($doc1, PATHINFO_EXTENSION ); // jpg					
								if(	$extension4 == true){
							
							 unlink($file4);
							
								}
			$extension5  = pathinfo($doc2, PATHINFO_EXTENSION ); // jpg					
								if(	$extension5 == true){
							
							 unlink($file5);
							
								}
								
			$extension6  = pathinfo($doc3, PATHINFO_EXTENSION ); // jpg					
								if(	$extension6 == true){
							
							 unlink($file6);
							
								}
			$extension7  = pathinfo($doc4, PATHINFO_EXTENSION ); // jpg					
								if(	$extension7 == true){
							
							 unlink($file7);
							
								}

        }
$result=mysqli_query($link, "DELETE FROM postadd WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
 echo "<script> document.location.href='ads.php';</script>";


}


	$results = mysqli_query($link, "SELECT * FROM postadd");


?>


 <script src="js/preventrefresh.js"></script>

</body>
</html>
