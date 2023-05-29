<?php session_start(); ?>
<html>
  <head>
  <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/adm.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/admin_home.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <style>
      @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");
      </style>
  </head>
  <body>
    <!-- <div class="container" > -->
    <?php
        if (!isset($_SESSION['logedin'])) {
            header("Location: ../index.php");
            die();
        }   
    ?>
    <!-- <div class="row"> -->
    <?php 
        include '../Admin_Components/side_nav.php';
    ?>
    <div class="cotainer-fluid bg-light h-100 bg-gradient">
        <?php 
            if(isset($_GET['page'])){
              if($_GET['page'] == "dept"){
                $js = "department.js";
                include '../Admin_Components/departments.php';
              }else if($_GET['page'] == "staff"){
                $js = "staff.js";
                include '../Admin_Components/staff.php';
              }else if($_GET['page'] == "stud"){
                $js = "student.js";
                include '../Admin_Components/student.php';
              }else if($_GET['page'] == "abt"){
                $js = "abt.js";
                include '../Admin_Components/about.php';
              }else if($_GET['page'] == "cont"){
                $js = "cont.js";
                include '../Admin_Components/contact.php';
              }else{
                $js = "department.js";
                include '../Admin_Components/home.php';
              }
            }else{
              // include '../adm.php';
              include '../Admin_Components/home.php';
            }
        ?>
    <!-- </div> -->
    <script src="../Javascript/<?php echo $js; ?>"></script>
  </body>
</html>