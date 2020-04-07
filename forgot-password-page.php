<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title of the page -->
        <title>Flixathon - Forgot Password</title>
        
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
            <!-- <ul class="nav navbar-nav ml-auto">
              <li class="nav-item navbar-right">
                <button class="btn btn-light"><b>SIGN IN</b></button>
              </li>  
            </ul> -->
        </nav>


        <!-- Form -->
        <div class="container3">
            <h2 style="margin-bottom: 50px;">Reset Password</h2>
            <form action="forgot-password.php" method="POST" id="forgotpasswordform">
                <label for="forgot-email">Email</label>
                <br>
                <input id="forgot-email" type="email" name="forgotemail" class="form-control from-control-error" placeholder="Enter email address">
                <p id="err-forgot-email"></p>
                
                <button class="btn" name="forgotpassword" value="forgotpassword" type="submit" id="loginbutton">SEND MAIL</button>
            </form>
            
            <div id="forgotpasswordmessage"></div>
        </div>

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
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="./indexscript.js"></script>
    </body>
</html>