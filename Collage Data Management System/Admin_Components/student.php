<?php include '../_variables.php'; ?>
<?php if (isset($_GET['act']) && $_GET['act'] == "edi") {
  include 'update_stud.php';
} else if (isset($_GET['act']) && $_GET['act'] == "add") {
  ?>
<div class="cotainer-fluid bg-light h-100 bg-gradient">
<div class="card shadow-sm bg-light " style="padding:10px; height:100% ;">

  <div class="container">
    <form action="../save_server.php" method="POST" id="facultyLog">
    <legend>Register New Student</legend>
    <div class="form-row">
    <div class="col-md-4" >
        <label for="fname">First Name</label> 
        <input class="form-control form-control-sm" type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required> 
    </div>
    <div class="col-md-4" >
        <label for="mname">Middle Name</label> 
        <input class="form-control form-control-sm" type="text" id="mname" name="mname" value="<?php echo $mname; ?>" required> 
    </div>
    <div class="col-md-4" >
        <label for="lname">Last Name</label> 
        <input class="form-control form-control-sm" type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required> 
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4">
      <label for="deptName">Department</label>
      <input class="form-control form-control-sm" list="dept_list" id="deptName" name="deptName" value="" required>
      <datalist id="dept_list">
      <?php 
      require('../proj_init.php');
      $link = connect();
      $adm = $_SESSION["userName"];
      $sql = "SELECT dept_name FROM departments WHERE `dept_admin`='$adm'";
      $res = $link->query($sql);
      while ($row = $res->fetch_assoc()) {
        ?>
          <option><?php echo $row['dept_name']; ?> </option>
        <?php 
      } ?>
      </datalist>
      <?php 
      if (isset($_GET['log'])) {
        if ($_GET['log'] == "401") {
          echo "<span style='color:red;'> Department name not exists </span><br>";
        }
      }
      ?>
    </div>
    <div class="col-md-4">
<label for="MobileNo">Contact </label> 
        <input class="form-control form-control-sm" type="number" id="MobileNo" name="MobileNo" value="<?php echo $MobileNo; ?>" required> 
</div>
    <div class="col-md-4">
    <label for="gender" >Gender :</label>
      <select id="gender" name="gender" class="form-control form-control-sm">
        <option>Male</option>
        <option>Female</option>
      </select>
</div>

  </div>
  <div class="form-row">
    
<div class="col-md-4">
    <label for="joinDate">Joining Date </label> 
        <input class="form-control form-control-sm" type="date" id="joinDate" name="joinDate" value="<?php echo $joinDate; ?>" required> 
</div>
<div class="col-md-4">
    <label for="dob">DOB </label> 
        <input class="form-control form-control-sm" type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required> 
</div>
</div>
<label for="address">Address </label> 
        <input class="form-control form-control-sm" type="text" id="address" name="address" value="<?php echo $address; ?>" required> 
<label for="userName">User Name </label> 
<input class="form-control form-control-sm" type="text" id="userName" name="userName" value="<?php echo $userName; ?>" required> 
<?php 
if (isset($_GET['log'])) {
  if ($_GET['log'] == "404") {
    echo "<span style='color:red;'> User Name already Exists </span><br>";
  }
}
?>
<label for="passkey">Password </label> 
<input class="form-control form-control-sm" type="password" id="passkey" name="passkey" value="<?php echo ""; ?>" required> 
<br>
<input class="btn btn-outline-primary col-12 mx-auto" type="submit" value="Register"><br><br>
      
        
        <a href="../components/Admin_Home.php?page=stud" role="button" type="button" class="btn btn-outline-warning col-12 mx-auto">Cancel</a>
        <input type="hidden" name="page" value="studReg">
        <input type="hidden" name="userName_adm" value="<?php echo $_SESSION['userName']; ?>">
    </form>
</div>

      </div>
</div>

<?php 
} else { ?>


<div class="cotainer-fluid bg-light h-100 bg-gradient">
<div class="card shadow-sm bg-light " style="padding:10px; height:100% ;">
<a style="margin: 7px 0px;" href="../components/Admin_Home.php?page=stud&act=add" role="button" type="button" class="btn btn-info btn-lg btn-block">Register New Student</a>
<br>
<table class="table table-active table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">@</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Department</th>
      <th scope="col">Joining Date</th>
      <th scope="col">DOB</th>
      <th scope="col">Contact</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  </tbody>
  <tbody>
      <?php
      require('../proj_init.php');
      $link = connect();
      $adm = $_SESSION['userName'];
      $items_per_page = 7;
      $current_page = isset($_GET['pg']) ? (int)$_GET['pg'] : 1;
      $offset = ($current_page - 1) * $items_per_page;
      $i = ($current_page * $items_per_page) + 1 - $items_per_page;
      $query = "SELECT * FROM student WHERE `admin` = '$adm' LIMIT $items_per_page OFFSET $offset";
      $result = $link->query($query);
      $flag = 1;
      while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td scope="row"><?php echo $i; ?></td>
          <td><?php echo $row['First Name'] ?></td>
          <td><?php echo $row['Last Name'] ?> </td>
          <td><?php echo $row['Department'] ?> </td>
          <td><?php echo $row['Joining Date'] ?> </td>
          <td><?php echo $row['DOB'] ?> </td>
          <td><?php echo $row['Contact'] ?> </td>
          <td><?php echo $row['Gender'] ?> </td>
          <td><?php echo $row['Address'] ?> </td>
          <td>
          <div class="d-flex flex-row justify-content-around">
            <a id="<?php echo $row['userName'] . ' ' . $row['Department']; ?>" value="<?php echo ""; ?>" name = "del_btn" class="btn btn-outline-danger btn-sm test" >REMOVE</a>
            <a href="./Admin_Home.php?page=stud&act=edi& " name = "del_btn" class="btn btn-outline-info btn-sm" >EDIT</a>
        </div>
          </td>
        </tr>
        <?php $i++;
      } ?>
  </tbody>
</table>

<!-- table end here -->

<!-- pagination starts here -->
<?php 
$total_items = $link->query('SELECT COUNT(*) FROM student')->fetch_row()[0];
$total_pages = ceil($total_items / $items_per_page);
$next = $current_page;
if ($total_pages > $current_page) {
  $next = $current_page + 1;
}
$prev = $current_page;
if ($current_page > 1) {
  $prev = $current_page - 1;
}
?>
<div class="d-flex flex-row justify-content-between">
<a style="float:left" class="btn btn-link " href="?page=stud&pg=<?php echo $prev; ?>" role="button">Previous</a>
<a style="float:left" class="btn btn-link " href="?page=stud&pg=<?php echo $next; ?>" role="button">Next</a>
</div>
</div>
</div>

<?php 
} ?>
