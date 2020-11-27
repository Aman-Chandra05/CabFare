<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- ICON -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>CedCab</title>
</head>

<body>
	<section id="header">
		<div>
		  <img src="../pics/logo.jpg">
		  <h1>Welcome to Cab Booking</h1>
		</div>
	</section>
	<section>
		<nav class="navbar navbar-expand-lg navbar-light">
		  <a class="navbar-brand">Hello <?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="customer.php">Home</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="customer.php">Book New Ride</a>
		      </li>
		      <li class="nav-item dropdown active">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Rides
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="ride.php?action=pending">Pending Rides</a>
		          <a class="dropdown-item" href="ride.php?action=complete">Completed Rides</a>
		          <a class="dropdown-item" href="ride.php?action=all">All Rides</a>		        
		      </li>
		      <li class="nav-item dropdown active">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Account
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="changeinfo.php?action=update">Update Information</a>
		          <a class="dropdown-item" href="changepassword.php">Change Password</a>
		      </li>
		      	<li class="nav-item active">
		        <a class="nav-link" href="../logout.php">Log Out</a>
		      </li>
		  </ul>
		  </div>
		</nav>
	</section>