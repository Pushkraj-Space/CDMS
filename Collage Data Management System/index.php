<?php
session_start();
require('proj_init.php');
$link = connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./CSS/footer.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./CSS/index.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
</head>
<body>
    <div class="container">
    <?php
    $page = "index";
    include 'nav_bar.php';
    include 'redirect.php';
    if (isset($_SESSION['logedin'])) {
        if ($_SESSION['user'] == "Student") {
            $url = "components/Stud_Home.php";
            redir($url);
        } else if ($_SESSION['user'] == "Faculty") {
            $url = "components/Admin_Home.php";
            redir($url);
        }
    }
    ?>
    <!-- <div class="container"> --><br>
        <h1 class=" d-flex justify-content-center"> Collage Data Management System </h1><br>
        <div class="d-flex justify-content-around">
        <input class="col-md-5 btn btn-outline-primary" onClick="parent.location='./components/Login.php'" type="button" value="Log In">
        <input class="col-md-5 btn btn-outline-primary" onClick="parent.location='./components/Register.php'" type="button" value="Register">
        </div>
    <!-- </div> -->
    <?php
    // include 'footer.php';
    ?>
</div>
</body>
</html>