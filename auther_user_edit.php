<?php
    session_start();
    $msg = '';

    if (isset($_POST['login'])) {
        # code...
       $user = $_POST['username'];
       $pas= $_POST['password'];
       $msg = "";
       if ($pas=='admin')
       {
           $_SESSION['admin_is_login'] = $user;
           echo "done";
          // echo "<script>window.location.href='main_dashboard.php';</script>";
       }
       elseif ($pas=="author")
        {

        	  $_SESSION['author_is_login'] = $user;
           	  echo "done";
        }



    }
?>
