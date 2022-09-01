 <?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
  require_once("dbconnect.php");
  
?>
 <?php 
include "navigation.php";
include  "funtions/fun.php";

?>
<html>
<head>
<title>AdsGray.com - search results</title>
 
   
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />




<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
 
   
 
 
<meta property="og:title" content="Search all kinds of Products on Online in Sri Lanka" />
<meta property="og:url" content="https://adsgray.com/Search.php" />
<meta property="og:description" content="post free ads sign up now ">
<meta property="og:image" itemprop="image" content="https://adsgray.com/css/logo1.png"/>
<meta property="og:type" content="article" />
<meta property="og:locale" content="en_GB" />
 
<link rel="shortcut icon" type="image/png" href="https://adsgray.com/css/logo.png">

<link rel="stylesheet" type="text/css" href="css/main.css">

	</head>

	

						
<body>

<br><br><br>
 <div class="col-12 p-0">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-1 px-3">
                    <li class="breadcrumb-item"><a href="index" style="text-decoration:none">HOME</a></li>
                
                    <li class="breadcrumb-item" aria-current="page">SEARCH</li>
					 
					
                </ol>
				
            </nav>
	
        </div>



		
 <form method="get" action="Search.php" enctype="multipart/form-data" style="margin:auto;max-width:330px">
  <!-- Another variation with a button -->
  <div class="input-group">
 
    <input type="text" name="user_query"  class="form-control"  placeholder="Search in AdsGray" required > 
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
 
	</form>
<br>
 <div class="result">Your Search Result On : <?php echo $_GET["user_query"]; ?></div>

 
 <div class="container mt-3 mb-5">

 
  <ul class="cards">


    <?php
	
	$search_query=$_GET['user_query'];

    $results_per_page = 20;  
  
    //find the total number of results stored in the database  
    $query = "select * from postadd  WHERE statusads = 'Accepted' AND Ptitle like '%$search_query%' order by adate desc"; 
    $result = mysqli_query($link, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
   if ($number_of_result < 1 ) {  
      echo"
      <br> <br><br> <br>
      <div class='container mt-5 mb-5'>
      <div style='text-align:center; color:#0000FF;'><span style='color:red;'>No Any Results Found... </span><br>
      
      Going To Home Page And Search More<br> <br>
      <a href='https://adsgray.com/' style='text-decoration:none'>HOME</a> </div>
   </div>
    <br>
      ";
    }
 
  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  

        $page = $_GET['page'];  
    }  
  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "select * from postadd WHERE statusads = 'Accepted' AND Ptitle like '%$search_query%' order by adate desc LIMIT " . $page_first_result . ',' . $results_per_page; 


	
    $result = mysqli_query($link, $query);  
      
    //display the retrieved result on the webpage  
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
					
					<a href='jobdetails.php?id=$id'><img class='center' src='uploads/job/image/$pro_image1' alt=' uploads/job/image/$pro_image1  buy $pro_title AdsGray' width='120' ></a>
											
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
	
echo ' <li class="page-item"><a class="page-link" href="Search?user_query='.$search_query.'&page=' . ($page - 1) . '"> <span>&#10094; Previous</span></a></li>';



}
  else {
	echo ' ';
}	


 
  
  
  for ($i = ($page - 1); $i <= ($page + 1); $i ++) {
    if ($i < 1)
        continue;
	
    if ($i > $number_of_page){
        break;
	}
	
    if ($i == $page) {
        $class = "active";
    } else {
        $class = "page-a-link";
    }
   
  echo"<li class='page-item'><a class='page-link' class='$class' href='Search?user_query=$search_query&page=$i'><div class='$class'>$i</div></a></li>";
  

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
    echo"<li class='page-item'><a class='page-link' href='Search?user_query=$search_query&page=$number_of_page'> <div class='$class'>$number_of_page</div> </div></a></li>";
  }
  
  

  
  // If it's not the last page, make a next button:
if (($page >= 1) && ($page < $number_of_page)) {
echo '<li class="page-item"><a class="page-link" href="Search?user_query='.$search_query.'&page=' . ($page + 1) . '"> Next &#10095;</span></a></li>';


}
  else {
	echo '';
}		
 ?>
</ul>
 
</div>

</br>
<?php

 if (isset($_SERVER['REMOTE_ADDR'])) {

 $ipaddress = $_SERVER['REMOTE_ADDR'];
 $page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
 $referrer = 'search';
 $datetime = date("F j, Y, g:i a");
 $useragent = $_SERVER['HTTP_USER_AGENT'];
 
  $insert ="insert into visitor_details (ipaddress, page, referrer, datetime, useragent ) values('$ipaddress', '$page', '$referrer', '$datetime', '$useragent')";
 
   mysqli_query( $link,$insert);

  }
  
?> 
 </body>
</html>