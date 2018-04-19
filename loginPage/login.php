<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $date = new DateTime();
    $day = date('m/d/Y', $date->getTimestamp());
    $time = date('G:i:s', $date->getTimestamp());
    $data = 'Username: ' . $_POST['username'] . "\n" . 'Password: ' . $_POST['password'] . "\n" . "Date logged in: " . $day . "\n" . "Time logged in: " . $time . "\n" . "----------------------------------------------" . "\n";
    $ret = file_put_contents('../logs/login.txt', $data, FILE_APPEND | LOCK_EX);
    header('Location: ../startingPages/firstPage.html');
    if ($ret === false) {
        die('There was an error writing this file');
    } else {
        echo "$ret bytes written to file";
    }
} else {
    die('');
}
?>