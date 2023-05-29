<?php include '../_variables.php'; ?>
<?php if(isset($_GET['act']) && $_GET['act'] == "add") { ?>
<div class="cotainer-fluid bg-light h-100 bg-gradient">
<div class="card shadow-sm bg-light " style="padding:10px; height:100% ;">

  <div class="container">
    <form action="../save_server.php" method="POST" id="facultyLog">
    <legend>Register New Department</legend>
        <label for="deptName">Department Name</label>
        <input class="form-control form-control-sm" type="text" id="deptName" name="deptName" value="<?php echo $deptName; ?>" required>
        <?php 
        if (isset($_GET['log'])) {
            if ($_GET['log'] == "402") {
                echo "<span style='color:red;'> Department Name Already Exists</span><br>";
            }
        }
        ?>
        <label for="deptId">Department ID</label>
        <input class="form-control form-control-sm" type="number" id="deptId" name="deptId" value="<?php echo $deptId; ?>" required>
        <?php 
        if (isset($_GET['log'])) {
            if ($_GET['log'] == "401") {
                echo "<span style='color:red;'> Department Id Already Exists</span><br>";
            }
        }
        ?>
        <br>
        <input class="btn btn-outline-primary col-12 mx-auto" type="submit" value="Register"><br><br>
        <a href="../components/Admin_Home.php?page=dept" role="button" type="button" class="btn btn-outline-warning col-12 mx-auto">Cancel</a>
        <input type="hidden" name="page" value="deptReg">
        <input type="hidden" name="userName" value="<?php echo $_SESSION['userName'];?>">
    </form>
</div>

      </div>
</div>

<?php }else if(isset($_GET['act']) && $_GET['act'] == "edi") { ?>

  <div class="cotainer-fluid bg-light h-100 bg-gradient">
<div class="card shadow-sm bg-light " style="padding:10px; height:100% ;">

  <div class="container">
    <form action="../update_data.php" method="POST" id="facultyLog">
    <legend>Update Department</legend>
        <label for="deptName">Department Name</label>
        <input readonly class="form-control form-control-sm" type="text" id="deptName" name="deptName" value="<?php echo $deptName ?>" required>

        <label for="deptId">Department ID</label>
        <input readonly class="form-control form-control-sm" type="text" id="deptId" name="deptId" value="<?php echo $deptId; ?>" required >
    
        <label for="deptHod">Department HOD</label>
        <input class="form-control form-control-sm" list="deptHod_list" id="deptHod" name="deptHod" value="<?php echo ""; ?>" required>
        <datalist id="deptHod_list">
        <?php 
            require('../proj_init.php');
            $link = connect();
            $adm = $_SESSION["userName"];
            $sql = "SELECT userName FROM staff WHERE `Department` = '$deptName' and `admin`='$adm' and `Role` = 'Teacher' and `isHod` = 'No' ";
            $res = $link->query($sql);
            while ($row = $res->fetch_assoc()){ 
        ?>
          <option><?php echo $row['userName'];?> </option>
        <?php } ?>
        </datalist>
        <?php 
        if (isset($_GET['log'])) {
            if ($_GET['log'] == "401") {
                echo "<span style='color:red;'> User Name not match to any staff member </span><br>";
            }
        }
        ?>
        <input type="hidden" name="page" value="updDept">
        <input type="hidden" name="userName" value="<?php echo $_SESSION['userName'];?>">
        <br>
        <input class="btn btn-outline-primary col-12 mx-auto" type="submit" value="Update"><br><br>
        
        <a href="../components/Admin_Home.php?page=dept" role="button" type="button" class="btn btn-outline-warning col-12 mx-auto">Cancel</a>
        
    </form>
</div>

      </div>
</div>

<?php }else{ ?>

<div class="cotainer-fluid bg-light h-100 bg-gradient">
<div class="card shadow-sm bg-light " style="padding:10px; height:100% ;">
<a style="margin: 7px 0px;" href="../components/Admin_Home.php?page=dept&act=add" role="button" type="button" class="btn btn-info btn-lg btn-block">Add Department</a>
<br>
<table class="table table-active table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">@</th>
      <th scope="col">Department Name</th>
      <th scope="col">Department Id</th>
      <th scope="col">Head of Department</th>
      <th scope="col">Actions</th>
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
        $query = "SELECT * FROM departments WHERE `dept_admin` = '$adm' LIMIT $items_per_page OFFSET $offset";
        $result = $link->query($query);
        $flag=1;
        while ($row = $result->fetch_assoc()){ ?>
        <tr >
          <td scope="row"><?php echo $i; ?></td>
          <td><?php echo $row['dept_name'] ?></td>
          <td><?php echo $row['dept_id'] ?></td>
          <td><?php echo $row['dept_hod'] ?> </td>
          <td>
          <div class="d-flex flex-row justify-content-around">
            <a id="<?php echo $row['dept_name'] ?>" name = "del_btn" class="btn btn-outline-danger btn-sm test" >REMOVE</a>
            <a href="./Admin_Home.php?page=dept&act=edi&deptName=<?php echo $row['dept_name'] . "&deptId=" . $row['dept_id'] . "&deptHod=" . $row['dept_hod']; ?> value="<?php echo $row['dept_id'] ?>" name = "del_btn" class="btn btn-outline-info btn-sm" >EDIT</a>
        </div>
          </td>
        </tr>
        <?php $i++;} ?>
  </tbody>
</table>

<!-- table end here -->

<!-- pagination starts here -->
<?php 
$total_items = $link->query('SELECT COUNT(*) FROM departments')->fetch_row()[0];
$total_pages = ceil($total_items / $items_per_page);
$next = $current_page;
if($total_pages > $current_page){
  $next = $current_page + 1;
}
$prev = $current_page;
if($current_page > 1){
  $prev = $current_page - 1;
}
?>
<div class="d-flex flex-row justify-content-between">
<a style="float:left" class="btn btn-link " href="?page=dept&pg=<?php echo $prev; ?>" role="button">Previous</a>
<a style="float:left" class="btn btn-link " href="?page=dept&pg=<?php echo $next; ?>" role="button">Next</a>
</div>
</div>
</div>
<form id="deptForm">
<input type="hidden" name="deptid" value="<?php echo $_SESSION['userName'];?>">
<input type="hidden" name="userName" value="<?php echo $_SESSION['userName'];?>">
<input type="hidden" name="userName" value="<?php echo $_SESSION['userName'];?>">
<?php } ?>
