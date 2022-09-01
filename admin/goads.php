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
    
        <link rel="stylesheet" type="text/css" href="../css/detail.css">

</head>

<?php 
include "navigation.php";
include  "../funtions/fun.php";

?>

 <body>
 </br></br></br>
 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index" style="text-decoration:none">HOME</a></li>
                 
                    <li class="breadcrumb-item active" aria-current="page">DETAILS</li>
					 
					
                </ol>
				
            </nav>
	
        </div>
 
 <?php 
						
								$id=$_GET['id'];
								
							
								$sql = "select * from postadd where id='$id'";
								if (!$link) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($link, $sql);
								
									$number_of_result = mysqli_num_rows($result);  
    
     if ($number_of_result < 1 ) {  
      echo"
      
      
      
       <br> <br><br> <br>
      <div class='container mt-5 mb-5'>
      <div style='text-align:center;'>
      <span style='color:#C4160B; font-size:20px'>This product is soldout</span><br>
        <span style='color:#C4160B; font-size:20px'>මෙම නිෂ්පාදනය විකුණා ඇත</span><br>
          <span style='color:#C4160B; font-size:20px'>இந்த தயாரிப்பு விற்கப்பட்டது</span><br>
     <br>
      Going To Home Page And See More Results<br>
      
      මුල් පිටුවට ගොස් තවත් ප්‍රති .ල බලන්න
      <br>
      முகப்பு பக்கத்திற்குச் சென்று மேலும் முடிவுகளைப் பார்க்கவும்<br>
      <br><a href='https://adsgray.com/' style='text-decoration:none'><b>HOME</b></a> </div>
      
   </div>
   
    <br><br> <br>
      
      
      
      ";
    }
					
				
								
								
								if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
						$id = $row['id'];
                  $pro_title = $row['Ptitle'];
                  $pro_price = $row['price'];
                  $pro_status = $row['status'];
                  $pro_category = $row['category'];
				   $pro_subcategory = $row['Subcategory'];
				   $pro_date = $row['date'];
				   $pro_location = $row['location'];
				   $pro_city = $row['city'];
				   $pro_description = $row['description'];
				   $pro_username = $row['username'];
				    $userid = $row['userid'];
				   $pro_phone = $row['phone'];
				    $Stock = $row['stock'];
				    $image1 =  $row['image1'];
				      $image2 =  $row['image2'];
				        $image3 =  $row['image3'];
				  $whatsapp = $row['whatsapp'];
				  $adate = $row['adate'];
				  $pro_statusresan = $row['statusresan'];
				  $pro_statusads = $row['statusads'];
				  
									?>
 
 
 
 <div class="container mt-4 mb-4">
   	<div class="card">
        <div class="row g-0">
            <div class="col-md-6 border-end">
                <div class="d-flex flex-column justify-content-center">
                    <div class="main_image">


					<?php
	
				$extension  = pathinfo($image1, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								
								
                                        <img src='../image/image1/$image1' alt='' id='main_product_image' width='100%' height= '100%'> 
                                  
								";	
								}
							?> 
                                    
                                    
                               
                                    
                         
					
					
					
					
					</div>
                    <div class="thumbnail_images">
                        <ul id="thumbnail">
                          
							
							
							<?php
	
				$extension  = pathinfo($image1, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								
								  <li>
                                       <img onclick='changeImage(this)' src='../image/image1/$image1' width='60' height='60'>
                                   </li>
								";	
								}
							?>      
							
							
							
							
                            
							 <?php
	
				$extension  = pathinfo($image2, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								
								<li>
                                         <img onclick='changeImage(this)' src='../image/image1/$image2' width='60' height='60'>
                                   </li>
								";	
								}
							?>
					
							
							
							
                           
							
							 <?php
	
				$extension  = pathinfo($image3, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								 <li>
								
                                          <img onclick='changeImage(this)' src='../image/image1/$image3' width='60' height='60'>
                                   </li>
								";	
								}
							?>
					
							
							
							
							
							
                           
                        </ul>
                    </div>
                </div> 
            </div>
			
			
			<div class="col-md-5">
						<div class="product-details">
							
				<div class="detail">
				  <div class="heading"><?php echo $pro_title; ?></div>
		
			<hr>
			 <div class="productdetail">
			     
			     
			     <?php
			     
			     if( $Stock == 'In Stock Now'){
			     
			     	echo "
									
						<span style='color:green; font-size:18px'>$Stock</span>
								";
			     }
			     else{
			         echo "
									
						<span style='color:red; font-size:18px'>$Stock</span>
								";
			         
			     }
			     
			     ?>
			     </div>
				   <hr>
				    <div class="productdetail">Posd By:  <span style="color:#000; font-size:18px" ><?php echo $pro_username; ?></span></div>
				    <div class="productdetail">Item No:  <span style="color:#000; font-size:18px" ><b><?php echo $id; ?></b></span></div>
                 <div class="productdetail">Category:  <span style="color:#000; font-size:18px"><?php echo $pro_category; ?></span></div>
				 <div class="productdetail">Subcategory:  <span style="color:#000; font-size:18px"><?php echo $pro_subcategory; ?></span></div>
				 <div class="productdetail">Location:  <span style="color:#000; font-size:18px"><?php echo $pro_location; ?></span></div>
				 <div class="productdetail">City:  <span style="color:#000; font-size:18px"><?php echo $pro_city; ?></span></div>
				
			
				   <div class="productdetail">Post Date: <span style="color:#000; font-size:18px"><?php echo get_time_ago("$adate"); ?></span></div>
				<div class="productdetail">PRICE: <span style="color:red; font-size:18px"><b>Rs <?php echo $pro_price; ?></b></span></div>
				
				<div class="productdetail">Status:  <span style="color:green; font-size:18px"><?php echo $pro_status; ?></span></div>
				<hr>

				<div class="productdetail">DESCRIPTION:  <span style="color:#000; font-size:18px"><?php echo $pro_description; ?></span></div>
	      </div>
	    	<hr>
	    	
     
   
							 <div align="center" >  
     
     <a href="tel:<?php echo $pro_phone; ?>"><button class="btn btn-primary ml-2" ><i class="fa fa-phone"></i> Call</button></a>
     
       <?php
	

								if(	$whatsapp == true){
								echo "
									
							<a href=' https://wa.me/94$whatsapp'><button class='btn btn-success ml-2'><i class='fa fa-comments'></i>WhatsApp</button></a>
								";
							
								}
							?>
							
	  <button type="button" class="btn btn-info ml-2 " data-toggle="modal" data-target="#myModal">
   Order
  </button>
		
		<hr>
		
		<br>
		</div>
			
			
			
					
		<form action='ads.php' method='post' enctype='multipart/form-data'>

	           <input type='hidden' name='id' value='<?php echo $id ?>'>
			   <input type='hidden' name='adate' value='<?php echo time(); ?>'>
	          
  <div class="form-group">
					<select name='statusads' class="form-control" id='main_select' required>
			<option value='<?php echo $pro_statusads ?>' hidden='hidden'><?php echo $pro_statusads ?></option>
			<option value='Pending'>Pending</option>
			<option value='Rejected'>Rejected</option>
			<option value='Accepted'>Accepted</option>
		</select>
		</div>
		  <div class="form-group">
				<select name='statusresan' class="form-control" id='sub_select' required>
			<option value='<?php echo $pro_statusresan  ?>' hidden='hidden'><?php echo $pro_statusresan  ?></option>
		
			<option class='Rejected' value='This Ad not Allowed in Our Website'>Not Allowed</option>
			<option class='Rejected' value='Not Match Your Phone Number.. Message Send on Ad Phone Number'>phone number</option>
			<option class='Rejected' value='We Are Allow Only five Ads in Free User'>Limited</option>
			<option class='Accepted' value='Your Ad Now on Live'>Know Public</option>
		</select>
		</div>
	
		<input type='submit' name='submit' value='submit' class="btn btn-warning">
	
