<?php
// Database connection parameters
function connect($setup = false)
{
    $host = "localhost";
    // $username = "id20589358_admin08";
    $username = "root";
    // $password = "sViiO~x[m?qb5!m1";
    $password = "";

    $conn = mysqli_connect($host, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // $db_name = "id20589358_student_management_system";
    $db_name = "student_management_system";
    $result = mysqli_query($conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db_name'");
    if (mysqli_num_rows($result) > 0) {
        $link = mysqli_connect($host, $username, $password, $db_name);
    } else {
        $sql = "CREATE DATABASE $db_name";
        mysqli_query($conn, $sql);
        $link = mysqli_connect($host, $username, $password, $db_name);
        $sql = "CREATE TABLE `faculty` ( `userName` varchar(30) NOT NULL, `First Name` varchar(30) NOT NULL, `Middle Name` varchar(30) NOT NULL, `Last Name` varchar(30) NOT NULL, `College Name` varchar(100) NOT NULL, `Address` text NOT NULL, `Mobile No` varchar(20) NOT NULL, `DOB` date NOT NULL, `Gender` varchar(20) NOT NULL, `Passkey` varchar(20) NOT NULL, `Role` varchar(20) NOT NULL, PRIMARY KEY (`userName`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        mysqli_query($link, $sql);
        $sql = "CREATE TABLE `departments` ( `dept_admin` varchar(50) NOT NULL, `dept_id` int(11) NOT NULL, `dept_name` varchar(50) NOT NULL, `dept_hod` varchar(50) DEFAULT NULL, KEY `dept_admin` (`dept_admin`), CONSTRAINT departments_ibfk_1 FOREIGN KEY (`dept_admin`) REFERENCES `faculty` (`userName`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        mysqli_query($link, $sql);
        $sql = "CREATE TABLE `staff` ( 
            `userName` varchar(30) NOT NULL, 
            `First Name` varchar(30) NOT NULL, 
            `Middle Name` varchar(30) NOT NULL, 
            `Last Name` varchar(30) NOT NULL, 
            `Department` varchar(30) NOT NULL, 
            `Role` varchar(30) NOT NULL, 
            `Gender` varchar(30) NOT NULL, 
            `Salary` varchar(30) NOT NULL, 
            `Joining Date` date NOT NULL, 
            `DOB` date NOT NULL, 
            `Contact` varchar(30) NOT NULL, 
            `Passkey` varchar(30) NOT NULL, 
            `admin` varchar(30) NOT NULL, 
            `isHod` varchar(10) NOT NULL 
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
          ";
        mysqli_query($link, $sql);
        $sql = "CREATE TABLE `student` ( 
            `userName` varchar(30) NOT NULL, 
            `First Name` varchar(30) NOT NULL, 
            `Middle Name` varchar(30) NOT NULL, 
            `Last Name` varchar(30) NOT NULL, 
            `Department` varchar(30) NOT NULL, 
            `Joining Date` date NOT NULL, 
            `DOB` date NOT NULL, 
            `Contact` varchar(30) NOT NULL, 
            `Gender` varchar(30) NOT NULL, 
            `Address` varchar(50) NOT NULL, 
            `Passkey` varchar(30) NOT NULL, 
            `admin` varchar(30) NOT NULL 
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
          ";
        mysqli_query($link, $sql);

    }
    return $link;
}
?>
