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

  
  
  <form method="get" action="usersearch.php" enctype="multipart/form-data">
								
									<input type="number" name="id" placeholder="Search in ID" required > 
									
									<button type="submit"  name="search" value="Search">Search</button>
								</form>
						   <br>	
						   
						
  
  
    <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
										<th>UserName</th>
										<th>phone</th>
							            <th>email</th>
										 <th>usertype</th>
										  <th>Operation</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
  
<?php 
include"../dbconnect.php";
	 $search_query = $_GET['id'];
  
    $query = "select *from chat_user where phone = '$search_query'";  
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
     
                   $id_user = $row['id_user'];
                  $username = $row['username'];
                  $email = $row['email'];
                  $usertype = $row['usertype'];
                  $password = $row['password'];
				   $phone = $row['phone'];
				   $Rdate = $row['Rdate'];
				      $ip = $row['ipa'];
		
  ?>
 
                         
						  <tr>
						  
						  
						  <td><?php echo  $id_user; ?></td>
                        <td><?php echo  $username; ?></td>
						 <td><?php echo  $phone; ?></td>
						 <td><?php echo  $email; ?></td>
                    
                        <td><?php 
										
										if($usertype == 'Normal'){
											echo"<span style='color:red;'>$usertype</span>
								             ";
										}
										else{
											echo"<span style='color:#00FF00;'>$usertype</span>";
										}
								     ?>
									 
									 <td>
								 
								 
				<form action='user.php' method='post' enctype='multipart/form-data'>

	             <input type='hidden' name='id' value='<?php echo $id_user ?>'>
			     <input type='hidden' name='type' value='Member'>
	             <input type='submit' name='submittype' value='update' class='input-buttoon'>
	
                </form>
						
				</td>
								  <td>
								  
								   <td><form action='user.php' method='post' enctype='multipart/form-data'>
                   <input type='hidden' name='id' value='<?php echo $id_user ?>'>
	              <input type='hidden' name='pass' value='12345'>
				
		          <input type='submit' name='submit' value='Resat' class='input-buttoon'>
	
</form>
								  
								  
								  
								  </td>
								  
								  
								  
								  
								  
								  <td><a href='user.php?id=<?php echo $id_user ?>'></i> Delet</a></td>
								
								 
								
                            </tr>
							
 
		
         <?php }?> 
</tbody>
</table>
</div>


 <script src="js/preventrefresh.js"></script>

</body>
</html>
