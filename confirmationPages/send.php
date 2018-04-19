<?php
//Format "+x(xxx)xxx-xxxx@carrier-name
$to = "8087229842@tmomail.net";
$from = "saehyunsong123@gmail.com";
$subject = "Test Message";
$message = "Test text message!\n";
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "Return-Path: $from\r\n";
$headers .= "CC: \r\n";
$headers .= "BCC: \r\n";
if (mail($to, $subject, $message, $headers)) {
    echo "The text has been sent!";
} else {
    echo "The text has failed!";
}
$to = "akirav@hawaii.edu";
$message = "Test email message!\n";
if (mail($to, $subject, $message, $headers)) {
    echo "The email has been sent!";
} else {
    echo "The email has failed!";
}
header('Location: ../confirmationPages/success.html');
?>