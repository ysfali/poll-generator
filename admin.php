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
      .sized{
        width: 150px;
        height: 150px;
      }
      #mycontainer{
        margin-top: 15vh;
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
      body{
        background-color: #e8eaf6;
      }
      .margin-top{
        margin-top: 50px;
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
	         <li><a class="right" href="?logout=1">Logout</a></li>
	       </ul>
	       <ul class="side-nav" id="mobile-demo">
	         <li><a class="right" href="?logout=1">Logout</a></li>
	       </ul>
         </div>
        </div>
      </nav>
    </div>

    <div class="container">
      <h4 class="center margin-top">Manage Polls</h4>
    	<div class="row center" id="mycontainer">

        <div class="col s4 center" id="active">
          <a href="active.php"><img src="images/play-button.svg" class="sized"></a>
          <h4>Active Polls</h4>
        </div>
        <div class="col s4 center" id="inactive">
          <a href="inactive.php"><img src="images/stop.svg" class="sized"></a>
          <h4>Inactive Polls</h4>
        </div>
      </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
    	$(".button-collapse").sideNav();
    </script>
