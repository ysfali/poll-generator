<?php
  session_start();
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
      }/*
      body{
        background-color: #00838f ;
      }*/
      #poll-container{
        min-height: 90vh;
        background-color: #f0f4c3;
        padding: 20px;
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

      #question-panel{
        background-color: white;
        margin: 0px;
        padding: 20px;
      }
      #theme-panel{
        background-color: white;
        margin: 0px;
        padding: 20px;
      }
      #settings-panel{
        background-color: white;
        margin: 0px;
        padding: 20px;
      }
      .sized{
        height: 100px;
        width: 100px;
      }
      .font-high{
        font-weight: bold;
        color: #616161;
      }
      #poll-detail{
        background-color: white;
      }

    </style>
  </head>


  <body>

    <div class="navbar-fixed">
      <nav class="green lighten-2">
      <div class="nav-wrapper">
        <div class="container">
          <a href="../poll-generator" class="center brand-logo">Poll Generator</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
           <?php
           if(!isset($_SESSION['id']))
           {
              echo '<ul class="right hide-on-med-and-down">
                     <li><a class="right modal-trigger" data-target="myModal1" href="#myModal1">Login</a></li>
                     <li><a class="right modal-trigger" data-target="myModal2" href="#myModal2">Sign Up</a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                     <li><a class="right modal-trigger" data-target="myModal1" href="#myModal1">Login</a></li>
                     <li><a class="right modal-trigger" data-target="myModal2" href="#myModal2">Sign Up</a></li>
                    </ul>';
            }
            else{
              echo '<ul class="right hide-on-med-and-down">
                      <li><a class="right"href="dashboard.php">Dashboard</a></li>
                      <li><a class="right"href="?logout=1">Logout</a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                      <li><a class="right"href="dashboard.php">Dashboard</a></li>
                      <li><a class="right" href="?logout=1">Logout</a></li>
                    </ul>';
            }
           ?>
         </div>
        </div>
      </nav>
    </div>

  <!-- Poll Form -->
  <div  id="poll-container">
    <div class="container">
      <div class="row">
        
        <div class="col s8 offset-s2">
          <h4 class="center">Here you can create your polls!</h4>
          <ul class="collapsible" data-collapsible="accordion">
            <li>
              <div class="collapsible-header active"><i class="material-icons">description</i>Question</div>
              <div class="collapsible-body">
                <div class="row padded" id="question-panel">
                  <form method="post" id="myform">
                    <div class="input-field col s8 offset-s2">
                      <input type="text" name="title" class="validate" value='<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>' id="title">
                      <label class="active" for="title">Title</label>
                    </div>
                    <div class="input-field col s12">
                      <input type="text" name="question" class="validate" value="" id="question">
                      <label class="active" for="question">Enter your question here</label>
                    </div>
                    <div class="input-field col s6">
                      <input type="text" name="option1" id="option1" class="validate" value="">
                      <label class="active" for="option1">Option 1</label>
                    </div>
                    <div class="input-field col s6">
                      <input type="text" name="option2" id="option2" class="validate" value="">
                      <label class="active" for="option2">Option 2</label>
                    </div>
                    <div class="input-field col s6">
                      <input type="text" name="option3" id="option3" class="validate" value="">
                      <label class="active" for="option3">Option 3</label>
                    </div>
                    <div class="input-field col s6">
                      <input type="text" name="option4" id="option4" class="validate" value="">
                      <label class="active" for="option4">Option 4</label>
                    </div>
                    
                  </form>
                  <?php
                  if(isset($_SESSION['id']))
                    {
                      // print_r($_SESSION);
                      echo '<div class="margin"><a href="#" class="btn" id="addopt">Add more options</a></div>';
                    }
                  ?>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">color_lens</i>Themes</div>
              <div class="collapsible-body" id="theme-panel">
                <form method="post" id="theme-form">
                  <div class="row margin">
                    <div class="col s4 offset-s1">
                      <br/>
                      <label style="font-size:15px;">Background color : </label>
                    </div>
                    <div class="input-field col s5 offset-s1">
                      <select id="background-color">
                        <option value="white" disabled selected>Choose color(default white)</option>
                        <option value="white">white</option>
                        <option value="#e0e0e0">light grey</option>
                        <option value="#c8e6c9">light green</option>
                        <option value="#f8bbd0">light pink</option>
                        <option value="#ffcdd2">light red</option>
                        <option value="#bbdefb">light blue</option>
                        <option value="#d7ccc8">light brown</option>
                        <option value="#fff9c4">light yellow</option>
                      </select>
                    </div>
                    <!-- <div class="row margin"> -->
                    <div class="col s4 offset-s1">
                      <br/>
                      <label style="font-size:15px;">Poll color : </label>
                    </div>
                    <div class="input-field col s5 offset-s1">
                      <select id="poll-color">
                        <option value="#9e9e9e" disabled selected>Choose color(default grey)</option>
                        <option value="#9e9e9e">grey</option>
                        <option value="#4caf50">green</option>
                        <option value="#795548">brown</option>
                        <option value="#000000">black</option>
                        <option value="#ff9800">orange</option>
                        <option value="#8bc34a">light green</option>
                        <option value="#f44336">red</option>
                      </select>
                    </div>
                    <!-- <div class="row margin">  -->
                    <div class="col s4 offset-s1">
                      <br/>
                      <label style="font-size:15px;">Title color : </label>
                    </div>
                    <div class="input-field col s5 offset-s1">
                      <select id="title-color">
                        <option value="#a5d6a7" disabled selected>Choose color(default light-green)</option>
                        <option value="#a5d6a7">light-green</option>
                        <option value="white">white</option>
                        <option value="#e0e0e0">light grey</option>
                        <option value="#c8e6c9">light green</option>
                        <option value="#f8bbd0">light pink</option>
                        <option value="#ffcdd2">light red</option>
                        <option value="#bbdefb">light blue</option>
                        <option value="#d7ccc8">light brown</option>
                        <option value="#fff9c4">light yellow</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">settings</i>Settings</div>
              <div class="collapsible-body" id="settings-panel">
                <form method="post" id="settings">
                  <div class="margin">
                    <input type="checkbox" class="filled-in" id="box1"/>
                    <label for="box1">Allow multiple option select</label>
                  </div>
                  <div class="margin">
                    <input type="checkbox" class="filled-in" id="box2"/>
                    <label for="box2">Show results</label>
                  </div>
                  <!-- <div class="margin">
                    <input type="checkbox" class="filled-in" id="box3"/>
                    <label for="box3">Allow comments</label>
                  </div> -->
                  <div class="row margin">
                    <div class="col s4">
                      <br/>
                      <label style="font-size:15px;margin-left:20px;">Time for the poll(in days) : </label>
                    </div>
                    <div class="input-field col s5 offset-s1">
                      <select id="days">
                        <option value="1" disabled selected>Choose your option(default 1)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="center margin">
        <a class="waves-effect waves-light btn center orange lighten-1" id="form-submit">Create</a>
      </div>
      <div class="row" id="poll-reply">
        <div class="col s2 offset-s3">
          <p>Your Poll URL : </p>
        </div>
        <div class="col s4">
          <input type="text" name="result" id="result" class="validate" value="">
          <a href="#" id="link" target="_blank">Go to Poll</a>
        </div>
      </div>
    </div>
  </div>

  <div id="poll-detail">
    <div class="container row center">
      <h3>3 Simple steps to publish your own free poll!</h3>
      <div class="col s4 center">
        <img src="images/edit.svg" class="sized margin">
        <h4 class="font-high margin">1. Set Question</h4>
        <p class="margin">Type your question and then add answers. From this point you can simply hit create poll and you're ready to go. The rest of the steps are optional. No account or signup required.</p>
      </div>
      <div class="col s4 center">
        <img src="images/paint-palette.svg" class="sized margin">
        <h4 class="font-high margin">2. Select Style</h4>
        <p class="margin">On the Themes tab create your own theme by selecting from the various different colors available.</p>
      </div>
      <div class="col s4 center">
        <img src="images/controls.svg" class="sized margin">
        <h4 class="font-high margin">3. Set Controls</h4>
        <p class="margin"> On the settings tab set options like allowing multiple answers, allowing voters to see the result and much more</p>
      </div>
    </div>
  </div>



  <footer class="page-footer teal darken-4">
    <div class="container">
          <h5 class="white-text center">Happy Polling!</h5>
    </div>
    <div class="footer-copyright center">
      <div class="container">
      Made by <strong>Mohammad Yusuf Ali</strong> & <strong>Adeela Izhar</strong>
      </div>
    </div>
  </footer>

  


    

    <!--Login Dialog Box Starts-->
      <div class="modal" id="myModal1">
          <div class="modal-content">
              <h4 class="modal-title center">Sign In</h4>
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
            <div class="modal-footer">
               <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
          </div>
      </div>

    <!--SignUp Dialog Box Starts-->
    <div class="modal" id="myModal2">
          <div class="modal-content">
              <h4 class="modal-title">Sign Up</h4>
              <p id="useralert1" style="display:none" class="red center">This username is already taken. Please use a different one.</p>
              <form method="post" id="signUpForm">
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                      <label for="name">Name</label>
                      <input type="text" class="validate" name="name" id="name" />
                      <p id="nameerror" class="red center" style="display:none">Enter your name</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                      <label for="email">Email</label>
                      <input type="email" class="validate" name="email" id="email" />
                      <p id="emailerror" class="red center" style="display:none">Enter your email</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                      <label for="username">Username</label>
                      <input type="text" class="validate" name="username" id="username1" />
                      <p id="usernameerror1" class="red center" style="display:none">Enter your username</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                      <label for="password1">Password</label>
                      <input type="password" class="validate" name="password1" id="password1" />
                      <p id="passworderror1" class="red center" style="display:none">Enter your password</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                      <label for="password2">Confirm Password</label>
                      <input type="password" class="validate" name="password2" id="password2" />
                      <p id="passwordmatcherror" class="red center" style="display:none">passwords dont match</p>
                    </div>
                  </div>
                  <div class="center">
                    <input type="submit" class="btn" value="Sign Up" name="submit"/>
                  </div>
              </form>
            <div class="modal-footer">
               <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
          </div>
      </div>

    
   
    

    
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


    <script>

      $(document).ready(function() {
        $('select').material_select();
      });
      $("#poll-reply").hide();
      var optionno=4;
      $("#addopt").click(function(){
        sessionStorage.setItem("title", $('#title').val());
        sessionStorage.setItem("question", $('#question').val());
        if($("#option1").val()!=undefined)
        sessionStorage.setItem("option1", $('#option1').val());
        if($("#option2").val()!=undefined)
        sessionStorage.setItem("option2", $('#option2').val());
        if($("#option3").val()!=undefined)
        sessionStorage.setItem("option3", $('#option3').val());
        if($("#option4").val()!=undefined)
        sessionStorage.setItem("option4", $('#option4').val());
        if($("#option5").val()!=undefined)
        sessionStorage.setItem("option5", $('#option5').val());
        if($("#option6").val()!=undefined && $("#option6").val()!=null)
        sessionStorage.setItem("option6", $('#option6').val());
        if($("#option7").val()!=undefined)
        sessionStorage.setItem("option7", $('#option7').val());
        if($("#option8").val()!=undefined)
        sessionStorage.setItem("option8", $('#option8').val());
        if($("#option9").val()!=undefined)
        sessionStorage.setItem("option9", $('#option9').val());
        if($("#option10").val()!=undefined)
        sessionStorage.setItem("option10", $('#option10').val());


        // alert("Data saved");
        setTimeout(function() {
          // alert("hello");
          var title = sessionStorage.getItem('title');
          if (title !== null) $('#title').val(title);
          var question = sessionStorage.getItem('question');
          if (question !== null) $('#question').val(question);
          var option1 = sessionStorage.getItem('option1');
          if (option1 !== null && option1!=undefined) $('#option1').val(option1);
          var option2 = sessionStorage.getItem('option2');
          if (option2 !== null && option2!=undefined) $('#option2').val(option2);
          var option3 = sessionStorage.getItem('option3');
          if (option3 !== null && option3!=undefined) $('#option3').val(option3);
          var option4 = sessionStorage.getItem('option4');
          if (option4 !== null && option4!=undefined) $('#option4').val(option4);
          var option5 = sessionStorage.getItem('option5');
          if (option5 !== null && option5!=undefined) $('#option5').val(option5);
          var option6 = sessionStorage.getItem('option6');
          if (option6 !== null && option6!=undefined) $('#option6').val(option6);
          var option7 = sessionStorage.getItem('option7');
          if (option7 !== null && option7!=undefined) $('#option7').val(option7);
          var option8 = sessionStorage.getItem('option8');
          if (option8 !== null && option8!=undefined) $('#option8').val(option8);
          var option9 = sessionStorage.getItem('option9');
          if (option9 !== null && option9!=undefined) $('#option9').val(option9);
          var option10 = sessionStorage.getItem('option10');
          if (option10 !== null && option10!=undefined) $('#option10').val(option10);

        }, 100);


        if(optionno<10)
        {
          var s=$("#myform").html();
          // alert(s);
          optionno++;
          s=s+'<div class="input-field col s6"><input type="text" name="option'+optionno+'" class="validate" value="" id="option'+optionno+'"><label for="option'+optionno+'">Option '+optionno+'</label></div>';
          $("#myform").html(s);
          $("#option"+optionno).val("");
          // $("#question-panel").hide();
        }
        else
        {
          Materialize.toast('Maximum option limit reached', 4000); 
        }
      });


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
            url: "login.php",
            data: inp,
            success: function(data){
              // alert(data);
              if(data=="success")
              {
               $("#useralert").hide();
               window.location.reload();
              }
              else if(data=="fail")
              {
                $("#useralert").show();
              }
            }
          });
        }
      });

        $("#signUpForm").submit(function(event){
          event.preventDefault();
          var name=$("#name").val();
          var email=$("#email").val();
          var username=$("#username1").val();
          var password1=$("#password1").val();
          var password2=$("#password2").val();
          var flag1=0,flag2=0,flag3=0,flag4=0;
          if(username=="")
          {
            flag1=1;
            $("#usernameerror1").show();
          }
          else
          {
            flag1=0;
            $("#usernameerror1").hide();
          }
          if(password1!=password2)
          {
            flag2=1;
            $("#passwordmatcherror").show();
            $("#passworderror1").hide();
          }
          else
          {
            $("#passwordmatcherror").hide();
            if(password1=="")
            {
              flag2=1;
              $("#passworderror1").html("Enter your password").show();
            }
            else
            {
              if(password1.length>=8 && password1.length<=32)
              {
                flag2=0;
                // alert("password ok");
                $("#passworderror1").hide();
              }
              else
              {
                flag2=1;
                if(password1.length<8)
                  $("#passworderror1").html("Minimum length of password is 8").show();
                else
                  $("#passworderror1").html("Maximum length of password is 32").show();
              }
            }
          }
          
          if(name=="")
          {
            flag3=1;
            $("#nameerror").show();
          }
          else
          {
            flag3=0;
            $("#nameerror").hide();
          }
          if(email=="")
          {
            flag4=1;
            $("#emailerror").show();
          }
          else
          {
            flag4=0;
            $("#emailerror").hide();
          }
          //alert($("#signUpForm").serialize());
          if(flag1==0 && flag2==0 && flag3==0 && flag4==0)
          {
            //$("#useralert").html("Submitting");
            var inp=$("#signUpForm").serialize();
            //alert(inp);
            $("#useralert1").hide();
            $.ajax({
              type: "POST",
              url: "signup.php",
              data: inp,
              success: function(data){
                alert(data);
                if(data=="success")
                {
                 $("#useralert1").hide();
                 window.location.reload();
                }
                else if(data=="fail")
                {
                  $("#useralert1").show();
                }
              }
            });
          }
        });


      $(document).ready(function(){
        $('.collapsible').collapsible({
          accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
      });
           
      $(".contentContainer").css("min-height",$(window).height());
      $(".button-collapse").sideNav();
      $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        //$('.modal-trigger').leanModal();
        $('.modal-trigger').leanModal({
          dismissible: true, // Modal can be dismissed by clicking outside of the modal
          opacity: .5, // Opacity of modal background
          in_duration: 300, // Transition in duration
          out_duration: 200, // Transition out duration
          //ready: function() { alert('Ready'); }, // Callback for Modal open
          //complete: function() { alert('Closed'); } // Callback for Modal close
          }
        );
        $(document).ready(function(){
        $('.parallax').parallax();
        });
        
        
        $("#form-submit").click(function(event){
        event.preventDefault();
        var numoptions=0,totalopts=0,options="";
        var title=$("#title").val();
        var question=$("#question").val();
        var option1=$("#option1").val();
        var option2=$("#option2").val();
        var flag1=0,flag2=0;
        var multiopt=0,showresult=0,allowcomment=0,time=1;
        var bcolor="white",pcolor="#9e9e9e",tcolor="#a5d6a7";
        if ($('#box1').is(":checked"))
        {
          multiopt=1;
        }
        if ($('#box2').is(":checked"))
        {
          showresult=1;
        }
        // if ($('#box3').is(":checked"))
        // {
        //   allowcomment=1;
        // }
        if($("#days").val()==null)
        {
          time=1;
        }
        else
        {
          time=$("#days").val();
        }
        if($("#background-color").val()!=null){
          bcolor=$("#background-color").val();
        }
        if($("#poll-color").val()!=null){
          pcolor=$("#poll-color").val();
        }
        if($("#title-color").val()!=null){
          tcolor=$("#title-color").val();
        }
        // alert(time);
        while(numoptions<=optionno)
        {
          numoptions++;
          var optval=$("#option"+numoptions).val();
          // alert(optval);
          if(optval!="" && optval!=undefined)
          {
            totalopts++;
            if(totalopts>1)
            {
              options=options+"&"+totalopts+"="+optval;
            }
            else
            {
              options=options+"1="+optval;
            }
          }
        }
        // alert(totalopts);
        // alert(options);
          if(title!="" && question!="" && totalopts>1)
          {
            var theme="backgroundcolor="+bcolor+"&pollcolor="+pcolor+"&titlecolor="+tcolor;
            var formdata="title="+title+"&question="+question+"&"+options+"&numoptions="+totalopts+"&multipleoption="+multiopt+"&showresult="+showresult+"&allowcomment="+allowcomment+"&time="+time;
            var data=formdata+"&"+theme;
            // alert(data);
            //$("#useralert").html("Submitting");
            $("#useralert").hide();
            $.ajax({
              type: "POST",
              url: "add-poll.php",
              data: data,
              success: function(data){
                // alert(data);
                if(data!="")
                {
                  $("#poll-reply").show();
                  $("#result").val("localhost/poll-generator/poll.php?id="+data);
                  $("#link").attr("href", "poll.php?id="+data);
                }
              }
            });
          }
          else
          {
            alert("fill complete form");
          }
        });
      });

    </script>
  </body>
</html>