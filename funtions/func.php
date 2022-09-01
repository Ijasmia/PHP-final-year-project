 <?php
include 'dbconnect.php';
	function getcity(){

	global $link; 
	
	
 $sql = "SELECT * FROM citie";
  $result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
            
			$nameofdistic = $row['nameofdistic'];
           $id_name = $row['vilage'];
                
		echo "
		
	
		 <option class='$nameofdistic' value='$id_name'>$id_name</option>
		
		";
		}
	
	}
	
	function getdistic(){

	global $link; 
	
	// UPDATE `cities`SET  `nameofdistic` = 'three' WHERE `district_id` = 3; php my admin ubdate
 $sql = "SELECT * FROM districts";
 
  $result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
            
			$district_id = $row['id'];
           $id_name = $row['name_en'];
                
		echo "
		
		 <option value='$id_name'>$id_name</option>
		
	
		
		
		";
		}
	
	}



function getgetogary(){

	global $link; 
	
	
 $sql = "SELECT * FROM catogery";
  $result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
            
		
           $catogory = $row['catogory'];
                
		echo "
		
	
		 <option value='$catogory'>$catogory</option>
		
		";
		}
	
	}
	
	function getmodal(){

	global $link; 
	
	
 $sql = "SELECT * FROM modal";
  $result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
            
			$catogory = $row['catogory'];
           $model = $row['model'];
                
		echo "
		
	
		 <option class='$catogory' value='$model'>$model</option>
		
		";
		}
	
	}

function getgetogaryoption(){

	global $link; 
	
	
 $sql = "SELECT * FROM catogery";
  $result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) {
            
		$value = $row['value'];
           $catogory = $row['catogory'];
                
		echo "
		
	
		 <option value='$value'>$catogory</option>
		
		";
		}
	
	}
	
	
?>	

	