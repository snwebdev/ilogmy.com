<?php
     session_start();

require_once("../../inc/connection.php");

$name = mysqli_real_escape_string($dbConnection, $_POST['name']);
$calories = $_POST['calories-per-100g/100ml'];
$user_id = $_SESSION['id'];

$query = "INSERT INTO `calories_items`(`name`,`calories_per_100`, `user_id`) VALUES ('$name', $calories, $user_id)";

echo $query;

$result = mysqli_query($dbConnection, $query);

    if ($result === FALSE) {
        echo "didn't work<br />";
    } else {
        echo "did work<br />";
    }








    