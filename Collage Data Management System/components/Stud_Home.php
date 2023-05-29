<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/Stud_Home.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
</head>
<body>
<?php
if (!isset($_SESSION['logedin'])) {
    header("Location: ../index.php");
    die();
}
?>
    <!-- <h1>Welcome <?php echo $_SESSION['userName']; ?></h1> -->
    <!-- <a href="../Logout.php">Logout</a> -->
    <!-- <input onClick="parent.location='../Logout.php'" type="button" value="Logout" class="btn btn-info"> -->
    <!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
            <h3><?php echo $_SESSION['userName']; ?></h3>
            <input onClick="parent.location='../Logout.php'" type="button" value="Logout" class="btn btn-info btn-sm btn-block">
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student PRN:</strong><i>Not Avilable</i></p>
            <p class="mb-0"><strong class="pr-1">College:</strong><?php echo $_SESSION['cname']; ?></p>
            <p class="mb-0"><strong class="pr-1">Branch:</strong><?php echo $_SESSION['branch']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Full Name</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['fname'] . " " . $_SESSION['mname'] . " " . $_SESSION['lname']; ?></td>
              </tr>
              <tr>
                <th width="30%">Mobile No</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['MobileNo']; ?></td>
              </tr>
              <tr>
                <th width="30%">D.O.B</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['dob']; ?></td>
              </tr>
              <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['gender']; ?></td>
              </tr>
              <tr>
                <th width="30%">Address</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['address']; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>