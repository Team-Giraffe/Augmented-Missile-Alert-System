<?php
$to = "saehyuns@hawaii.edu";
$from = "saehyunsong123@gmail.com";
$subject = "Test Message";
$message = "Test email message!\n";
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "Return-Path: $from\r\n";
$headers .= "CC: \r\n";
$headers .= "BCC: \r\n";
if (mail($to, $subject, $message, $headers)) {
    header('Location: ../confirmationPages/success.html');
    exit("The email has been sent!");
} else {
    echo "The email has failed!";
}
?>