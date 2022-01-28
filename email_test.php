<?php


require_once('mail/class.php');

$mails = new MailSmsOtp;

$mails->mail("sandeepparekh10@gmail.com","Test","This is demo purpose");


?>