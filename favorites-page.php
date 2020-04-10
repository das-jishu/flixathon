<?php
session_start();
include('connection.php');
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
        <title>Flixathon - Favorites</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>

        
        <!-- Linking external stylesheets -->
        <link rel="stylesheet" href="style.css">

        <!-- Linking google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

        <!-- Linking icons -->
        <link rel="icon" href="company-logo.png">

        <script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>
    </head>
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#"><img src="company-logo.png" class="logo"></a>
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

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

        <div style="margin-top: 100px;" class="container">
            <h1 class="welcome-user" style="text-align: center; color: black;">
            <span style="background-color: Gold; padding: 5px; border-radius: 10px;">FAVORITES</span></h1>
            
        </div>

        <div style="margin-top: 50px; text-align: center;" id="mainpagecontainer" class="container">

        <div style="margin-bottom: 50px; text-align: center;">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" style='border: 1px solid white;' class="btn lists" onclick="window.open('./mainpageloggedin.php', '_self')"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; &nbsp;BACK</button>
                    <button type="button" style="border: 1px solid white; margin-left: 10px;" class="btn lists" onclick="window.open('./watched-page.php', '_self')">WATCHED</button>
                    <button type="button" style="border: 1px solid white; margin-left: 10px;" class="btn lists" onclick="window.open('./bucketlist-page.php', '_self')">BUCKET</button>
                </div>
        </div>

        <!-- The social media icon bar -->
        <div class="icon-bar">
        <a href="#" class="twitter-bar"><i class="fa fa-twitter"></i></a>
        <a href="#" class="whatsapp-bar"><i class="fa fa-whatsapp"></i></a>
        <a href="#" class="mail-bar"><i class="fa fa-envelope-o"></i></a>
        <a href="#" class="sms-bar"><i class="fa fa-commenting-o"></i></a>
        </div>

        <div style='min-height: 600px; margin-bottom: 100px;'> <div id='show'></div>
        
        </div>

        
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
           
            var mybutton = document.getElementById("myBtn");
            //console.log('Active');
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction();
                
            };

            function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
                
            } else {
                mybutton.style.display = "none";
                
            }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }


//load the favorites list by a ajax call
$.ajax({  
    type: 'POST',  
    url: './loadlist.php',
    data: { table: 'favorites' }, 
    success: function(response) {
            $("#show").html(response);

            $('#show .elementfav').click(function() {
                $(this).find('div.extras').toggleClass('showextra');


                var movie_id = $(this).find('table tr td:eq(0)').text();

                $(this).find('.delete').click(function() {
                    
                    $.ajax({  
                        type: 'POST',  
                        url: './deletelist.php', 
                        data: { table: 'favorites', movie_id: movie_id },
                        success: function(response) {
                            
                            if(response == 'success')
                            {
                                location.reload(true);
                            }
                            else
                            {
                                $("#show").html(response);
                                //console.log(data);
                            }
                        },
                        error: function() {
                            $("#show").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                        }
                    });
                });
            });

            //create the list to be shared
            var shareList = 'Hey! Check my favorites list: \n\n';
            var i = 1;
            $('.elementfav').each(function() {
                var temp = $(this).find('table tr td:eq(2)').text();
                var check = temp.substring(0, temp.indexOf('-') - 1);
                if(check !== 'NIL')
                {
                    shareList += (i++) + '.  ' + check + '.\n';
                }
            });
            shareList += '\nVisit Flixathon to create your own lists: \nhttp://movie-project.epizy.com/index.php?i=1';

            //console.log(shareList);

            var encodedtext = encodeURIComponent(shareList);
            var urlTwitter = 'https://twitter.com/intent/tweet?text=' + encodedtext;
            var urlMail = "mailto:?body=" + encodedtext;
            var urlWhatsapp = 'https://wa.me/?text='+encodedtext;
            var urlSMS = 'sms:?body=' + encodedtext;

            if(i !== 1)
            {
                $('.twitter-bar').click(function() {
                window.open(urlTwitter, '_blank');
                });

                $('.mail-bar').click(function() {
                    window.open(urlMail, '_blank');
                });

                $('.whatsapp-bar').click(function() {
                    window.open(urlWhatsapp, '_blank');
                });

                $('.sms-bar').click(function() {
                    window.open(urlSMS, '_blank');
                });
            }
            
            

    },
    error: function() {
        $("#show").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
    }
});

            

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