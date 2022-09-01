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
                                        <th>id</th>
						                <th>name</th>
										 <th>email</th>
										  <th>userid</th>
										  <th>phone</th>
										 <th>jdate</th>
										  <th></th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
  
<?php 
  
    $query = "SELECT * FROM joinus order by id desc"; 
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
                  $id = $row['id'];
                  $username = $row['name'];
                  $email = $row['email'];
                  $userid = $row['userid'];
                
				   $phone = $row['phone'];
				   $Jdate = $row['Jdate'];
                
  ?>
 
                         
						  <tr>
						  <td><?php echo  $id; ?></td>
                             <td><?php echo  $username; ?></td>
                              <td><?php echo $email; ?></td>
							  <td><?php echo  $userid; ?></td>
                              <td><?php echo $phone; ?></td>
							   <td><?php echo $Jdate; ?></td>
							    <td><a href='joint.php?id=<?php echo $id ?>'>Delete</a></td>
                            </tr>
							
 
		
         <?php }?> 
</tbody>
</table>

<?php 
	
if (isset($_GET['id'])) {
    
	$id = $_GET['id'];
	
	$sql = "select * from joinus WHERE id ='$id'";
	$result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
           
        }
$result=mysqli_query($link, "DELETE FROM joinus WHERE id =$id");
	$_SESSION['message'] = "Address deleted!";
 
	  echo "<script> document.location.href='joint.php';</script>";
}



?>


 <script src="js/preventrefresh.js"></script>

</body>
</html>
