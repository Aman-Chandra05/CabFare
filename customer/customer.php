<?php 
include '../classes/config.php';
include '../classes/loc.php';
include '../classes/ride.php';
$conn=new dbase();
$conn=$conn->connection();
$loc=new loc();
$ride=new ride();
$booking='';
if(isset($_POST['book']))
{
	$res=$ride->insert($conn);
	if($res==1)
	{?>
		<script type="text/javascript">
			alert("Booking Successfull. Admin will soon confirm your booking");
		</script>
	<?php
	}
}
?>
<?php 
include 'header.php';
?>
	<div id="content" class="my-1 rounded">
	<section id="middle" class="container pt-3">
		<h1 class="text-white text-center font-weight-bold">Book a City Taxi to your Destination in Town</h1>
		<h5 class="text-white text-center">Choose from a range of categories and Prices</h5>
	</section>
	<section id="form" class="container mt-5">
		<div class="row">
		<div class="col-sm-6 p-3">
			<div class="bg-light p-3 rounded shadow p-3 mb-5 bg-white rounded">
				<p class="text-center"><span class="p-2" id="citytaxi">City Taxi</span></p>
				<p class="text-center font-weight-bold mb-0">Your Everyday travel partner </p>
				<p class="text-center">AC cabs for point to point travel</p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="basic-addon1">PICK UP</span>
					</div>
					  <select id="pickup" class="form-control" onchange="pickuperr()">
					  <option class="form-control" value="" disabled selected>Current Location</option>
					  <?php
					  $arr=$loc->getall($conn);
					  foreach($arr as $key)
					  {?>
					  	<option value="<?php echo $key['id'];?>"><?php echo $key['name'];?></option>
					  <?php
					}?>
					 </select>
				</div>
				<div class="errmsg" id="pickmsg">
					<p>Enter Pickup Location</p>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text">DROP</span>
					</div>
					  <select id="drop" class="form-control" onchange="droperr()">
					  <option class="form-control" value="" disabled selected>Enter Drop for Estimate Ride</option>
					  <?php
					  $arr=$loc->getall($conn);
					  foreach($arr as $key)
					  {?>
					  	<option value="<?php echo $key['id'];?>"><?php echo $key['name'];?></option>
					  <?php
					}?>

					</select>
				</div>
				<div class="errmsg" id="dropmsg">
					<p>Enter Drop Location</p>

				</div>
				<p class="errmsg" id="samelocation">Pickup and Drop Location can not be same</p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text">CAB TYPE</span>
					</div>
					<select id="cab" name="cars" class="form-control mdb-select md-form" onchange="cabtype(this.value)">
					  <option selected value="" disabled="">Select-Cab-Type</option>
					  <option value="micro">CedMicro</option>
					  <option value="mini">CedMini</option>
					  <option value="suv">CedSuv</option>
					  <option value="royal">CedRoyal</option>
					</select>
				</div>
				<div class="errmsg" id="cabmsg">
					<p>Enter Cab Type</p>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text">LUGGAGE</span>
					</div>
					<input onchange="luggerr()" type="text" id="luggage" class="form-control" placeholder="Enter weight in Kg">
				</div>
				<div class="errmsg" id="luggmsg">
					<p>Enter Positive Integer value</p>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend"></div>
					<input type="button" id="sub" class="btn btn-warning btn-block" value="Calculate Fare">
				  </div>	
				  <p><?php echo $booking; ?></p>	
			</div>

		</div>
		<div class="col-sm-6 p-3 " id="result">
			<div class="bg-light p-3 rounded w-auto shadow p-3 mb-5 bg-white rounded">
				<p>Pick Up: <span id="pickuplocation"></span></p>
				<p>Drop Location: <span id="droplocation"></span></p>
				<p>Total Distance: <span id="dist"></span> Km</p>
				<p>Total Fare: Rs. <span id="fare"></span></p>
				<button type="button" class="btn btn-warning">OK</button>
				<p> 
					<form method="POST" action="">
						<input type="submit" value="Book"  class="btn btn-warning" name="book">
					</form>
				</p>
			</div>
			
		</div>
		</div>
	</section>
	</div>
<?php 
include 'footer.php';
?>