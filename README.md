# Augmented-Missile-Alert-System (AMAS)
* [Team Project](https://laulima.hawaii.edu/portal/site/MAN.XLSICS414ba.201830/tool/8ee0f9b5-a23a-4623-be7f-d2485e060a13/question/6244052/q31326262/-/list)
* [Installation](#installation)
  * [Install Local Server Environments](#install-local-server-environments)
  * [How to Install AMAS Program](#how-to-install-amas-program)
  * [How to Run AMAS Program](#how-to-run-amas-program)
* [Overview](#overview)
  * [Directory Structure](#directory-structure)
  * [File and Program Descriptions](#file-and-program-descriptions)
    * [User Interface Files](#user-interface-files)
    * [Functionality and Log Files](#functionality-and-log-files)

# Installation

## Install Local Server Environments
First, you will need to install and are not limited to [WAMP](http://www.wampserver.com/en/), [MAMP](https://www.mamp.info/en/), or [XAMP](https://www.apachefriends.org/index.html)! Please follow instructions on each respective pages for installation. I suggest MAMP as I will be using it personally. 

## How to Install AMAS Program
Leave the terminal or command prompt open and go to our [github page](https://github.com/Team-Giraffe/Augmented-Missile-Alert-System). Download the zip containing the AMAS program files and store / unzip it into whatever directory you'd like to store it in.

## How to Run AMAS Program
Go to your MAMP preferences and under WebServer you should see an option to choose your document root. Change that document root to the directory containing the files the AMAS program files. 

![Preferences Picture](https://github.com/Team-Giraffe/Augmented-Missile-Alert-System/blob/master/Screen%20Shot%202018-04-19%20at%209.31.31%20AM.png)

Next, start up your servers. 

![Starting Server Picture](https://github.com/Team-Giraffe/Augmented-Missile-Alert-System/blob/master/Screen%20Shot%202018-04-19%20at%209.31.45%20AM.png)

After starting up your servers, open up the browser and type in localhost:(APACHE PORT #)/loginPage/loginPage.php

![Accessing Environment Picture](https://github.com/Team-Giraffe/Augmented-Missile-Alert-System/blob/master/Screen%20Shot%202018-04-19%20at%209.31.22%20AM.png)

Voila! You should see the start page now!

# Overview

## Directory Structure
The top-level directory structure contains:

```
choosingPages/                # Holds the code for the user selection pages.
  choose-emergency.html       # Holds the code for the user to choose an emergency for the alert.
  choose-location.html        # Holds the code for the user to choose a location for the alert.
  choose-medium.html          # Holds the code for the user to choose a medium / media for the alert.
  
confirmationPages/            # Holds the sqlite3 database mydb1 and the server program to simulate a different computer.
  checklist.html              # Holds the code for the user to choose from an array of options in a checklist.
  confirmation.html           # Holds the code for the user to confirm their selections.
  fconfirmation.html          # Holds the code for the user to confirm again about their selections.
  send.php                    # Holds the code that sends out the alert via text message and email.
  success.html                # Holds the code that displays the user with a success message.
  
loginPage/                    # Holds the sqlite3 database mydb2 and the server program to simulate a different computer.
  login.php                   # Holds the code that sends out the alert via text message and email.
  loginPage.php               # Holds the code that displays the user with a success message.
  
logs/
  login.txt                   # Holds the logs of people who logs into tho program.

startingPages/                # Directory that holds the pages that come after logging in.
  firstPage.html              # Holds the code for the first page after logging in.
  firstchecklistREAL.html     # Contains the checklist in the beginning to make sure user did everything before continuing.
  firstchecklistTEST.html     # Contains the checklist in the beginning to make sure user did everything before continuing.

README.md         # Contains information about installation and files.
```

## File and Program Descriptions

### User Interface Files
There are 10 HTML files that contain the CSS / HTML code to design the UI:
```
choose-emergency.html       # Holds the code for the user to choose an emergency for the alert.
choose-location.html        # Holds the code for the user to choose a location for the alert.
choose-medium.html          # Holds the code for the user to choose a medium / media for the alert.  

checklist.html              # Holds the code for the user to choose from an array of options in a checklist.
confirmation.html           # Holds the code for the user to confirm their selections.
fconfirmation.html          # Holds the code for the user to confirm again about their selections.
success.html                # Holds the code that displays the user with a success message.
 
firstPage.html              # Holds the code for the first page after logging in.
firstchecklistREAL.html     # Contains the checklist in the beginning to make sure user did everything before continuing.
firstchecklistTEST.html     # Contains the checklist in the beginning to make sure user did everything before continuing.
```

### Functionality and Log Files

There are three php files and a txt file that help simulate what the real program will do.
```
send.php                    # Holds the code that sends out the alert via text message and email.
login.php                   # Holds the code writes to the login.txt file who logged into the program / system.
login.txt                   # Holds the logs of people who logs into tho program.
```

The send.php file contains the code that sends out an alert via a text message and via email using the mail function in PHP.
You can modify it's contents to choose which person's phone number and email you would like to send it to.

```
<?php
  // To: "+x(xxx)xxx-xxxx@carrier-name
  $to = "8087229842@tmomail.net";
  
  // From: "email@server.com
  $from = "saehyunsong123@gmail.com";
  
  // Your subject headline
  $subject = "Test Message";
  
  // The content of the message you would like to send
  $message = "Test text message!\n";
  
  // These headers required so that email doesn't get sent to spam folder
  $headers = "From: $from\r\n";
  $headers .= "Reply-To: $from\r\n";
  $headers .= "Return-Path: $from\r\n";
  $headers .= "CC: \r\n";
  $headers .= "BCC: \r\n";
  
  // Check if mail has been sent or failed
  if (mail($to, $subject, $message, $headers)) {
    echo "The text has been sent!";
  } else {
    echo "The text has failed!";
  }
  
  // Who you would like to send the email to.. Format is just reuglar email.
  $to = "saehyuns@hawaii.edu";
  
  // The contents of your message
  $message = "Test email message!\n";
  
  // Error Checking
  if (mail($to, $subject, $message, $headers)) {   
    // After sending, go to successfully sent page..
    header('Location: ../confirmationPages/success.html');
  } else {
    echo "The email has failed!";
  }

?>
```

The file login.php contains the code that write to the login.txt file of whoever logged into the system.
It takes down the person's username, password, and the date / time they logged in.

```
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
```

The file login.txt contains the information about the person's username, password, and the date/time they accessed / logged into the system or program. An example of what is inside login.txt:
```
Username: Yujin
Password: Kim
Date logged in: 04/16/2018
Time logged in: 22:17:42
----------------------------------------------
Username: a
Password: s
Date logged in: 04/16/2018
Time logged in: 23:25:11
----------------------------------------------
```
