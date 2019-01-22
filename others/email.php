

<?php
$to      = 'brookeresendes@outlook.comcom';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: 13brr2@queensu.ca' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?> 
