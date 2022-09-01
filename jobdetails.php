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
<meta property="og:url" content="https://adsgray.com/jobdetails?id=<?php echo $_GET["id"]; ?>">
<meta property="og:description" content="post free ultimate Products sign up now ">
<meta property="og:image" itemprop="image" content="https://adsgray.com/uploads/job/image/<?php echo $pro_image; ?>">
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
                 
                    <li class="breadcrumb-item active" aria-current="page">JOB_DETAILS</li>
					 
					
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
                
                  $pro_category = $row['category'];
				   $pro_subcategory = $row['Subcategory'];
				   $pro_date = $row['date'];
				  
				   $pro_description = $row['description'];
				   $pro_username = $row['username'];
				    $userid = $row['userid'];
				  
				    $image1 =  $row['image1'];
				      $image2 =  $row['image2'];
				        $image3 =  $row['image3'];
						
						$subTitle =  $row['subTitle'];
				      $information =  $row['information'];
				        $onlineUrl =  $row['onlineUrl'];
						$websitUrl =  $row['websitUrl'];
				        $file1 =  $row['file1'];
				        $file2 =  $row['file2'];
						$file3 =  $row['file3'];
						$file4 =  $row['file4'];
						
						$whatsapp =  $row['whatsapp'];
						
						
				     
	
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
								
								
                                        <img src='uploads/job/image/$image1' alt='' id='main_product_image' width='20%' height= '20%'> 
                                  
								";	
								}
							?> 
                                    
                              </div>      
							  <br>
                              <div align="center" >    
							  
						 <div class="heading"><?php echo $subTitle; ?></div>
				
		<hr>
					
							<br><br>
					
					<?php
	
				$extension  = pathinfo($image2, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								
								
                                        <img src='uploads/job/image/$image2' alt='' id='main_product_image' width='70%' height= '20%'> 
                                  
								";	
								}
							?> 
					<br><br>
					
					<?php
	
				$extension  = pathinfo($image3, PATHINFO_EXTENSION ); // jpg					
								if(	$extension== true){
								echo "
								
								
                                        <img src='uploads/job/image/$image3' alt='' id='main_product_image' width='70%' height= '20%'> 
                                  
								";	
								}
							?> 
					<br><br>
					  </div> 
					
                </div> 
            </div>
			
			
			<div class="col-md-5">
						<div class="product-details">
							
				<div class="detail">
				  <div class="heading"><?php echo $pro_title; ?></div>
		
				   <hr>
				    <div class="productdetail">Post On: <span style="color:#000; font-size:18px"><?php echo $pro_date; ?></span></div>
				   <hr>
					
				   <?php if($information == true){ 
				   
				   echo "
				   
				   <div class='productdetail'>Details:  <span style='color:green; font-size:18px' >$information</span></div>
				   <hr>
				   "; 
				   
				   
				   } 
				   ?>
					
				   
					<?php
					$extension1  = pathinfo($file1, PATHINFO_EXTENSION ); 					
								if(	$extension1 == true){
								echo "
								
								
								 <div class='productdetail'>Details in english:  <span style='color:blue; font-size:18px' >
								 <a href='uploads/job/file/$file1'>Download PDF</a>
								</span></div>
								<hr>
                                  
								";	
								}
							?> 
					
					
					
					
					<?php
					$extension2  = pathinfo($file2, PATHINFO_EXTENSION ); 					
								if(	$extension2 == true){
								echo "
								
								<div class='productdetail'>Details in singala:  <span style='color:blue; font-size:18px' >
                                     <a href='uploads/job/file/$file2'>Download PDF</a>
                                  </span></div>
								  <hr>
								";	
								}
							?> 
					
					
					
					<?php
					$extension3  = pathinfo($file3, PATHINFO_EXTENSION );					
								if(	$extension3 == true){
								echo "
								
								<div class='productdetail'>Details in Tamil:  <span style='color:blue; font-size:18px' >
                                        <a href='uploads/job/file/$file3'>Download PDF</a>
                                  </span></div>
								  <hr>
								";	
								}
							?> 
					
					
					
					<?php
					$extension4  = pathinfo($file4, PATHINFO_EXTENSION );					
								if(	$extension4 == true){
								echo "
								<div class='productdetail'>Application Form:  <span style='color:blue; font-size:18px' >
								    <a href='uploads/job/file/$file4'>Download PDF</a>
                                  </span></div>
								  	<hr>
								";	
								}
							?> 
					
				
					
					
					<?php 
					
					if($onlineUrl == true){ 
					
					echo "
					<div class='productdetail'>Apply Online:  <span style='color:blue; font-size:18px' >
					<a href='$onlineUrl'>Click Here</a>
					</span></div>
						<hr>
					"; }
					
					?>
					
					<?php 
					
					if($websitUrl == true){ 
					
					echo "
					<div class='productdetail'>Web Sources:  <span style='color:blue; font-size:18px' >
					 <a href='$websitUrl'>Click Here</a>
					
					</span></div>
					<hr>
					"; }
					
					?>
					
					<?php 
					
					if($pro_description == true){ 
					
					echo "
					<div class='productdetail'>Description:  <span style='color:blue; font-size:18px' >
					 $pro_description
					
					</span></div>
					<hr>
					"; }
					
					?>
					
					
					
					
					
				
	      </div>
	    
							 <div align="center" >  
<a href=' https://wa.me/94hjkl'><button class='btn btn-success ml-2'><i class='fa fa-comments'></i>Joint WhatsApp Group</button></a>
								
      
	 <br><hr>
		
			<button class="share" id="answer-example-share-button"><i class ="fa fa-share"> Share Link</i></button>
			
			
			<button type="button" class="report" data-toggle="modal" data-target="#myModa">Any Issu Let Me Know</button>
	<br>	<br>
		</div>
			
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