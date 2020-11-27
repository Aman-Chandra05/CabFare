<?php 
include '../classes/config.php';
include '../classes/loc.php';
include '../classes/ride.php';
include '../classes/user.php';
$conn=new dbase();
$user=new user();
$conn=$conn->connection();
$msg='';

if(isset($_POST['update']))
{
	$res=$user->fetch($conn,$_SESSION['userid']);
	foreach($res as $key)
	{
		$pass=$key['password'];
	}
	if($pass!=md5($_POST['old']))
		$msg="Updation Failed";
	else
	{
		$res=$user->changepassword($conn,$_SESSION['userid'],$_POST['old'],$_POST['new']);
		if($res)
			$msg="Updation Successfull";
	}
}
?>            
<?php 
include 'header.php';
?>

<div id="content" class="my-1 rounded">
	<section id="form" class="container">
		<div class="row">
			<div class="col-sm-6 p-3">
				<div class="bg-light p-3 rounded shadow p-3 mb-5 bg-white rounded">
					<p class="text-center font-weight-bold">Your Information</p>
					<form action="" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text">Old Password</span>
							</div>
							<input required type="password" name="old" class="form-control">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text">New Password</span>
							</div>
							<input required type="password" name="new" class="form-control">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend"></div>
							<input type="submit" name="update" class="btn btn-warning btn-block" value="Update">
						</div>	
						<p><?php echo $msg; ?></p>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
include 'footer.php';
?>
</div>
