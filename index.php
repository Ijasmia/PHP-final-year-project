<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
  
  require_once("dbconnect.php");
  
?>
<html>
  
<head>
       <title>AdsGray</title>
<meta name="title" content="AdsGray">

<meta name="description" 
content="AdsGray.com - Try Now For Free Adsgray. Easily Create An Online Store And Start Your job in adsgray. Buy and sell Products Online in Sri Lanka Adsgray.">

 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<meta name="keywords" content="AdsGray,ads,Ads,Gray,gray,adsgray,Earn, Money, online, And, Buy, and, sell, all, kinds, of, Products,">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="robots" content="index, nofollow">
<meta name="revisit-after" content="1 days">
   
<meta property="og:title" content="AdsGray.com- Buy and sell all kinds of Products on Online in Sri Lanka">
<meta property="og:description" content="post free ads sign up now ">
<meta property="og:url" content="https://adsgray.com/">
<meta property="og:url" content="https://adsgray.com">
<meta property="og:image" itemprop="image" content="https://adsgray.com/image/logo2.webp">
<meta property="og:type" content="article" />
<meta property="og:locale" content="en_GB" />
 
<link rel="shortcut icon" type="image/png" href="image/logo.png">
 <link rel="stylesheet" type="text/css" href="css/main.css">

 

</head>

	

						
<body>
    
    <?php 
include "navigation.php";
include  "funtions/fun.php";

?>

<br>

<div style="width:100%;margin: 40px auto;background:#eee;"><div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <!--
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
   -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="uploads/image/1.webp" alt="First slide">
	  <div class="carousel-caption d-md-block">
	      
	      <!--
          <h5><span style='color:#fff; font-size:14px'>First slide label</span></h5>
          <p><span style='color:#fff; font-size:14px'>Nulla vitae elit libero, a pharetra augue mollis interdum.</span></p>
           -->
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="uploads/image/2.webp" alt="Second slide">
	  <div class="carousel-caption d-md-block">
	  <!--
	  
          <h5><span style='color:#fff; font-size:14px'>First slietryrtytrde label</span></h5>
          <p><span style='color:#fff; font-size:14px'>Nulla vitae eliteretryrt libero, a pharetra augue mollis interdum.</span></p>
           -->
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="uploads/image/3.webp" alt="Third slide">
	  <div class="carousel-caption d-md-block">
	  <!--
	  
          <h5><span style='color:#fff; font-size:14px'>Frtretirst slfrtretide label</span></h5>
          <p><span style='color:#fff; font-size:14px'>Nulla vitaeio;po;o;i elit libero, a pharetra augue mollis interdum.</span></p>
          -->
        </div>
    </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="uploads/image/4.webp" alt="Second slide">
	  <div class="carousel-caption d-md-block">
	  <!--
	  
          <h5><span style='color:#fff; font-size:14px'>First slietryrtytrde label</span></h5>
          <p><span style='color:#fff; font-size:14px'>Nulla vitae eliteretryrt libero, a pharetra augue mollis interdum.</span></p>
           -->
        </div>
    </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="uploads/image/5.webp" alt="Second slide">
	  <div class="carousel-caption d-md-block">
	  <!--
	  
          <h5><span style='color:#fff; font-size:14px'>First slietryrtytrde label</span></h5>
          <p><span style='color:#fff; font-size:14px'>Nulla vitae eliteretryrt libero, a pharetra augue mollis interdum.</span></p>
           -->
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
			
				


		
 <form method="get" action="Search.php" enctype="multipart/form-data" style="margin:auto;">
  <!-- Another variation with a button -->
  <div class="input-group">
 
    <input type="text" name="user_query"  class="form-control"  placeholder="Search more" required > 
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <i class="fa fa-search"></i>
      </button>
      
      
      	
   
 <br>

	</form>
	
	
	
			
							
							 <div class="input-group-btn" style="position:unset">
                    <div class="btn-group" role="group" style="position:unset">
			 <div class="dropdown dropdown-lg">
                            <button type="button" class="form-control dropdown-toggle" data-toggle="dropdown">
