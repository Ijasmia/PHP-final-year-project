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
<style>

</style>
</head>

<?php 
include "navigation.php";

?>

 <?php

                        $curr_date = date('Y-m-d');
                        $query = "SELECT *  FROM  users";
                        $user_count_total = mysqli_query($link,$query);
                        $total_user = mysqli_num_rows($user_count_total);

                      
                        $query = "SELECT * FROM postadd";
                        $get_query = mysqli_query($link,$query);
                        $total_queries = mysqli_num_rows($get_query);
						
						 $query = "SELECT * FROM postadd WHERE statusads = 'Pending'";
                        $get_Pending = mysqli_query($link,$query);
                        $total_Pending = mysqli_num_rows($get_Pending);
						


                        $query = "SELECT * FROM catogery";
                        $catogery = mysqli_query($link,$query);
                        $total_catogery = mysqli_num_rows($get_query);
						
						 $query = "SELECT * FROM modal";
                        $modal = mysqli_query($link,$query);
                        $total_modal = mysqli_num_rows($modal);
						
						$query = "SELECT * FROM report";
                        $report = mysqli_query($link,$query);
                        $total_report = mysqli_num_rows($report);
						
						$query = "SELECT * FROM request";
                        $request = mysqli_query($link,$query);
                        $total_request = mysqli_num_rows($request);
						
						$query = "SELECT * FROM joinus";
                        $joinus = mysqli_query($link,$query);
                        $total_joinus = mysqli_num_rows($joinus);
						
						$query = "SELECT * FROM districts";
                        $districts = mysqli_query($link,$query);
                        $total_districts = mysqli_num_rows($districts);
						
						$query = "SELECT * FROM citie";
                        $cities = mysqli_query($link,$query);
                        $total_cities = mysqli_num_rows($cities);
						
						 $query = "SELECT * FROM reloads WHERE status = 'Not_Completed'";
                        $r_Pending = mysqli_query($link,$query);
                        $totalr_Pending = mysqli_num_rows($r_Pending);
                        
                         $query = "SELECT * FROM reloads";
                        $re = mysqli_query($link,$query);
                        $reloads = mysqli_num_rows($re);
                        
                        
                          $query = "SELECT * FROM visitor_details";
                        $revisitor_details = mysqli_query($link,$query);
                        $reloadsvisitor_details = mysqli_num_rows($revisitor_details);
                       
                        ?>
						
						
<body class="fixed-nav sticky-footer bg-secondary" id="page-top">

	<div class="container mt-5">
	
	 
<br>


<div class="row">
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-primary o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">

</div>
<div class="mr-5"><b>Ads</b></div>
<div class="mr-5">Pending Ads: <?php echo $total_Pending; ?></div>
<div class="mr-5">Total Ads: <?php echo $total_queries; ?></div>
</div>
<a class="card-footer text-white clearfix small z-1" href="ads.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>



<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-warning o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">

</div>
<div class="mr-5"><b>User</b></div>
<div class="mr-5">Pending User: </div>
<div class="mr-5">Total User: <?php echo $total_user; ?></div>
</div>

<a class="card-footer text-white clearfix small z-1" href="user.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>



<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-success o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">

</div>
<div class="mr-5"><b>Report</b></div>
<div class="mr-5">Pending Report: <?php echo $total_request; ?></div>
<div class="mr-5">Total Report: <?php echo $total_report; ?></div>
</div>
<a class="card-footer text-white clearfix small z-1" href="reports.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>



<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">

</div>
<div class="mr-5"><b>Joint</b></div>
<div class="mr-5">Total Joint: <?php echo $total_joinus; ?></div>
</div>
<a class="card-footer text-white clearfix small z-1" href="joint.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>


<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">

</div>
<div class="mr-5"><b>catogery</b></div>
<div class="mr-5">Total catogery: <?php echo $total_catogery; ?></div>
</div>
<a class="card-footer text-white clearfix small z-1" href="addcatogery.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>

<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">

</div>
<div class="mr-5"><b>Add City</b></div>
<div class="mr-5">Total City: <?php echo $total_cities; ?></div>
</div>
<a class="card-footer text-white clearfix small z-1" href="addcity.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>

<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-success o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">

</div>
<div class="mr-5"><b>visitor</b></div>
<div class="mr-5">Total visitor: <?php echo $reloadsvisitor_details; ?></div>
</div>
<a class="card-footer text-white clearfix small z-1" href="visiter.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>

</div>
</div>
</br></br></br></br></br>
	<?php include "foter.php"; ?>
</body>
</html>