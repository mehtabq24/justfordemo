<?php 

    function set_token($length = 45) {

        if(!isset($_COOKIE['token'])){

            $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ123456789";

            $validCharNumber = strlen($validCharacters);

            $result = "";

            for ($i = 0; $i < $length; $i++) {

                $index = mt_rand(0, $validCharNumber - 1);

                $result .= $validCharacters[$index];

            }

            setcookie('token', $result, time() + (86400 * 3),'/');

        }

    }

	//echo $_COOKIE["token"];
	
    function get_token() {
        return $_COOKIE['token'];
    }


    function getUserName() {
        
        $sql="Select * from `user` where `id` = 1";
        $result = mysql_query($sql);
        $info = mysql_fetch_array($result);
        if($info['name'] == "" || $info['name'] == "N/A") {
            return "N/A";
            exit;
        } else {
            return $info['name'];
        }
    }

function checklogin() {
    if(isset($_COOKIE['username']) && isset($_COOKIE['pass'])) {
        $sql = " select * from `user` where `name` = '" . $_COOKIE['username'] . "' and `password` = '" . $_COOKIE['pass']. "'";
        $res = mysql_query($sql);
        $info = mysql_fetch_array($res);
        $_SESSION['user_id'] = $info['id'];
    } else {
        header('Location:account');exit();
    }
return $_SESSION['user_id'];
}
?>