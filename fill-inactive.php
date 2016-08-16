<?php
	// session_start();
	include("connection.php");
	include("total-vote-count.php");
	$query="select * from `poll-details`";
	$result=mysqli_query($link,$query);
	// $row=mysqli_fetch_array($result);
	// print_r($row);
	if($result)
	{
		echo '<ul class="collapsible" data-collapsible="accordion">
				<li>
			      <div class="collapsible-header row table-head">
			      	<p class="col s4 font-high">Poll Title</p>
			      	<p class="col s4 font-high">Vote Count</p>
			      	<p class="col s4 font-high"></p>
			      </div>
			    </li>';
        $count=1;
        while ($row=mysqli_fetch_array($result)) {
        	$t=time();
        	$current=date('Y-m-d h:m:s',$t);
        	if($current>$row['end-time']){
        		$status="Inactive";
	        	$votes=0;
	        	echo '<li>
					    <div class="collapsible-header row head">
					      <p class="col s4 font-mid">'.$row["title"].'</p>
					      <p class="col s4 font-mid">'.$row["vote-count"].'</p>
					      <p class="col s4 font-mid"><a class="waves-effect waves-light btn red darken-2" id="'.$row['id'].'">Delete</a></p>
					    </div>
					    <div class="collapsible-body row panel">
					    	<p class="col s12 font-mid center">Question : '.$row["question"].'</p>
					    	<p class="col s12 font-mid center">Poll Link : <a href="../poll-generator/poll.php?id='.$row["id"].'"" target="_blank">Link</a></p>
					    	<table class="centered bordered highlight col s8 offset-s2">
						        <thead>
						          <tr>
						              <th data-field="id">Option</th>
						              <th data-field="name">Vote Count</th>
						          </tr>
						        </thead>
						        <tbody>';
				$query2="select * from `poll-option-details` where `poll-id`='".$row['id']."'";
				$result2=mysqli_query($link,$query2);
				while ($row2=mysqli_fetch_array($result2)) {
					$votes=$votes+$row2['vote-count'];
					echo '<tr>
							<td>'.$row2["option"].'</td>
					      <td>'.$row2["vote-count"].'</td></tr>';
				}
				echo  	'</tbody></table></div>
					  </li>';
			    $count=$count+1;
			}
        }

    	echo '</ul>';
    	if($count==1){
    		echo "<h5 class='center'>You have not made any polls . Go to <a href='../poll-generator'>main page</a> to make some.</h5>";
    	}
	}
?>