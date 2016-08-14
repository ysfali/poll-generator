<?php
	session_start();

	include("connection.php");
	if(isset($_POST))
	{
		// print_r($_POST);
		$query="select * from `user-details` where username='".mysqli_real_escape_string($link,$_POST['username'])."'";
		$result=mysqli_query($link, $query);
		$row=mysqli_fetch_array($result);
		// print_r($row);
		if(!$row)
		{
			$query="INSERT INTO `user-details` (`name`,`email`,`username`,`password`)
			VALUES ('".mysqli_real_escape_string($link,$_POST['name'])."', '".mysqli_real_escape_string($link,$_POST['email'])."', '".mysqli_real_escape_string($link,$_POST['username'])."', '".mysqli_real_escape_string($link,md5(md5($_POST['username']).$_POST['password1']))."')";
			$result=mysqli_query($link, $query);
			$query="select * from `user-details` where username='".mysqli_real_escape_string($link,$_POST['username'])."'";
			$result=mysqli_query($link, $query);
			$row=mysqli_fetch_array($result);
			$_SESSION['id']=$row['id'];
			echo "success";
		}
		else{
			echo "fail";
		}
	}
	/*else
	{
		echo "no match";
	}*/
?>