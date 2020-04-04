<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//remember me
include('remember.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title of the page -->
        <title>Company Website - Home</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- Linking external stylesheets -->
        <link rel="stylesheet" href="style.css">

        <!-- Linking google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

        <!-- Linking icons -->
        <link rel="icon" href="company-logo.png">
    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="./index.php"><img src="company-logo.png" class="logo"></a>
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item navbar-right">
                <button onclick="window.location.href = './loginpage.php';" class="btn btn-light"><b>SIGN IN</b></button>
              </li>  
            </ul>
                  
        </nav>


        <!-- Main Content -->
        <div class="container" id="mainContainer">
          <div class="jumbotron">
            <div class="container">
                <h1 id="heading">Your movies. Your desires.<br>Your list.</h1>
            </div>

            <div class="contactus">
              <div class="container">
                  <a id="signuptoday" href="./signuppage.php" class="btn btn-light"><b>SIGN UP TODAY</b></a>
              </div>
            </div>

            <div class="icons">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="icon-list.png" class="image">
                            <h2>List</h2>
                            <p>Arrange and categorize your movies into lists.</p>
                        </div>
                        <div class="col-md-4">
                          <img src="icon-analyse.png" class="image">
                          <h2>Analyse</h2>
                          <p>We will perform an analysis based on your lists as soon as you update them.</p>
                      </div>
                      <div class="col-md-4">
                          <img src="icon-share.png" class="image">
                          <h2>Share</h2>
                          <p>Share your lists with everyone.</p>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

          
          <!-- Footer -->
          <div class="container-fluid">
            <div id="footerself">
                &copy; Copyright. All rights reserved.
            </div>
            <div id="footerself2">
                Developed by <span id="self"><b>Subham Das</b></span>
            </div>
          </div>

          <!-- Scripts -->
          <script>
            document.getElementById('self').onclick=function() {
                window.open('https://github.com/das-jishu', '_blank');
            };
          </script>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>