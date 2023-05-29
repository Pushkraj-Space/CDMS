<?php 
if(isset($page) && $page == 'index'){
	$path = "./index.php";
}else{
	$path =  "../index.php";
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $path; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
		<?php 
			if(isset($_SESSION['logedin'])) { ?>
    <form class="form-inline my-2 my-lg-0">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <a href="../Logout.php" class="btn btn-outline-success my-2 my-sm-0" >Logout</a>
    </form>
		<?php } ?>
  </div>
</nav>