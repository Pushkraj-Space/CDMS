<div class="container">
    <form action="../save_server.php" method="POST" id="facultyLog">
    <legend>Login as Faculty</legend>
        <label for="userName">User Name</label>
        <input class="form-control form-control-sm" type="text" id="userName" name="userName" value="" required>

        <label for="setPass">Password</label>
        <input class="form-control form-control-sm" type="password" id="setPass" name="setPass" value="" required>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <input class="btn btn-outline-primary" type="submit" value="Login">
            <a class="btn btn-outline-secondary" role="button" href='./Login.php?user=Stud'>Login as Student</a>
        </div>
        <?php 
        if (isset($_GET['log'])) {
            if ($_GET['log'] == "404") {
                echo "<span style='color:red;'> User Name and Password do not Match </span><br>";
            }
        }
        ?>
        <label for="">Do not have account?</label>
        <a href='./Register.php?user=Faculty'>Register</a><br>
        

        <input type="hidden" name="page" value="facultyLog">
    </form>
</div>