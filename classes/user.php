<?php
date_default_timezone_set("Asia/Bangkok");
class user
{
	public function register($username,$name,$password,$mobile,$conn)
	{
		$sql="SELECT * FROM tbl_user WHERE user_name='$username'";
	    $res=$conn->query($sql);
	    if($res->num_rows>0)
	    {
	    	return 0;
	    }
	       else
	    {
	    	$date=date("Y/m/d");
	    	$password=md5($password);
	        $sql="INSERT INTO `tbl_user`(`user_name`, `name`, `dateofsignup`, `mobile`, `isblocked`, `password`, `is_admin`) VALUES ('$username','$name','$date','$mobile','1','$password','0')";
	        $res=$conn->query($sql);
	        return 1;
	    }  
	}
	public function login($username,$password,$conn)
	{
		$password=md5($password);
		    
		$sql="SELECT * FROM `tbl_user` WHERE `user_name`='$username'AND `password`='$password'";
		$res=$conn->query($sql);
		if($res->num_rows>0)
		{
		    $row=$res->fetch_assoc();
		    return $row;
		}
		else
		{
		    return 0;
		}   

	}
	public function getall($conn)
	{
		$sql="SELECT * FROM `tbl_user`";
		$res=$conn->query($sql);
		return $res;
	}
	public function fetch($conn,$id)
	{
		$sql="SELECT * FROM `tbl_user` WHERE `user_id`='$id'";
		$res=$conn->query($sql);
		while($row=$res->fetch_assoc())
		{
			$arr[]=$row;
		}
		return $arr;
	}
	public function changestatus($id,$operation,$conn)
	{
		if($operation=='block')
			$status=1;
		else
			$status=0;
		$sql="UPDATE `tbl_user` SET `isblocked`='$status' WHERE `user_id`='$id'";
		$res=$conn->query($sql);
		
	}
	public function update($conn,$id,$name,$mob)
	{
		$sql="UPDATE `tbl_user` SET `name`='$name', `mobile`='$mob' WHERE `user_id`='$id'";
		$res=$conn->query($sql);
		if($res)
		{
		    return 1;
		}
		else
		{
		    return 0;
		} 
	}
	public function changepassword($conn,$id,$old,$new)
	{
		$password=md5($new);
		$sql="UPDATE `tbl_user` SET `password`='$password' WHERE `user_id`='$id'";
		$res=$conn->query($sql);
		if($res)
		    return 1;
	}
}
?>