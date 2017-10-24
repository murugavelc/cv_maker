<?php 
// Include confi.php
include_once('config.php');
/* connect to the db */

    $result =mysqli_query($link,"SELECT * FROM `resumes` where `deleted_at` = 0");
    $listCount=mysqli_num_rows($result);
		if($listCount > 0){
			while($mrow = mysqli_fetch_assoc($result)) {
				$resumes[] = $mrow;
			}
		}
        if($listCount){
			$return = array(
				"resumes" => $resumes,
				"status"  => $listCount.' Records found...'
			);
		}else{
			$return = array(
				"resumes" => $resumes,
				"status"  => "No result found"
			);
		}
  header('Content-type: application/json');
  echo json_encode($return);

       
?>