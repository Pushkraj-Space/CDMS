
<div class="cotainer-fluid bg-light h-100 bg-gradient">
<div class="card shadow-sm bg-light " style="padding:10px; height:100% ;">

  <div class="container">
    <form action="../update_data.php" method="POST" id="facultyLog">
    <legend>Update Faculty Member</legend>
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
      <input class="form-control form-control-sm" list="dept_list" id="deptName" name="deptName" value="<?php echo $deptName; ?>" required>
      <datalist id="dept_list">
      <?php 
            require('../proj_init.php');
            $link = connect();
            $adm = $_SESSION["userName"];
            $sql = "SELECT dept_name FROM departments WHERE `dept_admin`='$adm'";
            $res = $link->query($sql);
            while ($row = $res->fetch_assoc()){ 
        ?>
          <option><?php echo $row['dept_name'];?> </option>
        <?php } ?>
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
      <label for="role">Role</label>
      <select id="role" name="role" class="form-control form-control-sm">
        <option>Teacher</option>
        <option>Clerk</option>
        <option>Worker</option>
        <option>Other</option>
      </select>
      
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
    <label for="sal">Salary </label> 
        <input class="form-control form-control-sm" type="number" id="sal" name="sal" value="<?php echo $sal; ?>" required> 
</div>
<div class="col-md-4">
    <label for="joinDate">Joining Date </label> 
        <input class="form-control form-control-sm" type="date" id="joinDate" name="joinDate" value="<?php echo $joinDate; ?>" required> 
</div>
<div class="col-md-4">
    <label for="dob">DOB </label> 
        <input class="form-control form-control-sm" type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required> 
</div>
</div>
<label for="MobileNo">Contact </label> 
        <input class="form-control form-control-sm" type="number" id="MobileNo" name="MobileNo" value="<?php echo $MobileNo; ?>" required> 
<!-- <label for="userName">User Name </label> 
<input class="form-control form-control-sm" type="text" id="userName" name="userName" value="<?php echo $userName; ?>" required>  -->

<!-- <label for="passkey">Password </label> 
<input class="form-control form-control-sm" type="password" id="passkey" name="passkey" value="<?php echo ""; ?>" required>  -->
<br>
<input class="btn btn-outline-primary col-12 mx-auto" type="submit" value="Update"><br><br>     
        
        <a href="../components/Admin_Home.php?page=staff" role="button" type="button" class="btn btn-outline-warning col-12 mx-auto">Cancel</a>
        <input type="hidden" name="page" value="updStaff">
        <input type="hidden" name="userName" value="<?php echo $userName; ?>">
        <input type="hidden" name="userName_adm" value="<?php echo $_SESSION['userName'];?>">
    </form>
</div>

      </div>
</div>