<?php 

if (isset($_POST['delet'])) {

	
	$id = $_POST['id'];
	
	$sql = "select * from postadd where id='$id'";
	$result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
          
          
               $image1 = $row['image1'];
			   $image2 = $row['image2'];
			   $image3 = $row['image3'];
			  
			  
            $file1= 'image/image1/'.$image1;
			$file2= 'image/image1/'.$image2;
			$file3= 'image/image1/'.$image3;
			$file4= 'image/imagetum/'.$image1;
			$file5= 'image/imagetum/'.$image2;
			$file6= 'image/imagetum/'.$image3;
			
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
 echo "<script> document.location.href='myads';</script>";


}


	$results = mysqli_query($link, "SELECT * FROM postadd");


?>  
    