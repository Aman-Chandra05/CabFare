<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
class ride
{
	public function insert($conn)
	{
		if(isset($_SESSION['username']))
		{
			$date=date("Y/m/d");
			 $pick=$_SESSION['pickup'];
			 $drop=$_SESSION['drop'];
			 $total_distance=$_SESSION['dist'];
			 $luggage=$_SESSION['luggage'];
			 $total_fare=$_SESSION['price'];
			 $customer_user_id=$_SESSION['userid'];
			 $cab=$_SESSION['cab'];
			if(isset($_SESSION['userid']) && isset($_SESSION['price']))
			{
				$sql="INSERT INTO `tbl_ride`(`ride_date`, `pick`, `drop`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id`,`cab`) VALUES  ('$date','$pick','$drop','$total_distance','$luggage','$total_fare','1','$customer_user_id','$cab')";
	        	$res=$conn->query($sql);
	        	if($res)
	        	{
	        		return 1;
	        	}
			}
		}
	}
	public function showrides($status,$conn)
	{
		if(isset($_SESSION['username']))
		{
		  $customer_user_id=$_SESSION['userid'];
		  if($status=='pending')
			$status=1;
		  elseif ($status=='complete') 
			$status=2;
		 if($status==1 || $status==2)
		 {
		 	$sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$customer_user_id'AND `status`='$status'";
		 }
		 else 
		 	$sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$customer_user_id'";
		 $res=$conn->query($sql);
		while($row=$res->fetch_assoc())
		{
			$arr[]=$row;
		}
		return $arr;
			}

	}
}


?>