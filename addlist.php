<?php
session_start();
include('connection.php');

//get user_id
$user_id = $_SESSION['user_id'];
//echo $_SESSION['user_id'];
//get the current time
$table = $_POST['table'];
$movie_id = $_POST['movie_id'];
//echo $_POST['movie_id'];
$title = addslashes($_POST['title']);
//echo $_POST['title'];
$releaseyear = $_POST['releaseyear'];
//echo $_POST['releaseyear'];
$vote = $_POST['vote'];
$posterpath = $_POST['posterpath'];
//echo $_POST['vote'];
//echo '22';


//If email exists in the users table print error
$sql = "SELECT * FROM " . $table . " WHERE `user_id` = '$user_id' AND `movie_id` = '$movie_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That movie is already in your ' . $table . '.</div>';  exit;
}



//run a query to create new note
$sql = "INSERT INTO " . $table . " (`user_id`, `movie_id`, `title`, `posterpath`, `releaseyear`, `vote`) VALUES ('$user_id', '$movie_id', '$title', '$posterpath', '$releaseyear', '$vote')";
//echo '23';
$result = mysqli_query($link, $sql);
if(!$result){
    //echo '24';
    echo mysqli_error($link);
    echo 'error';
}else{
    //mysqli_insert_id returns the auto generated id used in the last query
    //echo '25';
    echo 'success';   
}

?>