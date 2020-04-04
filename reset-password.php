<!--This file receives the user_id and key generated to create the new password-->
<!--This file displays a form to input new password-->

<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title of the page -->
        <title>Company Website - Reset Password</title>
        
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

        <div class="container2">
            
                    <h2 id="welcome-user">Reset Password</h1>
                    <div id="resultmessage"></div>
        <?php
        //If user_id or key is missing
        if(!isset($_GET['user_id']) || !isset($_GET['key'])){
            echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>'; exit;
        }
        //else
            //Store them in two variables
        $user_id = $_GET['user_id'];
        $key = $_GET['key'];
        $time = time() - 86400;
            //Prepare variables for the query
        $user_id = mysqli_real_escape_string($link, $user_id);
        $key = mysqli_real_escape_string($link, $key);
            //Run Query: Check combination of user_id & key exists and less than 24h old
        $sql = "SELECT user_id FROM forgotpassword WHERE rkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
        }
        //If combination does not exist
        //show an error message
        $count = mysqli_num_rows($result);
        if($count !== 1){
            echo '<div class="alert alert-danger">Please try again.</div>';
            exit;
        }
        //print reset password form with hidden user_id and key fields
        echo "
        
        <form method=post id='passwordreset'>
        <input type=hidden name=key value=$key>
        <input type=hidden name=user_id value=$user_id>
        <div class='form-group'>
            <label for='password'>Enter new Password</label>
            <input type='password' name='password' id='password' placeholder='Enter Password' class='form-control'>
            <p id='reset-password'></p>
        </div>
        <div class='form-group'>
            <label for='password2'>Confirm Password</label>
            <input type='password' name='password2' id='password2' placeholder='Re-enter Password' class='form-control'>
            <p id='reset-password2'></p>
        </div><br>
        <input type='submit' name='resetpassword' class='btn btn-warning' value='Reset Password'>


        </form>
        
        ";


        ?>
                    
                
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
            <!--Script for Ajax Call to storeresetpassword.php which processes form data-->
            <script>
             //Once the form is submitted
            $("#passwordreset").submit(function(event){ 
                //prevent default php processing
                event.preventDefault();
                //collect user inputs
                var datatopost = $(this).serializeArray();
            //    console.log(datatopost);
                //send them to signup.php using AJAX
                $.ajax({
                    url: "store-reset-password.php",
                    type: "POST",
                    data: datatopost,
                    success: function(data){

                        $('#resultmessage').html(data);
                    },
                    error: function(){
                        $("#resultmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

                    }

                });

            });           
            
            </script>
        </body>
</html>
