<?php
//<!--Start session-->
session_start();
include('connection.php'); 

//<!--Check user inputs-->
//    <!--Define error messages-->
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
//    <!--Get username, email, password, password2-->
//Get username
$errors = "";

if(empty($_POST["username"])){
    $errors .= $missingUsername;
    echo "<script>$('#err-username').html('Please enter username.');</script>";
    echo "<script>$('#username').addClass('is-invalid');</script>";
}else{
    echo "<script>$('#err-username').html('');</script>";
    echo "<script>$('#username').removeClass('is-invalid');</script>";
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);   
}
//Get email
if(empty($_POST["email"])){
    $errors .= $missingEmail; 
    echo "<script>$('#err-email').html('Please enter email.');</script>";
    echo "<script>$('#email').addClass('is-invalid');</script>";  
}else{
    echo "<script>$('#err-email').html('');</script>";
    echo "<script>$('#email').removeClass('is-invalid');</script>";
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
        echo "<script>$('#err-email').html('Please enter valid email.');</script>";
        echo "<script>$('#email').addClass('is-invalid');</script>";
    }
    else {
        echo "<script>$('#err-email').html('');</script>";
        echo "<script>$('#email').removeClass('is-invalid');</script>";
    }
}
//Get passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword;
    echo "<script>$('#err-password').html('Please enter password.');</script>";
    echo "<script>$('#password').addClass('is-invalid');</script>";
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword;
    echo "<script>$('#err-password').html('Password should be atleast 6 characters long and include one caps and one number.');</script>";
    echo "<script>$('#password').addClass('is-invalid');</script>";
}else{
    echo "<script>$('#err-password').html('');</script>";
    echo "<script>$('#password').removeClass('is-invalid');</script>";
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
        echo "<script>$('#err-password2').html('Please confirm password.');</script>";
        echo "<script>$('#password2').addClass('is-invalid');</script>";
    }else{
        echo "<script>$('#err-password2').html('');</script>";
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password != $password2){
            $errors .= $differentPassword;
            
            echo "<script>$('#err-password2').html('Passwords do not match.');</script>";
            echo "<script>$('#password2').addClass('is-invalid');</script>";
           
        }
        else { 
            
            echo "<script>$('#err-password2').html('');</script>";
            echo "<script>$('#password2').removeClass('is-invalid');</script>";
        }
    }
}


//If there are any errors print error
if($errors){
    //$resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    //echo $resultMessage;
    exit;
}


//no errors

//Prepare variables for the queries
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
//$password = md5($password);
$password = hash('sha256', $password);
//128 bits -> 32 characters
//256 bits -> 64 characters
//If username exists in the users table print error
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo $password;
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered.</div>';  exit;
}
//If email exists in the users table print error
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;
}


//Create a unique  activation code
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
    //byte: unit of data = 8 bits
    //bit: 0 or 1
    //16 bytes = 16*8 = 128 bits
    //(2*2*2*2)*2*2*2*2*...*2
    //16*16*...*16
    //32 characters

//Insert user details and activation code in the users table

$sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}

//Send the user an email with a link to activate.php with their email and activation code
$message = "Please click on this link to activate your account:\n\n";
$message .= "http://movie-project.epizy.com/activate.php?email=" . urlencode($email) . "&key=$activationKey";
if(mail($email, 'Confirm your Registration', $message, 'From:'.'das.jishu25@gmail.com\r\n')){
       echo "<div class='alert alert-success'>Thank for your registering! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
}


        
?>