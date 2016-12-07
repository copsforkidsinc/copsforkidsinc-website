<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include 'config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$subject = stripslashes($_POST['subject']);
$message = stripslashes($_POST['message']);


$error = '';



if(!$error)
{
$mail = mail(WEBMASTER_EMAIL, $subject, $message,
     $from="From: $name<$email>\r\nReturn-Path: $email";
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'Email sent!';
}

}


}
?>

<html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="action" value="submit">
Name: <input type="text" name="name"><br>
Email: <input type="text" name="email"><br>
Subject: <input type="text" name="subject"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" value="Send email"/>
</form>

</body>
</html> 
