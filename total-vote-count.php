<?php
  $query="select * from `poll-details` where `user-id`='".$_SESSION['id']."'";
  $result=mysqli_query($link,$query);
  while ($row=mysqli_fetch_array($result)) {
    $count=0;
    $query2="select * from `poll-option-details` where `poll-id`='".$row['id']."'";
    $result2=mysqli_query($link,$query2);
    while ($row2=mysqli_fetch_array($result2)) {
      $count=$count+$row2['vote-count'];
    }
    $query3="update `poll-details` set `vote-count`='".$count."' where `id`='".$row['id']."'";
    $result3=mysqli_query($link,$query3);
  }
?>