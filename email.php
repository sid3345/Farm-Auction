<?php

include('phpmailer/PHPMailerAutoload.php');
function sendmail($to, $subject, $content){
	$mail = new PHPMailer();
//$subject = "Test Mail using PHP mailer";
//$content = "<b>This is a test mail using PHP mailer class.</b>";
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "mailalternate@yandex.com";
$mail->Password = "alternatemail";
$mail->Host     = "smtp.yandex.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("mailalternate@yandex.com", "alternatemail");
$mail->AddReplyTo("sid3345@gmail.com");
$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->WordWrap   = 80;
$mail->MsgHTML($content);
$mail->IsHTML(true);

if(!$mail->Send()){ 
	$_SESSION["email"]=" Problem on sending mail<br>";
	//echo $msg;
}
else {
$_SESSION["email"]= " Your mail is sent, please check the mail box";
	
}
	//echo($_SESSION["email"]);
}
?>




