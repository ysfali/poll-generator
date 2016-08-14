<?php
	include("connection.php");
	if(isset($_POST))
	{
		// print_r($_POST);
		$query="select * from `poll-option-details` where `poll-id`='".$_POST['id']."'";
  		$result=mysqli_query($link,$query);
  		$count=$_POST['optionno'];
  		while($row=mysqli_fetch_array($result))
  		{
  			$count=$count-1;
  			// print_r($row);
  			if($count==0){
  				$votecount=$row['vote-count']+1;
  				$query="update `poll-option-details` set `vote-count`='".$votecount."' where `id`='".$row['id']."'";
  				$result=mysqli_query($link,$query);
  				if($result){
  					echo "success";
  					break;
  				}
  			}
  		}
	}
	
?>