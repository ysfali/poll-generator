<?php
	session_start();
	include("connection.php");
	// if(isset($link))
	// {
	// 	echo "Connection established";
	// }
	// print_r($_SESSION);
	// print_r($_POST);
	// $_POST['question']="sda";
	// $_POST['title']="dasnm";
    $start=time();
    // $end=time();
    // echo "$end";
    // if($_POST['time']==1)
    // {
    //     $end=date('Y-m-d h:m:s', strtotime("+1 days"));
    // }
    // if($_POST['time']==2)
    // {
    //     $end=date('Y-m-d h:m:s', strtotime("+2 days"));
    // }
    // if($_POST['time']==3)
    // {
    //     $end=date('Y-m-d h:m:s', strtotime("+3 days"));
    // }
    $start=date('Y-m-d h:m:s',$start);
    // echo "$start";
    // echo " ";
    $end = date('Y-m-d H:m:s', strtotime('+'.$_POST["time"].' days'));
    // echo "$end";
    if(isset($_SESSION['id'])){
        $query1="INSERT INTO `poll-details` (`question`,`title`,`user-id`,`start-time`,`end-time`,`multi-select`,`show-result`,`allow-comment`,`background-color`,`poll-color`,`title-color`,`num-of-options`) VALUES ('".mysqli_real_escape_string($link,$_POST['question'])."','".mysqli_real_escape_string($link,$_POST['title'])."','".$_SESSION['id']."','".$start."','".$end."','".mysqli_real_escape_string($link,$_POST['multipleoption'])."','".mysqli_real_escape_string($link,$_POST['showresult'])."','".mysqli_real_escape_string($link,$_POST['allowcomment'])."','".mysqli_real_escape_string($link,$_POST['backgroundcolor'])."','".mysqli_real_escape_string($link,$_POST['pollcolor'])."','".mysqli_real_escape_string($link,$_POST['titlecolor'])."','".mysqli_real_escape_string($link,$_POST['numoptions'])."')";
    }
    else{
        $query1="INSERT INTO `poll-details` (`question`,`title`,`user-id`,`start-time`,`end-time`,`multi-select`,`show-result`,`allow-comment`,`background-color`,`poll-color`,`title-color`,`num-of-options`) VALUES ('".mysqli_real_escape_string($link,$_POST['question'])."','".mysqli_real_escape_string($link,$_POST['title'])."','0','".$start."','".$end."','".mysqli_real_escape_string($link,$_POST['multipleoption'])."','".mysqli_real_escape_string($link,$_POST['showresult'])."','".mysqli_real_escape_string($link,$_POST['allowcomment'])."','".mysqli_real_escape_string($link,$_POST['backgroundcolor'])."','".mysqli_real_escape_string($link,$_POST['pollcolor'])."','".mysqli_real_escape_string($link,$_POST['titlecolor'])."','".mysqli_real_escape_string($link,$_POST['numoptions'])."')";
    }
    $result1=mysqli_query($link, $query1);
    if(!$result1)
    {
        echo("Error description: " . mysqli_error($link));
    }
    if($result1)
    {
    	// echo "success";
        $query2="select `id` from `poll-details` where `start-time`='".$start."' LIMIT 1";
        $result2=mysqli_query($link,$query2);
        $row2=mysqli_fetch_array($result2);
        // print_r($row2);
        echo "$row2[0]";
        $opt="option";
        $num=1;
        while($num<=$_POST['numoptions'])
        {
            // $x="option"+$num;
            // echo "$x";
            $query3="INSERT into `poll-option-details` (`option`,`poll-id`) values ('".mysqli_real_escape_string($link,$_POST[$num])."','".mysqli_real_escape_string($link,$row2['id'])."')";
            $result3=mysqli_query($link,$query3);
            $num=$num+1;
        }
    }
    else
    {
    	echo "fail";;
    }
?>