<?php 
include('../class-master/config.php');
	
	if (isset($_POST['cat_id'])) {
		# code...
	$cat_id = $_POST['cat_id'];
    $sql_team = "SELECT * FROM `categories` WHERE status = '".$cat_id."' ORDER BY id DESC";                               
    $result_team = $con->query($sql_team);
    
    if(mysqli_num_rows($result_team)){

    	while($row_cat = $result_team->fetch_assoc())
		{
			?>	
			<option value="<?php echo $row_cat["cat_name"]; ?>"><?php echo $row_cat["cat_name"]; ?></option>
			<?php	
		}	
	}
	else
	{?> 
		<option>No Found</option>
	<?php 	
	}

  		}
	?>