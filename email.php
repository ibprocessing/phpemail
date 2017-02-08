<?php

//改成绝对路径映入
////
$rootPath = dirname(_FILE_);
require $rootPath.'/PHPMailermaster/PHPMailerAutoload.php';

$emailbody = file_get_contents("./emil/ibp-chinese.html");

$mail = new PHPMailer;  

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.aliyun.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->CharSet = "UTF-8";
$mail->Username = 'liuwenjiee@aliyun.com';                 // SMTP username
$mail->Password = 'dlalyyx2580';                           // SMTP password
// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('liuwenjiee@aliyun.com', 'Wenjie');
$mail->addAddress('Wenjie.liu@ibprocessing.com.au', 'Joe User');     // Add a recipient
// $mail->addAddress('wim.harrington@ibprocessing.com.au'); 
// Name is optional  'Wenjie.liu@ibprocessing.com.au' 865015063@qq.com 
$mail->addReplyTo('liuwenjiee@aliyun.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'iBP';
$mail->Body    = $emailbody;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}