</form>			
			
			
		</div>	
	 </div>		
	</div>

 
</div>
</div>						
		  
		
		
	  
<div class="container">

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Orders On Web</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
      	<form style='text-align: center' method='POST' action='orders' >
      	    
      	    
    <input type='hidden' name='userid' value='<?php echo $userid; ?>' > 
   <input type='hidden' name='adsid' value='<?php echo $id; ?>' >   
  <!-- Name input -->
  <div class="form-outline mb-3">
    <input type="text" name="name" placeholder="Name" class="form-control" required/>
  </div>


 <div class="form-outline mb-3">
    <input type="text" name="address" placeholder="Shipping Address" class="form-control" required/>
  </div>
  
   <div class="form-outline mb-3">
    <input type="number" name="Pnumber" placeholder="Phone Number" class="form-control" required/>
  </div>
  
  <div class="form-outline mb-3">
    <input type="number" name="Wnumber" placeholder="Whatsapp Number" class="form-control" />
  </div>

 <div class="form-outline mb-4">
    <textarea class="form-control" name='comments' rows="2" placeholder='Any comments'></textarea>
  
  </div>
  <!-- Submit button -->
  <button type="upload" name='upload' class="btn btn-primary btn-block mb-3">Send</button>
</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>	  
		  
		  
		  
		  
	
		  
		  
 <?php	}	}?>
	

	
<script>
	function changeImage(element) {

var main_prodcut_image = document.getElementById('main_product_image');
main_prodcut_image.src = element.src;


}
	

    
</script>

</body>
</html>