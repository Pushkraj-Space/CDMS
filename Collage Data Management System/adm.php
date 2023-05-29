<div class="cotainer-fluid bg-light h-100 bg-gradient">
<div class="card shadow-sm bg-light " style="padding:10px; height:100% ;">
<div class="card bg-light shadow-sm hh" style="margin: -8px;">
  <h1> Student Data Management System </h1>
</div>

<div class="bg-dark" style="margin-top:12px; padding:2px">
<div class="card-header bg-light border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
      <div class="card-body pt-0 bg-light">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Full Name</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['fname'] . " " . $_SESSION['mname'] . " " . $_SESSION['lname']; ?></td>
              </tr>
              <tr>
                <th width="30%">Collage Name</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['cname']; ?></td>
              </tr>
              <tr>
                <th width="30%">Collage Address</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['address']; ?></td>
              </tr>
              <tr>
                <th width="30%">Contact</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['MobileNo']; ?></td>
              </tr>
              <tr>
                <th width="30%">Address</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['address']; ?></td>
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
                <th width="30%">Total Departments</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['dept_cnt']; ?></td>
              </tr>
              <tr>
                <th width="30%">Total Staff</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['staff_cnt']; ?></td>
              </tr>
              <tr>
                <th width="30%">Total Students</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['stud_cnt']; ?></td>
              </tr>
            </table>
          </div>

</div>
</div>
</div>