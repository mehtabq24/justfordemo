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
        {
        	//$msg = "Image uploaded successfully";
		}
        else{
        	//$msg = "Failed to upload image";
        	}
        // insert data to author table
        $query = "INSERT INTO `author`(`author_text`, `author_name`, `author_position`, `author_email`, `author_password`, `category`, `new_category`, `parent_category`, `image`, `message`, `date`, `status`)
                VALUES ('This is demo',' $name','$position','$email','$password','$category','$cat_name','$parent_cat','$filename','$message','$date',1)";

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