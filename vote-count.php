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
  				echo $row['vote-count'];
  			}
  		}
	}
	
?>