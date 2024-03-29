<?php
	session_start();
	include("connection.php");
	// print_r($_GET);
	$query="select * from `poll-details` where id='".$_GET['id']."'";
  $result=mysqli_query($link,$query);
  $row=mysqli_fetch_array($result);
  if(!$row){
    echo "<h4 class='center'>The poll you are looking for does not exist</h4>";
    exit();
  }
    // print_r($row);
  $t=time();
  $current=date('Y-m-d h:m:s',$t);
  if($current>$row['end-time']){
    echo "<h4 class='center'>The poll you are looking for does not exist</h4>";
    exit();
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

      #poll{
        background-color: <?php if(isset($row['poll-color']) AND $row['poll-color']!=""){echo $row['poll-color'];}else{echo '#9e9e9e';} ?>;
        padding: 20px;
        margin-top: 10vh;
        border-radius: 3px;
      }
      #title{
        background-color: <?php if(isset($row['title-color']) AND $row['title-color']!=""){echo $row['title-color'];}else{echo '#a5d6a7';} ?>;
        border-radius: 2px;
      }
      body{
        background-color: <?php if(isset($row['background-color']) AND $row['background-color']!=""){echo $row['background-color'];}else{echo 'white';} ?>;
      }
      label{
        color: white;
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


    </style>
  </head>

  <body>

  	<div class="container row" id="poll">
      <div class="col s6 offset-s3">
        <h4 class="center" id="title"><?php if(isset($row['title'])){echo $row['title'];} ?></h4>
        <h5><?php if(isset($row['question'])){echo $row['question'];} ?></h5>
        <div id="options">
          <?php
            $query2="select * from `poll-option-details` where `poll-id`='".$_GET['id']."'";
            $result2=mysqli_query($link,$query2);
            // print_r($row2);
            if($result2)
            {
              echo "<form method='post' id='myform'>";
              $counter=1;
              while($row2=mysqli_fetch_array($result2))
               {
                if($row['multi-select']==1){
                  echo "<p><input type='checkbox' id='option".$counter."'/><label id='option".$counter."l' for='option".$counter."'>".$row2['option']."</label></p>";
                }
                else{
                  echo "<p><input name='group1' type='radio' id='option".$counter."'/><label id='option".$counter."l' for='option".$counter."'>".$row2['option']."</label></p>";
                }
                   $counter=$counter+1;
                  //print_r($row2);
               } 
               echo "<div class='center'><button class='btn waves-effect waves-light' type='submit' if='form-submit' name='action'>Submit</button></div>";
               echo "</form>";
            }
          ?>
        </div>
      </div>
    </div>

    <div id="numoptionsdata" style="display:none;"><?php if(isset($row)){echo $row['num-of-options'];} ?></div>
    <div id="polliddata" style="display:none;"><?php if(isset($row)){echo $row['id'];} ?></div>
    
    

  	<!--Import jQuery before materialize.js-->
  	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script>
      var rel=0;
      var numoptions=$("#numoptionsdata").html();
      var id=$("#polliddata").html();
      $("#myform").submit(function(event){
        event.preventDefault();
        for (var i = 1; i <= numoptions; i++) {
          if($('#option'+i).is(":checked")){
            rel=1;
            var inp="id="+id+"&optionno="+i;
            $.ajax({
              type: "POST",
              url: "add-vote.php",
              data: inp,
              success: function(data){
                if(data=="success")
                {
                  // Materialize.toast('Your response has been registered', 4000);
                }
              }
            });
          }
        };
        // Materialize.toast('Your response has been registered', 4000);
        // sleep(10000);
        // location.reload();
        if(rel==1){
          // window.location.href="response.php?id="+id;
          // Materialize.toast('Your response has been registered', 4000);
          alert('Your response has been registered');
          if($("#piechart").html()){
            $("#chart-header").addClass("active");
            drawChart();
            $("#chart-header").removeClass("active");
            location.reload();
          }
        }
      });
      

    </script>


    <?php
      if(isset($row['show-result']) AND $row['show-result']==1){
        echo '<div class="row">
                <ul class="collapsible col s8 offset-s2" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header" id="chart-header" onclick="draw()"><i class="material-icons">filter_drama</i>Show Previous Results</div>
                    <div class="collapsible-body" id="chartcontainer">
                      <div class="row center margin" id="chart"><div id="piechart" class="col s8 offset-s2" style="height:400px;"></div></div>
                    </div>
                  </li>
                </ul>
              </div>';
        echo "<script>
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                var temp=0;
                var piedata = new google.visualization.DataTable();
                piedata.addColumn('string', 'Option');
                piedata.addColumn('number', 'Vote count');
                for (var i = 1; i <= numoptions; i++) {
                  var inp='id='+id+'&optionno='+i;
                  $.ajax({
                    type: 'POST',
                    async: false,
                    url: 'vote-count.php',
                    data: inp,
                    success: function(data){
                      if(data)
                      {
                        if(data>0){temp=1;}
                        var x=parseInt($.trim(data));
                        var str='option'+i;
                        str=$('#'+str+'l').html();
                        piedata.addRow([str,x]);
                      }
                    }
                  });
                }

                var options = {
                  title: 'Previous Response Result'
                };
                if(temp==1){
                  $('#piechart').html('');
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                  chart.draw(piedata, options);
                }
                else{
                  $('#piechart').html('No one has answered this poll yet!');
                }
              }
            </script>";
      }
    ?>
  </body>
</html>