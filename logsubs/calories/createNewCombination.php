<?php
     session_start();

require_once("../../inc/connection.php");

$combinationName = mysqli_real_escape_string($dbConnection, $_POST['combinationName']);
$user_id = $_SESSION['id'];

$query = "INSERT INTO `calories_combination`(`name`, `user_id`) VALUES ('$combinationName', $user_id)";

echo $query;


$result = mysqli_query($dbConnection, $query);

    if ($result === FALSE) {
        echo "didn't work"
        . "<br />";
    } else {
        echo "did work<br />";
    }





