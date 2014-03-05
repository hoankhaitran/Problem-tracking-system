<?PHP

require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->SetLanguage('en', 'C:\Xampp\htdocs\\');
$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;    

$mail->Username = "hoan.k.tran@gmail.com";
$mail->Password = "danmyou";

$mail->From = "hoan.k.tran@gmail.com";
$mail->FromName = "hoan.k.tran@gmail.com";
$mail->AddAddress("yaiba84dn@yahoo.com");

$mail->Subject = "First PHPMailer Message";
$mail->Body = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
$mail->WordWrap = 50;

if(!$mail->Send())
{
   echo 'Message was not sent.';
   echo 'Mailer error: ' . $mail->ErrorInfo;
}
else
{
   echo 'Message has been sent.';
}


?>