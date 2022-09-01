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

  
    <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>RID</th>
										<th>RNAME</th>
										<th>Ads id</th>
							            <th>Phone</th>
										  <th>report</th>
										   <th>Status</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
  
<?php 

	
  
    $query = "select *from report order by id desc";
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
     
                  $id_user = $row['id'];
                  $username = $row['name'];
                  $email = $row['email'];
                  $Adsld = $row['AdsId'];
				  
				   $userid = $row['userid'];
				     $phone = $row['phone'];
				   $Rdate = $row['Rdate'];
				 $status = $row['status'];
				  $report = $row['report'];
                
  ?>
 
                         
						  <tr>
						  
						  
						  <td><?php echo  $id_user; ?></td>
                           <td><?php echo  $username; ?></td>
					      <td><?php echo  $Adsld; ?></td>
							<td><?php echo  $phone; ?></td>
							<td><?php echo  $report; ?></td>
								
								  <td><?php 
										
										if($status == 'Not'){
											echo"<span style='color:red;'>$status</span>
								             ";
										}
										else{
											echo"<span style='color:#00FF00;'>$status</span>";
										}
								     ?>
									 
									 </td>
									 
					<td>				 
					<form action='reports.php' method='post' enctype='multipart/form-data'>

	             <input type='hidden' name='id' value='<?php echo $id_user ?>'>
			     <input type='hidden' name='type' value=
				 
				'<?php
				 if($status == 'Resolve'){
											echo"Not";
										}
										else{
											echo"Resolve";
										}
									
								     ?>'
				 
				 
				 >
	             <input type='submit' name='submittype' value='update' class='input-buttoon'>
	
                </form>
								
					</td>			 
								
                            </tr>
							
 
		
         <?php }?> 
</tbody>
</table>
</div>
<?php



if (isset($_POST['submittype'])) {

	
	$id = $_POST['id'];
	 $pro_usertype = $_POST['type'];
	

	$query = "UPDATE report SET status = '{$pro_usertype}' WHERE id = $id";

	$update = mysqli_query($link,$query);

	if (!$update) {
		die("Query Failed" . mysqli_error($link));
	}


 	 echo "<script> document.location.href='reports.php';</script>";
}

?>

 <script src="js/preventrefresh.js"></script>

</body>
</html>
