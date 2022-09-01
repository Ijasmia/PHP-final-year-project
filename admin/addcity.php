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
 <?php


  if (isset($_POST['upload'])) {
	  
	
	
	$name_en = $_POST['name_en'];
	$nameofdistic = $_POST['nameofdistic'];
  
   
   $insert = "INSERT INTO citie(vilage, nameofdistic) VALUES ('$name_en', '$nameofdistic')";
   

  if(mysqli_query( $link,$insert))
	  
    
{

      echo "<script> document.location.href='addcity.php';</script>";
}
 
    
  else{
	   
     echo "<script>alert('Error.. Please Try Again ')</script>";
     echo "<script> document.location.href='addcity.php';</script>";
  }
  }
 
?>               
<div class="container mt-5">
            
	  <form method="POST" action="addcity.php" enctype="multipart/form-data">	
		 
	<label style='color:white;'>  Location</label>
            <select name="nameofdistic" required>
			<option value='' selected='selected' hidden='hidden'>District</option>
               
                    <?php  
					
					
					$sql = "SELECT * FROM districts";
 
                         $result = mysqli_query($link,$sql);
                          while ($row = mysqli_fetch_array($result)) {
            
			                $district_id = $row['id'];
                               $id_name = $row['name_en'];
                
		echo "
		
		 <option value='$id_name'>$id_name</option>
		
	
		
		
		"; ?>
                
           <?php }?>   
		   
            </select>
			
		 <label style='color:white;'>vilage</label>
	<input  type='text' name='name_en' > 
	
		<button type="submit"  name='upload'>UP Vilage</button>
        
    </form>
     </br></br>
  
   <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
						                <th>distric</th>
										 <th>Vilage</th>
										  <th>Delet</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
  
<?php 

	
  
    $query = "SELECT *FROM citie order by id desc";  
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
     
                  $id = $row['id'];
                  $name = $row['vilage'];
                  $nameofdistic = $row['nameofdistic'];
                
  ?>
 
                         
						  <tr>
						  <td><?php echo  $id; ?></td>
                             <td><?php echo  $nameofdistic; ?></td>
                              <td><?php echo $name; ?></td>
							    <td><a href='addcity.php?id=<?php echo $id ?>'>Delete</a></td>
                            </tr>
							
 
		
         <?php }?> 
</tbody>
</table>
</div>
<?php 
	
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$sql = "select * from citie WHERE id ='$id'";
	$result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
           
        }
$result=mysqli_query($link, "DELETE FROM citie WHERE id =$id");
	$_SESSION['message'] = "Address deleted!";
 
	  echo "<script> document.location.href='addcity.php';</script>";
}

 mysqli_close($link);

?>

 <script src="js/preventrefresh.js"></script>

</body>
</html>