<i class="fas fa-filter"></i></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                  <form method="get" action="filter.php" enctype="multipart/form-data" class="form-horizontal" role="form">	
							
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
									
									
									 <select name="Location" class="form-control" id='loc_select' required>
			                        <option value='' selected='selected' hidden='hidden'>District</option>
               
                                    <?php getdistic(); ?>
                
                                     </select>
									 <br>
									 
									   <select name="City" class="form-control" id='city_select'>
			<option value='' selected='selected' hidden='hidden'>City</option>
                
				  <?php getcity(); ?>
                 
            </select> <br>
			
			  <select name="Category" class="form-control" id='main_select' >
			<option value='' selected='selected' hidden='hidden'>Category</option>
               
				  <?php getgetogary(); ?>
            </select> <br>
       
           <select name="SCategory" class="form-control" id='sub_select'>
		   <option value='' selected='selected' hidden='hidden'>Brand</option>
                 
				   <?php getmodal(); ?>   
            </select>
									 
					<br>			

<select  name="status" class="form-control">
	<option value='' selected='selected' hidden='hidden'>Status</option>
	<option value='New' >New</option>
	<option value='Used' >Used</option>
	</select>
								
		 </div>
								 
                                  <div class="text-center">
                                  <button type="submit" class="btn btn-primary" name='search'><i class="fa fa-search"> Filter</i></button>
                                   </div>
                                </form>
								
								
                            </div>
                        </div>
					
                            </div>
                        </div>
				
            </div>
          </div>
        </div>
	</div>
</div>

 </div>
  </div>
<div class="container mt-3 mb-5">

 
  <ul class="cards">

  <?php

	$results_per_page = 20;  
  
    $query = "select * from postadd WHERE statusads = 'Accepted' order by adate desc";  
    $result = mysqli_query($link, $query);  
    $number_of_result = mysqli_num_rows($result);  
    
  if ($number_of_result < 1 ) {  
      echo"<span style='color:red;'>No Any Results Found... </span>";
    }
 
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
   
    $page_first_result = ($page-1) * $results_per_page;  
  
    
    $query = "SELECT *FROM postadd WHERE statusads = 'Accepted' order by adate desc LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($link, $query);  
      
   
    while ($row = mysqli_fetch_array($result)) {  
     
     
     
     	          $id = $row['id'];
                  $pro_image1 = $row['image1'];
                  $pro_title = $row['Ptitle'];
                  $pro_price = $row['price'];
                  $pro_status = $row['status'];
                  $pro_category = $row['category'];
				   $pro_date = $row['date'];
				   $pro_location = $row['location'];
				   $pro_city = $row['city'];
				   $adate = $row['adate'];
				   $date = $row['date'];
 
 
  ?>
    
	                         
	
	<li class="cards_item">
      <div class="card">
        <div class="card_image">
		
		
		
		<div class="thumbnail_images" id="thumbnail">
                   
				    <?php 
		  
		  if($pro_category == 'Job'){
					echo"
					
					<a href='jobdetails.php?id=$id'><img class='center' src='uploads/job/image/$pro_image1' alt='$pro_title AdsGray' width='120' ></a>
											
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
					<a href='details.php?id=$id'><img class='center' src='uploads/image/imagetum/$pro_image1' alt='buy $pro_title AdsGray' width='120' ></a>
											
					";
											
										}
			else{
				echo"
					<a href='details.php?id=$id'><img class='center' src='uploads/image/imagetum/$pro_image1' alt='buy $pro_title AdsGray' width='120' ></a>
					";
			}
		  
		  ?>
				   
				   
				   
		
		</div>
		
		
			</div>
		
		
		
		
        <div class="card_content">
          <h2 class="card_title">
		  
		  <?php 
		  
		  if($pro_category == 'Job'){
					echo"
					
					$pro_title
											
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
					$pro_title
											
					";
											
										}
			else{
				echo"
					$pro_title			
					";
			}
		  
		  ?></h2>
		  
          <p class="card_text">
		  
		  <a href='details.php?id=<?php echo $id ?>' style="text-decoration:none;">  <b><span style='color:#BC452C;'>
		  
		  <?php 
		  if($pro_category == 'Job'){
					echo"
					
						
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
					$pro_location
											
					";
											
										}
			else{
				echo"
					$pro_location			
					";
			}
		  
		  
		  ?></span> 
		  
		  <span style='color:#905548;'>
		  
		  <?php 
		  if($pro_category == 'Job'){
					echo"
								
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
					$pro_city
											
					";
											
										}
			else{
				echo"
					$pro_city	
					";
			}
		  
		 
		  
		  
		  ?></span></br></a>
		  
		  
		  
			 <span style='color:#055A09; font-size:10px'>
			 
			 <?php 
			 
			 if($pro_category == 'Job'){
					echo"
					
					
						$pro_status 					
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
					$pro_status 
											
					";
											
										}
			else{
				echo"
					$pro_status 	
					";
			}
			 
	
			 
			 ?></b></span>
			  </p>
			  
			  
			 <div class='addprice'>
			  <div><span style='color:red; font-size:14px'> <b>
			  
			  <?php 
			  
			  if($pro_category == 'Job'){
					echo"
							
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
					echo"
											
					RS $pro_price
											
					";
											
										}
			else{
				echo"
					RS $pro_price
					";
			}
			
			  
			  
			  ?></b></span></div>
			  
			  
			  
			 <div><span style='color:#bec5d1; font-size:10px'> <b><?php 
			 
			 
			 if($pro_category == 'Job'){
					echo"
							$date
					";
										 }
			else if($pro_category == 'Fashion' or 'Beauty' or 'Electronic' or 'Agriculture'){
											
			  echo get_time_ago("$adate");
											
										}
			else{
				echo get_time_ago("$adate");
			}
			 
			
			 ?></b></span> </div>
			 	
			 </div>
			 
		
         <!-- <button class="btn card_btn">see More</button> -->
        </div>
      </div>
    </li>
	
	
  
  <?php  } ?>

	
  </ul>
