<?php
include 'header.php';
include '../classes/user.php';
$user=new user();

if(isset($_GET['type']) && isset($_GET['id']) && isset($_GET['operation']))
{
	if($_GET['type']=='status')
	{
		$user->changestatus($_GET['id'],$_GET['operation'],$conn);
	}
}
?>
<section id="content">
	<div class="table">
	<h1>All Users</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Status</th>
		</tr>
		<?php
			$res=$user->getall($conn);
			while($row = $res->fetch_assoc())
			{?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<?php
					if($row['isblocked']==0)
						{
							echo "<td><a class='active' href='?type=status&operation=block&id=".$row['user_id']."'>Unblocked</a>";
						}
						else
						{
							echo "<td><a class='deactive' href='?type=status&operation=unblock&id=".$row['user_id']."'>Blocked</a>";	
						}?>
				</tr>
			<?}
			?>
	</table>
</div>
</section>
<?php
include 'footer.php';
?>
