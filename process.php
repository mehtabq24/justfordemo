<?php
  //include_once "db_connect.php";

// echo $post_FirstName = $_POST['first'];
// echo $post_LastName = $_POST['last'];
// echo $post_email = $_POST['email'];
// echo $post_fruit = $_POST['fruit'];
// echo $post_file = $_FILES['file']['name'];

echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";


  // $addData = "INSERT INTO details (firstname, lastname) VALUES ('$post_FirstName', '$post_LastName')";

  // if ($conn->query($addData) === TRUE) {
  //   echo "Working";
  // } else {
  //   echo "Not working";
  // }
?>
   if (data == "done") {
          alert("Author Added Successfully");  
        }
        else
        {
            alert("OOPS! Something Wrong")
        }