<?php
//The user is re-directed to this file after clicking the activation link
//Signup link contains two GET parameters: email and activation key
session_start();
include('connection.php');
?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title of the page -->
        <title>Company Website - Login</title>
        
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
            <a class="navbar-brand" href="#"><img src="company-logo.png" class="logo"></a>
            <!-- <ul class="nav navbar-nav ml-auto">
              <li class="nav-item navbar-right">
                <button class="btn btn-light"><b>SIGN IN</b></button>
              </li>  
            </ul> -->
        </nav>

        <?php
//If email or activation key is missing show an error
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo "<script>$('#activation').html('There was an error. Please click on the activation email you received in your email.');</script>"; exit;
}
//else
    //Store them in two variables
$email = $_GET['email'];
$key = $_GET['key'];
    //Prepare variables for the query
$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);
    //Run query: set activation field to "activated" for the provided email
$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
$result = mysqli_query($link, $sql);
    //If query is successful, show success message and invite user to login
if(mysqli_affected_rows($link) == 1){
    echo '<div style="margin-top: 100px; text-align: center;" class="container alert alert-success">Your account has been activated. Please login to access your account. <br><br> <a style="margin: 0px auto;" id="signupbtn" class="btn btn-warning" href="./loginpage.php">LOGIN</a></div>';
    
}else{
    //Show error message
    echo '<div style="margin-top: 100px; text-align: center;" class="container alert alert-danger">Your account could not be activated. Please try signing up a few moments later. <br><br> <a style="margin: 0px auto;" id="signupbtn" class="btn btn-warning" href="./signuppage.php">SIGN UP</a></div>';

       
}
?>

        <div style="background-color: transparent; height: 400px;"></div>
        

        <!-- Footer -->
        <div style="margin-top: 200px; height: auto; text-align: center;" class="container-fluid">
            <div id="footerself">
                &copy; Copyright. All rights reserved.
            </div>
            <div style='margin-top: 5px;' class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="footerbtn"><img id='selfimage' src='./self-image-circle.png'></img></button></button>
                <button type="button" style="margin-top: 2px;" class="footerbtn"><span class='foottext' style='color: white;'>Developed by<br></span><span class='foottext' style='color: white;'>Subham Das</span></button>
            </div>
            <br>
            <div style='margin-top: 25px; margin-bottom: 15px;' class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="footerbtn" onclick="window.open('https://github.com/das-jishu')"><img class='footimage' id='github' title='Github' src='./GitHub-Mark-Light-120px-plus.png'></img></button>
              <button type="button" class="footerbtn" onclick="window.open('https://www.facebook.com/subham.das.39948')"><img class='footimage' id='facebook' title='Facebook' src='./facebook_logos_PNG19754.png'></img></button>
              <button type="button" class="footerbtn" onclick="window.open('https://www.linkedin.com/in/subham-das-51b5bb171/')"><img class='footimage' id='linkedin' title='Linkedin' src='./linkedIn_PNG37.png'></img></button>
              <button type="button" class="footerbtn" onclick="window.open('https://twitter.com/lord_danton')"><img class='footimage' id='twitter' title='Twitter' src='./twitter_PNG34.png'></img></button>
          </div>
        </div>

        <!-- Scripts -->
        <script>
            document.getElementById('self').onclick=function() {
                window.open('https://github.com/das-jishu', '_blank');
            };
        </script>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="./indexscript.js"></script>
    </body>
</html>