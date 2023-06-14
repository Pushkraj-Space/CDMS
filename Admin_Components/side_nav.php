<!-- <div class="col"> -->
<?php 
    if(isset($_GET['page'])){
        if($_GET['page'] == "dept"){
            $cls = '2';
        }else if($_GET['page'] == "staff"){
            $cls = '3';
        }else if($_GET['page'] == "stud"){
            $cls = '4';
        }else if($_GET['page'] == "abt"){
            $cls = '5';
        }else if($_GET['page'] == "cont"){
            $cls = '6';
        }else if($_GET['page'] == "announce"){
            $cls = '7';
        }else{
            $cls = '1';
        }
    }else{
        $cls = '1';
    }   
?>
<div id="sidebar-wrapper" class="fll" style="float:left;">
            <ul class="sidebar-nav mb-auto">
                <li class="sidebar-brand">
                    <a href="#">Welcome <?php echo $_SESSION['userName'];?></a>
                </li>
                <hr style="height:1px; width:100%; border-width:0; color:white; background-color:white">
                <li>
                    <a class = "nav-link <?php echo ($cls == '1')? 'active' : '';?>" href="../components/Admin_Home.php">Home</a>
                </li>
                <li>
                    <a class = "nav-link <?php echo ($cls == '2')? 'active' : '';?>" href="../components/Admin_Home.php?page=dept">Departments</a>
                </li>
                <li>
                    <a class = "nav-link <?php echo ($cls == '3')? 'active' : '';?>" href="../components/Admin_Home.php?page=staff">Staff</a>
                </li>
                <li>
                    <a class = "nav-link <?php echo ($cls == '4')? 'active' : '';?>" href="../components/Admin_Home.php?page=stud">Students</a>
                </li>   
                <li>
                    <a class = "nav-link <?php echo ($cls == '5')? 'active' : '';?>" href="../components/Admin_Home.php?page=abt">About</a>
                </li>
                <li>
                    <a class = "nav-link <?php echo ($cls == '6')? 'active' : '';?>" href="../components/Admin_Home.php?page=cont">Contacts</a>
                </li>
                <li class="">
                    <a class = "nav-link" href="../Logout.php">Logout</a>
                </li>
            </ul>
            <!-- <ul class="sidebar-nav nav flex-column nav-pills nav-fill mb-auto">
            <li class="sidebar-brand">
                    <a href="#">Hello <?php echo $_SESSION['userName'];?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul> -->
        </div>
<!-- </div> -->