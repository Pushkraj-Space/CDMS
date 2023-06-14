<?php 

include '../_variables.php';
// if (isset($_GET['type'])) {
if ($act_type == 'register') {
    ?>
<div class="container">
    <?php include '../nav_bar.php'; ?>
  <form action="../save_server.php" method="POST" id="studReg">
  <legend>Register as Student</legend>
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
    <label for="cname">Passing Year</label> 
    <input  class="form-control form-control-sm" type="number" id="cname" name="cname" value="<?php echo $cname; ?>" required> 
    
    <label for="branch">Branch Name</label> 
    <input class="form-control form-control-sm" type="text" id="branch" name="branch" value="<?php echo $branch; ?>" required> 

    <label for="address">Your Address</label> 
    <input class="form-control form-control-sm" type="text" id="address" name="address" value="<?php echo $address; ?>" required> 

    <label for="MobileNo">Mobile No</label> 
    <input class="form-control form-control-sm" type="text" id="MobileNo" name="MobileNo" value="<?php echo $MobileNo; ?>" required>  

    <div> Gender : <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value = "male" id="g_male" <?php if ($gender == "male") echo "checked " ?>required>
            <label class="form-check-label" for="g_male">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="female" id="g_female" <?php if ($gender == "female") echo "checked " ?> required> <br>
            <label class="form-check-label" for="g_female">Female</label>
        </div>
    </div>

    <label for="dob">Date of Birth</label>
    <input class="form-control form-control-sm" type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>

    <label for="userName">User Name</label>
    <input class="form-control form-control-sm" type="text" id="userName" name="userName" value="" required>
    <?php 
    if (isset($_GET['log'])) {
        if ($_GET['log'] == "404") {
            echo "<span style='color:red;'> Username already exits try any other name </span><br>";
        }
    }
    ?>
    <label for="setPass">Set Password</label>
    <input class="form-control form-control-sm" type="password" id="setPass" name="setPass" value="" required><br>

    <div class="d-grid gap-2 col-6 mx-auto">
        <input  class="btn btn-outline-primary" type="submit" value="Register">
        <a class="btn btn-outline-secondary" role="button" href='./Register.php?user=Faculty'>Register as Faculty </a>
    </div>
    <label for="">Already have account?</label>
    <a href='./Login.php?user=Stud'>Login</a>
    <input type="hidden" name="page" value="studReg">
  </form>
</div>
<?php 
} else if ($act_type == "login") { ?>

<div class="container">
<?php include '../nav_bar.php'; ?>
    <!-- <h2>Login as Student</h2> -->
    <form action="../save_server.php" method="POST" id="studLog">
    <legend>Login as Student</legend>
        <label for="userName">User Name</label>
        <input class="form-control form-control-sm" type="text" id="userName" name="userName" value="" required>

        <label for="setPass">Password</label>
        <input class="form-control form-control-sm" type="password" id="setPass" name="setPass" value="" required>
        <br>
        <div class="d-flex justify-content-around">
            <input class="col-md-5 btn btn-outline-primary" type="submit" value="Login">
            <a class="col-md-5 btn btn-outline-secondary" role="button" href='./Login.php?user=Faculty'>Login as Faculty</a>
        </div>
        <?php 
        if (isset($_GET['log'])) {
            if ($_GET['log'] == "404") {
                echo "<span style='color:red;'> User Name and Password do not Match </span><br>";
            }
        }
        ?>
        <!-- <label for="">Do not have account?</label>
        <a href='./Register.php'>Register</a><br> -->
        

        <!-- Hiiden Elements -->
        <?php 
        // if (isset($_GET['log']))
        ?>
        <input type="hidden" name="page" value="studLog">
    </form>
</div>

<?php 
}
// } ?>