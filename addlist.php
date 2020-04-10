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
$overview = addslashes($_POST['overview']);
if (isset($_POST['event'])) {
    $event = $_POST['event'];
}
else {
    $event = 'none';
}

//echo $_POST['vote'];
//echo '22';


//If movie exists in the table print error
$sql = "SELECT * FROM " . $table . " WHERE `user_id` = '$user_id' AND `movie_id` = '$movie_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That movie is already in your ' . $table . '.</div>';  exit;
}

if (strcmp($table, 'watched') == 0 && strcmp($event, 'none') == 0) {
    $sql = "SELECT * FROM bucketlist WHERE `user_id` = '$user_id' AND `movie_id` = '$movie_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
    }
    $results = mysqli_num_rows($result);
    if($results){
        echo '<div class="alert alert-danger">That movie is already in your bucketlist. Cannot add to watched.</div>';  exit;
    }
}

if (strcmp($table, 'bucketlist') == 0) {
    $sql = "SELECT * FROM watched WHERE `user_id` = '$user_id' AND `movie_id` = '$movie_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
    }
    $results = mysqli_num_rows($result);
    if($results){
        echo '<div class="alert alert-danger">That movie is already in your watched. Cannot add to bucketlist.</div>';  exit;
    }
}



//run a query to insert new movie
$sql = "INSERT INTO " . $table . " (`user_id`, `movie_id`, `title`, `posterpath`, `releaseyear`, `vote`, `overview`) VALUES ('$user_id', '$movie_id', '$title', '$posterpath', '$releaseyear', '$vote', '$overview')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo mysqli_error($link);
    echo '<div class="alert alert-danger">Error running the query while inserting!</div>';
}else{
    echo 'success';   
}

?>