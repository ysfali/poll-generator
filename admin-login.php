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

      body{
        background-color: #212121;
      }
      
      #mycontainer{
        background-color: #cfd8dc;
        padding: 50px;
        margin-top: 20vh;
        border-radius: 5px;
      }

    </style>
  </head>


  <body>


    <div class="container" id="mycontainer">
      <h4 class="center">Administrator Sign In</h4>
      <p id="useralert" style="display:none" class="red center">Username and Password dont match!. Please try again later.</p>
      <form method="post" id="loginForm">
        <div class="row">
          <div class="input-field col s8 offset-s2">
            <label for="username">Username</label>
            <input type="text" class="validate" name="username" id="username" />
            <p id="usernameerror" class="red center" style="display:none">Enter your username</p>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8 offset-s2">
            <label for="password">Password</label>
            <input type="password" class="validate" name="password" id="password" />
            <p id="passworderror" class="red center" style="display:none">Enter your password</p>
          </div>
        </div>
        <div class="center">
          <input type="submit" class="btn" value="Sign In" name="submit"/>
        </div>
      </form>
    </div>

          <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


    <script>

      $("#loginForm").submit(function(event){
        event.preventDefault();
        var username=$("#username").val();
        var password=$("#password").val();
        var type=$("#type").val();
        var flag1=0,flag2=0;
        if(username=="")
        {
          flag1=1;
          $("#usernameerror").show();
        }
        else
        {
          flag1=0;
          $("#usernameerror").hide();
        }
        if(password=="")
        {
          flag2=1;
          $("#passworderror").show();
        }
        else
        {
          flag2=0;
          $("#passworderror").hide();
        }
        if(flag1==0 && flag2==0)
        {
          $("#useralert").hide();
          var inp=$("#loginForm").serialize();
          $.ajax({
            type: "POST",
            url: "login-admin.php",
            data: inp,
            success: function(data){
              // alert(data);
              if(data=="success")
              {
               $("#useralert").hide();
               window.location.href="admin.php";
              }
              else if(data=="fail")
              {
                $("#useralert").show();
              }
            }
          });
        }
      });

    </script>
  </body>
  </html>