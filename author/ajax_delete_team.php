<?php 

include('../class-master/config.php');

	 $auther_id = $_POST['team_id'];


     $sql_delete = "DELETE FROM `author` WHERE `id`='$auther_id' ";
	 $result = $con->query($sql_delete);
	
	 if ($result) {
	 	//echo "inserted";
	 }
	 else{
	 	//echo "not inserted";
	 }
?>
