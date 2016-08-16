<?php
	session_start();
	if(!isset($_SESSION['id'])){
		echo '<script>window.location.href="../poll-generator";</script>';
	}
	if(isset($_GET["logout"]) AND isset($_SESSION['id']))
  {
    session_destroy();
    echo "<script>window.location.href='../poll-generator';</script>";
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
    <title>Poll Generator</title>

    <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
      #myModal{
        width: 500px;
      }

      .padded{
        padding-left: 20px;
        padding-right: 20px;
      }

      #myModal2{
        max-height: 87vh;
      }
      .margin{
        margin: 20px;
      }
      body{
      	background-color: #f0f4c3;
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

      @media only screen and (min-width : 601px) and (max-width : 1260px) {
        .toast {
        border-radius: 0;
        text-align: center;} }

      @media only screen and (min-width : 1261px) {
      .toast {
      border-radius: 0;
      text-align: center; } }

      @media only screen and (min-width : 601px) and (max-width : 1260px) {
      #toast-container {
      right: 38%;
      left: 35%;} }

      @media only screen and (min-width : 1261px) {
      #toast-container {
      right: 38%;
      left: 35%; } }

      
      .select-wrapper input.select-dropdown {
        /*background-color: #26a69a ;*/
        border-radius: 2px;
        text-align:center;
        background: linear-gradient(to bottom, #fff,#26a69a );
      }

    </style>
  </head>


  <body>


  	<div class="navbar-fixed">
      <nav  class="green lighten-2">
      <div class="nav-wrapper">
        <div class="container">
          <a href="../poll-generator" class="center brand-logo">Poll Generator</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
	         <li><a class="right"href="?logout=1">Logout</a></li>
	       </ul>
	       <ul class="side-nav" id="mobile-demo">
	         <li><a class="right" href="?logout=1">Logout</a></li>
	       </ul>
         </div>
        </div>
      </nav>
    </div>

    <div class="container">
    	<h5 class="center margin">This is where you can see all your polls</h5>
    	<?php
    		include("fill-dashboard.php");
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
