<?php
//Format "+x(xxx)xxx-xxxx@carrier-name T-Mobile: tmomail.net ; AT&T: txt.att.net ; Verizon Wireless: vtext.com
$to = "8083893588@vtext.com";
$from = "SaeHyunSong@Saes-MBP.localdomain";
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
$to = "saehyuns@hawaii.edu";
$message = "Test email message!\n";
if (mail($to, $subject, $message, $headers)) {
    echo "The email has been sent!";
} else {
    echo "The email has failed!";
}
//header('Location: ../confirmationPages/success.html');
?>