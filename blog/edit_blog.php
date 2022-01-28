<?php
	session_start();
	include_once '../class-master/config.php'; 
	if (isset($_POST['add_author'])) {
	
        $p_cat = trim_data($_POST['p_cat']);
        $p_sub_cat = trim_data($_POST['p_sub_cat']);
        $p_title = trim_data($_POST['p_title']);
        $p_desc = trim_data($_POST['p_desc']);
        $p_content = trim_data($_POST['p_content']);
        $filename = trim_data($_FILES["uploadfile"]["name"]);
        $tempname = trim_data($_FILES["uploadfile"]["tmp_name"]);
        $date = date("Y-m-d");

        // file move to image folder
        $folder = "image/".$filename;
        if (move_uploaded_file($tempname, $folder))
        {
        	//$msg = "Image uploaded successfully";
		}
        else{
        	//$msg = "Failed to upload image";
        	}
        // insert data to author table
        $query = "INSERT INTO `new_blog`(`post_cat`, `post_sub_cat`, `post_title`, `post_desc`, `post_content`,
        `post_img`,`post_author`, `post_review_by`, `post_update_by`, `post_add_by`, `post_review_from`, `status`) VALUES ('$p_cat','$p_sub_cat','$p_title','$p_desc','$p_content','$filename','john','joy','developer','php developer','developers',1)";

        $result = mysqli_query($con,$query);
		if($result){
			echo "done";
		}
	}

	function trim_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
	    return $data;
	}