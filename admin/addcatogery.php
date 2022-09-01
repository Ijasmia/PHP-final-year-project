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


  if (isset($_POST['Addupload'])) {
	  
	
	
	$catogory = $_POST['cato'];
	
  
   
   $insert = "INSERT INTO catogery(catogory) VALUES ('$catogory')";
   

  if(mysqli_query( $link,$insert))
	  
    
{

      echo "<script> document.location.href='addcatogery.php';</script>";
}
 
    
  else{
	   
     echo "<script>alert('Error.. Please Try Again ')</script>";
     echo "<script> document.location.href='addcatogery.php';</script>";
  }
  }

?>       

<div class="container mt-5">
                    
	  <form method="POST" action="addcatogery.php" enctype="multipart/form-data">	
		  

			
		 <label  style='color:white;' >Add catogory</label>
	<input  type='text' name='cato' > 
	
		<button type="submit"  name='Addupload' >Ad catogery</button>
        
    </form>
     </br></br>
  
  <?php


  if (isset($_POST['upload'])) {
	  
	
	
	$catogory = $_POST['catogory'];
	$model = $_POST['model'];
  
   
   $insert = "INSERT INTO modal(catogory, model) VALUES ('$catogory', '$model')";
   

  if(mysqli_query( $link,$insert))
	  
    
{

      echo "<script> document.location.href='addcatogery.php';</script>";
}
 
    
  else{
	   
     echo "<script>alert('Error.. Please Try Again ')</script>";
     echo "<script> document.location.href='addcatogery.php';</script>";
  }
  }

?>                           
	  <form method="POST" action="addcatogery.php" enctype="multipart/form-data">	
		 
	<label style='color:white;'>  catogery</label>
            <select name="catogory" required>
			<option value='' selected='selected' hidden='hidden'>catogery</option>
               
                    <?php  
					
					
					$sql = "SELECT * FROM catogery";
 
                         $result = mysqli_query($link,$sql);
                          while ($row = mysqli_fetch_array($result)) {
            
			                $_id = $row['id'];
                               $id_name = $row['catogory'];
                
		echo "
		
		 <option value='$id_name'>$id_name</option>
		
		"; ?>
                
           <?php }?>   
		   
            </select>
			
		 <label style='color:white;'>Sub catogory</label>
	<input  type='text' name='model' > 

		<button type="submit"  name='upload'>UP catogery</button>
        
    </form>
     </br></br>
  
    <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
						                <th>catogory</th>
										 <th>Sub catogory</th>
										  <th>Delet</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
  
<?php 

	
  
    $query = "SELECT *FROM modal order by id desc";  
    $result = mysqli_query($link, $query);  
      
    while ($row = mysqli_fetch_array($result)) {  
     
     
                  $id = $row['id'];
                  $catogory = $row['catogory'];
                  $model = $row['model'];
                
  ?>
 
                         
						  <tr>
						  <td><?php echo  $id; ?></td>
                             <td><?php echo  $catogory; ?></td>
                              <td><?php echo $model; ?></td>
							  
							    <td><a href='addcatogery.php?id=<?php echo $id ?>'><i class="fa fa-remove"></i> Delet</a></td>
								
								 
								
                            </tr>
							
 
		
         <?php }?> 
</tbody>
</table>
</div>



<?php 
	
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$sql = "select * from modal WHERE id ='$id'";
	$result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
           
        }
$result=mysqli_query($link, "DELETE FROM modal WHERE id =$id");
	$_SESSION['message'] = "Address deleted!";
 
	  echo "<script> document.location.href='addcatogery.php';</script>";
}

 mysqli_close($link);

?>

 <script src="js/preventrefresh.js"></script>

</body>
</html>
