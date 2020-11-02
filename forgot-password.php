<?php
//Start session
session_start();
//Connect to the database
include('connection.php');

//Check user inputs
    //Define error messages
    $errors = '';
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
    //Get email
    //Store errors in errors variable
if(empty($_POST["forgotemail"])){
    $errors .= $missingEmail;
    echo "<script>$('#err-forgot-email').html('Please enter email.');</script>";
    echo "<script>$('#forgot-email').addClass('is-invalid');</script>";      
}else{
    echo "<script>$('#err-forgot-email').html('');</script>";
    echo "<script>$('#forgot-email').removeClass('is-invalid');</script>";   
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
        echo "<script>$('#err-forgot-email').html('Please enter valid email.');</script>";
        echo "<script>$('#forgot-email').addClass('is-invalid');</script>";   
    }
    echo "<script>$('#err-forgot-email').html('');</script>";
    echo "<script>$('#forgot-email').removeClass('is-invalid');</script>";
}
    
    //If there are any errors
        //print error message
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    //echo $resultMessage;
    exit;
}
    //else: No errors
        //Prepare variables for the query
$email = mysqli_real_escape_string($link, $email);
        //Run query to check if the email exists in the users table
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$count = mysqli_num_rows($result);
//If the email does not exist
            //print error message
if($count != 1){
    echo '<div class="alert alert-danger">That email does not exist on our database!</div>';  exit;
}
        
        //else
            //get the user_id
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['u_id'];
            //Create a unique  activation code
$key = bin2hex(openssl_random_pseudo_bytes(16));
            //Insert user details and activation code in the forgotpassword table
$time = time();
$status = 'pending';
$sql = "INSERT INTO forgotpassword (`user_id`, `rkey`, `time`, `status`) VALUES ('$user_id', '$key', '$time', '$status')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}

            //Send email with link to resetpassword.php with user id and activation code

//$message = "Please click on this link to reset your password:\n\n";
$message = "http://movie-project.epizy.com/reset-password.php?user_id=$user_id&key=$key";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '**********@gmail.com';$mail->Password = '***********';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    //Recipients
    $mail->setFrom('no-reply@flixathon.ml', 'Flixathon');
    $mail->addAddress($email, 'New User');
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body = '<div>Please click on the link below to reset your password: <br><br><a href="'.$message.'"><button style="color: white; background-color: black; height: 35px; font-size: 15px;border-radius: 5px;">Reset your password</button></a></div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<div class='alert alert-success'>An email has been sent to $email. Please click on the link to reset your password.</div>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



    ?>
