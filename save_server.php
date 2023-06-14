<?php 
require('proj_init.php');
$link = connect();
include '_variables.php';
if ($page == "studLog") {
    $sql = "select userName from student where userName = '$userName' and Passkey = '$setPass'";
    $res = mysqli_query($link, $sql);
    if ($res->num_rows == 1) {
        session_start();
        // include './session_vars.php';

        $sql = "select * from student where userName = '$userName'";
        $res = mysqli_query($link, $sql);
        $r = mysqli_fetch_array($res);
        $i = 0;
        while ($i < (sizeof($r) / 2)) {
            $_SESSION[$names[$i]] = $r[$i];
            $i++;
        }
        $_SESSION['logedin'] = true;
        $_SESSION['user'] = "Student";
        header("Location: ./components/Stud_Home.php");
        die();
    } else {
        header("Location: ./components/Login.php?user=Stud&log=404");
        die();
    }
} else if ($page == "facultyLog") {
    $sql = "select userName from faculty where userName = '$userName' and Passkey = '$setPass'";
    $res = mysqli_query($link, $sql);
    if ($res->num_rows == 1) {
        session_start();
        $_SESSION['logedin'] = true;
        $_SESSION['user'] = "Faculty";
        $_SESSION['stud_cnt'] = "NO_Data";
        $_SESSION['staff_cnt'] = "NO_Data";
        $_SESSION['dept_cnt'] = "NO_Data";
        $sql = "select * from faculty where userName = '$userName'";
        $res = mysqli_query($link, $sql);
        $r = mysqli_fetch_array($res);
        $i = 0;
        while ($i < (sizeof($r) / 2)) {
            $_SESSION[$admNames[$i]] = $r[$i];
            $i++;
        }
        header("Location: ./components/Admin_Home.php");
        die();
    } else {
        header("Location: ./components/Login.php?user=Faculty&log=404");
        die();
    }
} else if ($page == "studReg") {
    // echo $userName . " " . $userName_adm . " "
    $sql = "SELECT userName FROM `student` WHERE `userName` = '$userName' and `admin` = '$userName_adm' and `Department` = '$deptName'";
    $res = mysqli_query($link, $sql);
    $sql2 =  "SELECT dept_name FROM departments WHERE `dept_admin`='$userName_adm' and `dept_name` = '$deptName'";
    $res2 = mysqli_query($link, $sql2);
    if ($res->num_rows == 1) {
        // echo 404;
        echo "<form id='myForm' action='./components/Admin_Home.php?page=stud&act=add&log=404' method='post'>";
        foreach ($_POST as $a => $b)
            echo "<input type='hidden' name='$a' value='$b'>";
        echo "</form>";
        echo "<script>document.getElementById('myForm').submit();</script>";
    } else if($res2->num_rows == 0) {
        // echo 401;
        echo "<form id='myForm' action='./components/Admin_Home.php?page=stud&act=add&log=401' method='post'>";
            foreach ($_POST as $a => $b)
        echo "<input type='hidden' name='$a' value='$b'>";
        echo "</form>";
        echo "<script>document.getElementById('myForm').submit();</script>";
    }else {
        // echo 200;
        $sql = "INSERT INTO `student` VALUES ('$userName','$fname','$mname','$lname','$deptName','$joinDate','$dob','$MobileNo','$gender','$address','$passkey','$userName_adm')";
        $res = mysqli_query($link, $sql);
        header("Location: ./components/Admin_Home.php?page=stud");
        die();
    }
} else if ($page == "facultyReg") {
    $sql = "select userName from faculty where userName = '$userName'";
    $res = mysqli_query($link, $sql);
    if ($res->num_rows == 1) {
        echo "<form id='myForm' action='./components/Register.php?user=Faculty&log=404' method='post'>";
        foreach ($_POST as $a => $b)
            echo "<input type='hidden' name='$a' value='$b'>";
        echo "</form>";
        echo "<script>document.getElementById('myForm').submit();</script>";
    } else {
        $sql = "INSERT INTO `faculty` VALUES ('$userName','$fname','$mname','$lname','$cname','$address','$MobileNo','$dob','$gender','$setPass','admin')";
        $res = mysqli_query($link, $sql);
        header("Location: ./components/Login.php?user=Faculty");
        die();
    }
} else if($page == "deptReg"){
    $sql = "select dept_admin from departments where dept_id = '$deptId' and `dept_admin` = '$userName'";
    $res = mysqli_query($link, $sql);
    $sql2 = "select `dept_admin` from departments where `dept_name` = '$deptName' and `dept_admin` = '$userName' ";
    $res2 = mysqli_query($link, $sql2);
    if ($res2->num_rows == 1) {
        echo "<form id='myForm' action='./components/Admin_Home.php?page=dept&act=add&log=402' method='post'>";
        foreach ($_POST as $a => $b)
            echo "<input type='hidden' name='$a' value='$b'>";
        echo "</form>";
        echo "<script>document.getElementById('myForm').submit();</script>";
    }else if($res->num_rows == 1){
        echo "<form id='myForm' action='./components/Admin_Home.php?page=dept&act=add&log=401' method='post'>";
        foreach ($_POST as $a => $b)
            echo "<input type='hidden' name='$a' value='$b'>";
        echo "</form>";
        echo "<script>document.getElementById('myForm').submit();</script>";
    }else{
        $sql = "INSERT INTO `departments` VALUES ('$userName','$deptId','$deptName','No HOD mentioned')";
        mysqli_query($link, $sql);
        header("Location: ./components/Admin_Home.php?page=dept");
        die();
    }
}else if($page == "stfReg"){
    $sql = "SELECT dept_name FROM departments WHERE `dept_admin`='$userName_adm' and `dept_name` = '$deptName'";
    $res = mysqli_query($link, $sql);
    $sql2 = "SELECT userName FROM staff WHERE `admin`='$userName_adm' and `Department` = '$deptName' and `userName` = '$userName'";
    $res2 = mysqli_query($link, $sql2);
    if ($res->num_rows == 0) {
        echo "<form id='myForm' action='./components/Admin_Home.php?page=staff&act=add&log=401' method='post'>";
        foreach ($_POST as $a => $b)
            echo "<input type='hidden' name='$a' value='$b'>";
        echo "</form>";
        echo "<script>document.getElementById('myForm').submit();</script>";
    }else if($res2->num_rows == 1){
        echo "<form id='myForm' action='./components/Admin_Home.php?page=staff&act=add&log=402' method='post'>";
        foreach ($_POST as $a => $b)
            echo "<input type='hidden' name='$a' value='$b'>";
        echo "</form>";
        echo "<script>document.getElementById('myForm').submit();</script>";
    }else{
        $sql = "INSERT INTO `staff` VALUES ('$userName','$fname','$mname','$lname','$deptName','$role','$gender','$sal','$joinDate','$dob','$MobileNo','$passkey','$userName_adm','No')";
        mysqli_query($link, $sql);
        header("Location: ./components/Admin_Home.php?page=staff");
        die();
    }
}else{
    header("Location: ./index.php");
    die();
}
?>