</div>



 <ul class="pagination justify-content-center">
<?php
if ($page > 1) {
	
echo '

 <li class="page-item"><a class="page-link" href="index?page=' . ($page - 1) . '"> <span>&#10094; Previous</span></a></li>';

}
  else {
	echo ' ';
}	


 
  
  
  for ($i = ($page - 1); $i <= ($page + 1); $i ++) {
    if ($i < 1)
        continue;
    if ($i > $number_of_page)
        break;
    if ($i == $page) {
        $class = "active";
    } else {
        $class = "page-a-link";
    }
   
  echo"
  <li class='page-item'><a class='page-link' class='$class' href='index?page=$i'><div class='$class'>$i</div></a></li>";

  }
  
 
  
  
  if (($number_of_page - ($page + 1)) >= 1) {
   echo"
   <div class='pagination'> <div class='page-before-after'>...</div></div>";

}
if (($number_of_page - ($page + 1)) > 0) {
    if ($page == $number_of_page) {
        $class = "active";
    } else {
        $class = "page-a-link";
    }
    echo"
	<li class='page-item'><a class='page-link' href='index?page=$number_of_page'> <div class='$class'>$number_of_page</div> </div></a></li>";
	
  }
  
  

if (($page >= 1) && ($page < $number_of_page)) {
echo '
<li class="page-item"><a class="page-link" href="index?page=' . ($page + 1) . '"> Next &#10095;</span></a></li>';

}
  	


 ?>
 
</ul>
 
</div>

</br>
<?php

 if (isset($_SERVER['REMOTE_ADDR'])) {

 $ipaddress = $_SERVER['REMOTE_ADDR'];
 $page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
 $referrer = 'index';
 $datetime = date("F j, Y, g:i a");
 $useragent = $_SERVER['HTTP_USER_AGENT'];
 
  $insert ="insert into visitor_details (ipaddress, page, referrer, datetime, useragent ) values('$ipaddress', '$page', '$referrer', '$datetime', '$useragent')";
 
   mysqli_query( $link,$insert);

  }
  
?>   


	<?php include "foter.php"; ?>
	
	<script src="js/city.js"></script>
</body>
</html>