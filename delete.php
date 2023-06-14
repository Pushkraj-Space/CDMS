<?php 
    session_start();
    require('./proj_init.php');
    $link = connect();
    include './_variables.php';
    if($page == "dept"){
        $d_name = $_REQUEST['id'];
        $adm = $_SESSION['userName'];
        $sql = "DELETE FROM departments WHERE `dept_admin` = '$adm' and dept_name = '$d_name'";
        $res = mysqli_query($link,$sql);
        $sql = "DELETE FROM staff WHERE `admin` = '$adm' and Department = '$d_name'";
        $res = mysqli_query($link,$sql);
        $sql = "DELETE FROM student WHERE `admin` = '$adm' and Department = '$d_name'";
        $res = mysqli_query($link,$sql);
    }else if($page == "staff"){
        $adm = $_SESSION['userName'];
        $sql = "DELETE FROM staff WHERE `admin` = '$adm' and `Department`= '$deptName' and `userName`='$userName'";
        $res = mysqli_query($link,$sql);
        if($isHod == 'Yes'){
            $sql = "UPDATE departments SET `dept_hod` = 'No HOD mentioned' WHERE `dept_admin` = '$adm' and `dept_name` = '$deptName'";
            $res = mysqli_query($link,$sql);
        }
    }else if($page== "stud"){
        $adm = $_SESSION['userName'];
        $sql = "DELETE FROM student WHERE `admin` = '$adm' and `Department`= '$deptName' and `userName`='$userName'";
        mysqli_query($link,$sql);
    }else if($page == "area"){
        $sql = "delete from area where `User Id` = '$id' and State = '$state' and City = '$city' and Area = '$area'";
        $res = mysqli_query($link,$sql);
        echo "Done";
    }
?>