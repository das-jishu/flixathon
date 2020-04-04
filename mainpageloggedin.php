<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title of the page -->
        <title>Company Website - Main</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>

        
        <!-- Linking external stylesheets -->
        <link rel="stylesheet" href="style.css">

        <!-- Linking google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

        <!-- Linking icons -->
        <link rel="icon" href="company-logo.png">
    </head>
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#"><img src="company-logo.png" class="logo"></a>
            <!-- <ul class="nav navbar-nav ml-auto">
              <li class="nav-item navbar-right">
                <button class="btn btn-light"><b>SIGN IN</b></button>
              </li>  
            </ul> -->
            <ul class="nav navbar-nav ml-auto">
                <!-- <li class="nav-item navbar-right"><button class="btn-info"></button></li> -->
                <li class="nav-item dropdown navbar-left">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="./mainpageloggedin.php">Dashboard</a>
                    <a class="dropdown-item" href="./profile-page.php">Edit Profile</a>
                    </div>
                </li>
                <li class="nav-item navbar-right"><a class="btn btn-logout" href="./index.php?logout=1">LOGOUT</a></li>
            </ul>
        </nav>

        <div style="margin-top: 100px;" class="container">
            <h1 class="welcome-user" style="text-align: center; color: white;">
            <span style="background-color: red; padding: 5px; border-radius: 10px;"><?php echo $_SESSION['username']?></span></h1>
            
        </div>

        

        <div style="margin-top: 50px; text-align: center;" id="mainpagecontainer" class="container">
            <div style="margin-bottom: 50px; text-align: center;">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn lists" onclick="window.open('./favorites-page.php', '_self')">FAVORITES</button>
                    <button type="button" style="border-left: 2px solid white;" class="btn lists">WATCHED</button>
                    <button type="button" style="border-left: 2px solid white;" class="btn lists">BUCKET LIST</button>
                </div>
            </div>
        
            <!-- <form method="POST" action="searchMovie.php" id="searchform"> -->
                <div style="margin-bottom: 30px;" class="input-group">
                <span style="background-color: #dedede; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </span>
                <input type="text" id="searchquery" class="form-control" name="search" placeholder="Search for movies">
                <span style="background-color: #dedede; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" class="input-group-btn">
                    <button id="search" class="btn btn-default">Search</button>
                </span>
                </div>
            <!-- </form> -->

            <div id='show'></div>

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
            document.getElementById('self').onclick = function() {
                window.open('https://github.com/das-jishu', '_blank');
            };
        </script>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="./indexscript.js"></script>
        <script src="./search.js"></script>
    </body>
</html>