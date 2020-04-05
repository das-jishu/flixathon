<?php
session_start();
include('connection.php');

//get the id of the note through Ajax
$movie_id = $_POST['movie_id'];
$table = $_POST['table'];
$user_id = $_SESSION['user_id'];
// run a query to delete the note
$sql = "DELETE FROM " . $table . " WHERE movie_id = '$movie_id' AND user_id = '$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}
else {
    echo 'success';
}

?>