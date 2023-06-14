<?php 
session_start();
include '_variables.php';
require('proj_init.php');
$link = connect();


if($page == "updDept"){
  $adm = $_SESSION["userName"];
  // echo $deptName . ' ' . $adm . ' ' . $deptHod;
  $sql = "SELECT * FROM staff WHERE `Department` = '$deptName' and `admin`='$adm' and `Role` = 'Teacher' and `userName` = '$deptHod' ";
  $res = mysqli_query($link, $sql);
  if ($res->num_rows == 0) {
      echo "<form id='myForm' action='./components/Admin_Home.php?page=dept&act=edi&log=401' method='post'>";
      foreach ($_POST as $a => $b)
          echo "<input type='hidden' name='$a' value='$b'>";
      echo "</form>";
      echo "<script>document.getElementById('myForm').submit();</script>";
  }else{
    $sql = "UPDATE `departments` SET `dept_hod` = '$deptHod' WHERE `dept_admin` = '$userName' and `dept_id` = '$deptId';";
    mysqli_query($link,$sql); 
    $sql = "UPDATE staff SET `isHod` = 'Yes' WHERE `Department` = '$deptName' and `admin`='$adm' and `Role` = 'Teacher' and `userName` = '$deptHod'";
    mysqli_query($link,$sql);
    $sql = "UPDATE staff SET `isHod` = 'No' WHERE `Department` = '$deptName' and `admin`='$adm' and `Role` = 'Teacher' and `userName` != '$deptHod'";
    mysqli_query($link,$sql);
    header("Location: ./components/Admin_Home.php?page=dept");
    die();
  }
}else if($page == "updStaff"){
  $sql = "SELECT dept_name FROM departments WHERE `dept_admin`='$userName_adm' and `dept_name` = '$deptName'";
  $res = mysqli_query($link, $sql);
  if ($res->num_rows == 0) {
    echo "<form id='myForm' action='./components/Admin_Home.php?page=staff&act=edi&log=401' method='post'>";
    foreach ($_POST as $a => $b)
      echo "<input type='hidden' name='$a' value='$b'>";
    echo "</form>";
    echo "<script>document.getElementById('myForm').submit();</script>";
  }else{
    $sql = "UPDATE `staff` SET `First Name`='$fname',`Middle Name`='$mname',`Last Name`='$lname',`Department`='$deptName',`Role`='$role',`Gender`='$gender',`Salary`='$sal',`Joining Date`='$joinDate',`DOB`='$dob',`Contact`='$MobileNo' WHERE `userName` = '$userName' and `Department` = '$deptName' and `admin` = '$userName_adm'";
    mysqli_query($link, $sql);
    header("Location: ./components/Admin_Home.php?page=staff");
    die();
  }
}else if($page == "updStud"){
  $sql = "SELECT dept_name FROM departments WHERE `dept_admin`='$userName_adm' and `dept_name` = '$deptName'";
  $res = mysqli_query($link, $sql);
  if ($res->num_rows == 0) {
    echo "<form id='myForm' action='./components/Admin_Home.php?page=stud&act=edi&log=401' method='post'>";
    foreach ($_POST as $a => $b)
      echo "<input type='hidden' name='$a' value='$b'>";
    echo "</form>";
    echo "<script>document.getElementById('myForm').submit();</script>";
  }else{
    $sql = "UPDATE `student` SET `First Name`='$fname',`Middle Name`='$mname',`Last Name`='$lname',`Department`='$deptName',`Gender`='$gender',`Joining Date`='$joinDate',`DOB`='$dob',`Contact`='$MobileNo',`Address` = '$address' WHERE `userName` = '$userName' and `Department` = '$deptName' and `admin` = '$userName_adm'";
    mysqli_query($link, $sql);
    header("Location: ./components/Admin_Home.php?page=stud");
    die();
  }
}
?>