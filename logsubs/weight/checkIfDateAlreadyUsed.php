<?php

session_start();

include_once("../inc/connection.php");



$date = $_POST['date'];
$user_id = $_SESSION['id'];

$alreadyUsed = "";



$query = "SELECT * FROM `record` where `user_id` = '$user_id' AND `weight_date` = '$date'";

//echo $query;
$result = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($result) > 0) {
   // date already used by this user
    $alreadyUsed = "yes";
} else {
   $alreadyUsed = "no";
}

echo $alreadyUsed;





?>