<?php
	session_start();
	include("connection.php");
	if(isset($_GET["logout"]) AND isset($_SESSION['id']))
	{
		session_destroy();
	}
	if(isset($_POST))
	{
		// print_r($_POST);
		$query="select * from `user-details` where username='".mysqli_real_escape_string($link,$_POST['username'])."' and password='".mysqli_real_escape_string($link,md5(md5($_POST['username']).$_POST['password']))."'";
		// echo "$query";
		$result=mysqli_query($link, $query);
		$row=mysqli_fetch_array($result);
		if(isset($row))
		{
			if($row['type']=='admin')
			{
				$_SESSION['id']=$row['id'];
				$_SESSION['type']="admin";
				echo "success";
			}
			
		}
		else
		{
			echo "fail";
		}
	}
?>