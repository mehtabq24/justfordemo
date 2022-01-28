<?php

    require_once('class.phpmailer.php');

    class MailSmsOtp {
        
        function mail($to, $subject, $msg){
    	    $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = "smtp.gmail.com"; // Your Domain Name
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->Username = "mehtabq24@gmail.com"; // Your Email ID
            $mail->Password = "9920678707"; // Password of your email id
            $mail->From = "mehtabq24@gmail.com";
            $mail->FromName = "Mehtab";
            $mail->AddAddress ($to);
            $mail->IsHTML(true);
            $mail->Subject = $subject; 
            $mail->Body = $msg;
    		if(!$mail->Send()){
    			return 0;
                echo "not sent";
    		}else{
    			return 1;
                echo "mail sent success";
    		}
        }


    }
?>