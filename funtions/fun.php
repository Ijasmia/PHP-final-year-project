
<?php



function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'just now'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return '' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}



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


	

?>	

</body>
</html>	
	