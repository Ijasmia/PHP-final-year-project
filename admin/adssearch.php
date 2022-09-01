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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

	 $search_query = $_GET['id'];
  
    $query = "select * from postadd WHERE id = '$search_query'";  
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
							  
							
							 <td><a href='goads.php?id=<?php echo $id ?>'> Go</a></td>&nbsp; &nbsp;
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

 <script src="js/preventrefresh.js"></script>

</body>
</html>
