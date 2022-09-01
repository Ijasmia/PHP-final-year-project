<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
  require_once("dbconnect.php");
  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AdsGray Ads Details</title>
       
       <?php 
				include 'dbconnect.php';		
				$id=$_GET['id'];
				$sql = "select * from postadd where id='$id' AND statusads = 'Accepted'";
					$result = mysqli_query($link, $sql);
					
					if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
											$id = $row['id'];
                  $pro_title = $row['Ptitle'];
                  $pro_price = $row['price'];
                   $pro_image = $row['image1'];
				   
				  ?>
       
 <meta property="og:title" content="<?php echo $pro_title; ?> Price: RS <?php echo $pro_price; ?> limited time offer">
<meta property="og:url" content="https://adsgray.com/details?id=<?php echo $_GET["id"]; ?>">
<meta property="og:description" content="post free ultimate Products sign up now ">
<meta property="og:image" itemprop="image" content="https://adsgray.com/uploads/image/imagetum/<?php echo $pro_image; ?>">
<meta property="og:type" content="article">
<meta property="og:locale" content="en_GB">
       
       
   <?php   }} ?>
       
       <link rel="shortcut icon" type="image/png" href="https://adsgray.com/css/logo.png">
        <link rel="stylesheet" type="text/css" href="css/detail.css">

</head>

<?php 
include "navigation.php";
include  "funtions/fun.php";

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
								
							
								$sql = "select * from postadd where id='$id' AND statusads = 'Accepted'";
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
								
								
                                        <img src='uploads/image/image1/$image1' alt='' id='main_product_image' width='100%' height= '100%'> 
                                  
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
                                       <img onclick='changeImage(this)' src='uploads/image/image1/$image1' width='60' height='60'>
                                   </li>
								";	
								}
							?>      
							
							
							
							
                            
							 <?php
	
				$extension  = pathinfo($image2, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								
								<li>
                                         <img onclick='changeImage(this)' src='uploads/image/image1/$image2' width='60' height='60'>
                                   </li>
								";	
								}
							?>
					
							
							
							
                           
							
							 <?php
	
				$extension  = pathinfo($image3, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								 <li>
								
                                          <img onclick='changeImage(this)' src='uploads/image/image1/$image3' width='60' height='60'>
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
		
			<button class="share" id="answer-example-share-button"><i class ="fa fa-share"> Share Link</i></button>
			
			
			<button type="button" class="report" data-toggle="modal" data-target="#myModa">Report Ad</button>
	<br>	<br>
		</div>
			
		</div>	
	 </div>		
	</div>
		<!--	
			<div class="container mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">
          
          
            <div class="coment-bottom bg-white p-2 px-4">
                <div class="d-flex flex-row add-comment-section mt-4 mb-4"><img class="img-fluid img-responsive rounded-circle mr-2" src="https://i.imgur.com/KLeobJk.jpg" width="38"><input type="text" class="form-control mr-3" placeholder="Add comment"><button class="btn btn-primary" type="button">Comment</button></div>
                <div class="collapsable-comment">
                    <div class="d-flex flex-row justify-content-between align-items-center action-collapse p-2" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1"><span>Comments</span><i class="fa fa-chevron-down servicedrop"></i></div>
                    <div id="collapse-1" class="collapse">
                        <div class="commented-section mt-2">
                            <div class="d-flex flex-row align-items-center commented-user">
                                <h5 class="mr-2">Corey oates</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">4 hours ago</span>
                            </div>
                            <div class="comment-text-sm"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
                            <div class="reply-section">
                                <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">10</span><span class="dot ml-2"></span>
                                    <h6 class="ml-2 mt-1">Reply</h6>
                                </div>
                            </div>
                        </div>
                        <div class="commented-section mt-2">
                            <div class="d-flex flex-row align-items-center commented-user">
                                <h5 class="mr-2">Samoya Johns</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">5 hours ago</span>
                            </div>
                            <div class="comment-text-sm"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</span></div>
                            <div class="reply-section">
                                <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">15</span><span class="dot ml-2"></span>
                                    <h6 class="ml-2 mt-1">Reply</h6>
                                </div>
                            </div>
                        </div>
                        <div class="commented-section mt-2">
                            <div class="d-flex flex-row align-items-center commented-user">
                                <h5 class="mr-2">Makhaya andrew</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">10 hours ago</span>
                            </div>
                            <div class="comment-text-sm"><span>Nunc sed id semper risus in hendrerit gravida rutrum. Non odio euismod lacinia at quis risus sed. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod. Enim facilisis gravida neque convallis a. In mollis nunc sed id. Adipiscing elit pellentesque habitant morbi tristique senectus et netus. Ultrices mi tempus imperdiet nulla malesuada pellentesque.</span></div>
                            <div class="reply-section">
                                <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">25</span><span class="dot ml-2"></span>
                                    <h6 class="ml-2 mt-1">Reply</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
			
			
			
		-->	
			
			
			
			
		
			

 
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
		  
		  
		  
		  
		  <div class="container">

  <!-- The Modal -->
  <div class="modal" id="myModa">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Report Ad Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
      	<form style='text-align: center' method='POST' action='report' >
      	    
      	    
   <input type='hidden' name='Aid' value='<?php echo $id; ?>' >   

  <div class="form-outline mb-3">
    <input type="text" name="name" placeholder="Reporter Name" class="form-control" required/>
  </div>

  
   <div class="form-outline mb-3">
    <input type="number" name="phone" placeholder="Phone Number" class="form-control" required/>
  </div>
  
  <div class="form-outline mb-3">
    <input type="email" name="email" placeholder="Email" class="form-control" required/>
  </div>
  
   <div class="form-outline mb-4">
    <textarea class="form-control" name='report' rows="4" placeholder='Type Your Report or problams'></textarea>
  
  </div>
  
 
  <!-- Submit button -->
  <button type="submit"  name='upload' class="btn btn-warning btn-block mb-3">Send Report</button>
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
	

            
<?php include "foter.php"; ?>
	
	
	
	
	
<script>
	function changeImage(element) {

var main_prodcut_image = document.getElementById('main_product_image');
main_prodcut_image.src = element.src;


}
	
    
     $('#answer-example-share-button').on('click', () => {
  if (navigator.share) {
    navigator.share({
        title: 'Web Share In www.adsgray.com',
        text: '',
        url: 'https://www.adsgray.com/details?id=<?php echo $_GET["id"]; ?>',
      })
      .then(() => console.log(''))
      .catch((error) => console.log('Error sharing', error));
  } else {
    console.log('Share not supported on this browser, do it the old way.');
  }
});

    
    
</script>

</body>
</html>