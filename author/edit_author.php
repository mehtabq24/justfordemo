<?php
session_start();

include_once '../class-master/config.php'; 

	if (isset($_POST['add_author'])) {
	
        $name = trim_data($_POST['name']);
        $position = trim_data($_POST['position']);
        $email = trim_data($_POST['email']);
        $password = trim_data($_POST['password']);
        $category = trim_data($_POST['category']);
        $parent_cat = trim_data($_POST['parent_cat']);
        $cat_name = trim_data($_POST['cat_name']);
        $message = trim_data($_POST['message']);
        $filename = trim_data($_FILES["uploadfile"]["name"]);
        $tempname = trim_data($_FILES["uploadfile"]["tmp_name"]);
        $date = date("Y-m-d");

        // file move to image folder
        $folder = "image/".$filename;
        if (move_uploaded_file($tempname, $folder))
        {$msg = "Image uploaded successfully";}
        else{$msg = "Failed to upload image";}

        // insert data to author table
        $query = "INSERT INTO `author`(`autr_text`, `author_name`, `author_position`, `author_email`, `author_password`, `category`, `new_category`, `parent_category`, `image`, `message`, `date`, `status`)
                VALUES ('This is demo',' $name','$position','$email','$password','$category','$cat_name','$parent_cat','$filename','$message','$date',1)";

        $result = mysqli_query($con,$query);
		if($result)
                {
			    //$product_id = mysqli_insert_id($con);
			    //echo $product_id;
                //header("Location: view_authors.php");
                //echo "inserted";
		          echo "done";

                }
        else
            {
                //echo "no";
            }
	}
  
              function trim_data($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;

}
	

//   if (isset($_POST['product_update'])) 
//   {
//         /*echo*/                      ///*echo*/ "<br>";//
//               $product_id = $_POST['product_id'];

//         $cat_id = mysqli_real_escape_string($con ,$_POST['product_category']);  
//         $product_name = mysqli_real_escape_string($con ,$_POST['pro_name']);
//         $pro_code = mysqli_real_escape_string($con ,$_POST['pro_code']);        
//         $price_mrp = mysqli_real_escape_string($con ,$_POST['pro_price']);
//         $price_sel = mysqli_real_escape_string($con ,$_POST['pro_sel_price']);	
//         $pro_desc = mysqli_real_escape_string($con ,$_POST['pro_desc']);   

//         $sql_update = "UPDATE `product_tbl` SET `cat_id`='$cat_id',`pro_name`='$product_name',`pro_code`='$pro_code',`pro_price`='$price_mrp',`pro_price_disc`='$price_sel',`pro_desc`='$pro_desc' WHERE `pro_id` = '".$product_id."'";

//        $result_update = $con->query($sql_update); 


//        $file_name = $_FILES["file"]["name"][0]; 

// if(!empty($file_name))
// {
//   echo $query_upd_img =  "UPDATE `pro_images` SET `pro_id`='0' , `status`='0' WHERE `pro_id`='".$_POST['product_id']."'";
//   $con->query($query_upd_img);
  
//       for ($i = 0; $i < 4; $i++)
//                 {
//                   $file_name = $_FILES["file"]["name"][$i]; 
//                   $file_size = $_FILES['file']['size'][$i];  
//                   $file_tmp = $_FILES['file']['tmp_name'][$i];  
//                   $file_type = $_FILES['file']['type'][$i];  
//                   $target_path = "ProdImages/" . $_FILES["file"]["name"][$i];

//                   $temp = explode(".", $_FILES["file"]["name"][$i]);
                  
//                   $extension = end($temp);
                  
//                   $filename = basename($_FILES["file"]["name"][$i]);
                  
//                   $filename = "HIL-Img-" . rand(111111111111,999999999999999).strrchr($filename, '.') ;
                   
//                    $target_path = "ProdImages/" . $filename;

//                   if (move_uploaded_file($file_tmp, "ProdImages/" . $filename))
//                     {

//                        $query_upload =  "INSERT INTO `pro_images`(`pro_id`, `img_name`, `status`) VALUES ('$product_id','$target_path','1')";
//                         $con->query($query_upload);
//             //            header('view_product.php');
//                         echo "file moved";
//                      }

//                       else
//                       {
//                         echo "not moved";
//                       }
                    
//                 } 

?>

