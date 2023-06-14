<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="../CSS/LoReg.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/index.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
</head>
<body>
    <?php
    include '../redirect.php';
    if (isset($_SESSION['logedin'])) {

        if ($_SESSION['user'] == "Student") {
            $url = "Stud_Home.php";
            redir($url);
        } else if ($_SESSION['user'] == "Faculty") {
            $url = "Admin_Home.php";
            redir($url);
        }
    }
    ?>
    
    <?php 
    $act_type = "register";
    if (!isset($_GET['user'])) {
        include 'Faculty.php';
    } else if ($_GET['user'] == "Stud") {
        include 'Student.php';
    } else {
        include 'Faculty.php';
    }
    ?>
    
</body>
</html>