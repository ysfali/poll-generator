<?php
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['type'])){
		echo '<script>window.location.href="../poll-generator/admin-login.php";</script>';
	}
  if($_SESSION['type']!="admin"){
    echo '<script>window.location.href="../poll-generator/admin-login.php";</script>';
  }
	if(isset($_GET["logout"]) AND isset($_SESSION['id']))
  {
    session_destroy();
    echo "<script>window.location.href='../poll-generator/admin-login.php';</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="images/survey-icon.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Dashboard</title>

    <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
    body{
      background-color: #f0f4c3;
    }
      .sized{
        width: 150px;
        height: 150px;
      }
      #mycontainer{
        margin-top: 20vh;
      }
      #active{
        background-color: #8bc34a;
        padding: 50px;
        margin: 20px;
        margin-right: 16vw;
        border-radius: 5px;
      }
      #inactive{
        background-color: #03a9f4;
        padding: 50px;
        margin: 20px;
        border-radius: 5px;
      }
      p{
        margin: 0px;
        padding:0px;
      }
      .font-high{
        font-size: 20px;
        font-weight: bold;
      }
      .font-mid{
        font-size: 16px;
        font-weight: bold;
      }
      .font-low{
        font-size: 14px;
      }
      .table-head{
        background-color: black;
        padding: 5px;
        color: white;
        border-radius: 2px;
      }
      .head{
        background-color: #5c6bc0;
        padding: 5px;
        border-radius: 2px;
      }
      .panel{
        background-color: #80cbc4;
        padding: 20px;
        border-radius: 5px;
      }
    </style>
  </head>


  <body>


  	<div class="navbar-fixed">
      <nav  class="grey darken-3">
      <div class="nav-wrapper">
        <div class="container">
          <a href="../poll-generator/admin.php" class="center brand-logo">Poll Generator Admin Panel</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a class="right" href="admin.php">Dashboard</a></li>
	         <li><a class="right" href="?logout=1">Logout</a></li>
	       </ul>
	       <ul class="side-nav" id="mobile-demo">
            <li><a class="right" href="admin.php">Dashboard</a></li>
	         <li><a class="right" href="?logout=1">Logout</a></li>
	       </ul>
         </div>
        </div>
      </nav>
    </div>

    <div class="container">
    	<h4 class="center">Manage all the active polls</h4>
      <?php
        include("fill-active.php");
      ?>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
    	$(".button-collapse").sideNav();
      $(".btn").click(function(){
        if(confirm("Are you sure you want to delete this poll?"))
        {
          var id=this.id;
          var inp="id="+id;
          $.ajax({
              type: "POST",
              url: "delete.php",
              data: inp,
              success: function(data){
                // alert(data);
                if(data=="success")
                {
                  location.reload();
                }
                else
                {
                  alert("unable to delete");
                }
              }
            });
          }        

      });
    </script>
