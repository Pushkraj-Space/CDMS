<?php
$fname = (isset($_REQUEST["fname"])) ? $_REQUEST["fname"] : "";
$mname = (isset($_REQUEST["mname"])) ? $_REQUEST["mname"] : "";
$lname = (isset($_REQUEST["lname"])) ? $_REQUEST["lname"] : "";
$cname = (isset($_REQUEST["cname"])) ? $_REQUEST["cname"] : "";
$branch = (isset($_REQUEST["branch"])) ? $_REQUEST["branch"] : "";
$gender = (isset($_REQUEST["gender"])) ? $_REQUEST["gender"] : "";
$MobileNo = (isset($_REQUEST["MobileNo"])) ? $_REQUEST["MobileNo"] : "";
$address = (isset($_REQUEST["address"])) ? $_REQUEST["address"] : "";
$userName = (isset($_REQUEST["userName"])) ? $_REQUEST["userName"] : "";
$setPass = (isset($_REQUEST["setPass"])) ? $_REQUEST["setPass"] : "";
$page = (isset($_REQUEST["page"])) ? $_REQUEST["page"] : "";
$dob = (isset($_REQUEST["dob"])) ? $_REQUEST["dob"] : "";
$deptId = (isset($_REQUEST["deptId"])) ? $_REQUEST["deptId"] : "";
$deptName = (isset($_REQUEST["deptName"])) ? $_REQUEST["deptName"] : "";
$deptHod = (isset($_REQUEST["deptHod"])) ? $_REQUEST["deptHod"] : "";
$role = (isset($_REQUEST["role"])) ? $_REQUEST["role"] : "";
$sal = (isset($_REQUEST["sal"])) ? $_REQUEST["sal"] : "";
$joinDate = (isset($_REQUEST["joinDate"])) ? $_REQUEST["joinDate"] : "";
$passkey = (isset($_REQUEST["passkey"])) ? $_REQUEST["passkey"] : "";
$isHod = (isset($_REQUEST["isHod"])) ? $_REQUEST["isHod"] : "";
$userName_adm = (isset($_REQUEST["userName_adm"])) ? $_REQUEST["userName_adm"] : "";


$data = array(
    'fname' => $fname,
    'mname' => $mname,
    'lname' => $lname,
    'cname' => $cname,
    'branch' => $branch,
    'gender' => $gender,
    'MobileNo' => $MobileNo,
    'address' => $address,
    'userName' => $userName,
    'setPass' => $setPass,
    'page' => $page,
    'dob' => $dob,
);

$names = array('userName', 'fname', 'mname', 'lname', 'cname', 'branch', 'address', 'MobileNo', 'dob', 'gender', 'setPass', 'page');
$admNames = array('userName', 'fname', 'mname', 'lname', 'cname','address', 'MobileNo', 'dob','gender', 'setPass', 'role')
// print_r($data);
?>
