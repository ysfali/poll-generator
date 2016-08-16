<?php
	include("connection.php");
	if(isset($_POST['id'])){
		$query="delete from `poll-details` where `id`='".$_POST['id']."'";
		$result=mysqli_query($link,$query);
		if($result){
			$query="delete from `poll-option-details` where `poll-id`='".$_POST['id']."'";
			$result=mysqli_query($link,$query);
			if($result){
				echo "success";
			}
		}
	}
?>