<?php

include('class-master/config.php');

 if(empty($_POST['img_id']))
{ ?>            
                <div class="col-sm-6">
    		         <div class="alert" style="background-color:#ff3232; margin-top:10px;"> 
    	                <a class="close" onclick="$('.alert').hide()">×</a>  
    	                <strong>Please select Image.</strong>
    		            </div>
		              </div>
<?php 
  }

  else 
  {

$sql_img = "UPDATE `pro_images` SET `front`= '1' WHERE `id` = '".$_POST['img_id']."'";
$result = mysqli_query($con, $sql_img);
if($result)
    { ?>

    <div class="col-sm-6">
    	<h4>Your Front Image has been saved.</h4>
        <a href="property/view_property.php">
          <button type="button" class="btn btn-success" style="margin-bottom: 0px;">Back to View Product</button>
        </a>
    </div>
    <?php	
}

}
 
?>

