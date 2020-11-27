<?php
include '../classes/config.php';
include '../classes/loc.php';
include '../classes/ride.php';
$conn=new dbase();
$ride=new ride();
$conn=$conn->connection();
if(isset($_GET['action']))
{
	$res=$ride->showrides($_GET['action'],$conn);
}
?>
<?php
include 'header.php';
?>
	<div id="content" class="my-1 rounded">
			<div id='form' class="container p-5">
				<table class="w-100 bg-light p-5 rounded">
					<tr>
						<th>Date</th>
						<th>Pick Up</th>
						<th>Drop</th>
						<th>Distance</th>
						<th>Luggage</th>
						<th>Cab Type</th>
						<th>Fare</th>
					</tr>
					<?php
					foreach ($res as $key) 
					{?>
						<tr>
							<td><?php echo $key['ride_date'];?></td>
							<td><?php echo $key['pick'];?></td>
							<td><?php echo $key['drop'];?></td>
							<td><?php echo $key['total_distance'];?></td>
							<td><?php echo $key['luggage'];?></td>
							<td><?php echo $key['cab'];?></td>
							<td><?php echo $key['total_fare'];?></td>
						</tr>
					<?php
					}
					?>
				</table>
			</div>
	</div>
	<?php 
		include 'footer.php';
	 ?>