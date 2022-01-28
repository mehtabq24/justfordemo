<?php
// $servername = "localhost";
// $username = "simatrys_simameht_user";
// $password = "}dO^%%azVTRM";
// $database = "simatrys_simameht_db";

$servername = "localhost";
$username = "root";
$password = "";
$database = "authors_data";

$con = new mysqli($servername, $username, $password,$database);


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    //echo "not conn";
    
}
else{
        //echo "connected";
}
?>
