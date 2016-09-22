<?php
     session_start();

require_once("../../inc/connection.php");


$date = $_POST['date'];
$time = $_POST['time'];
$date_time = $date." ".$time;

$combo_id = $_POST['selectCombo'];
$user_id = $_SESSION['id'];

$query = "INSERT INTO `calories_intake`(`user_id`,`combo_id`, `intake_time`, `date`, `time`) VALUES ($user_id, $combo_id, '$date_time', '$date', '$time')";


$result = mysqli_query($dbConnection, $query);

    if ($result === FALSE) {
        echo "didn't work<br />";
    } else {
        echo "did work<br />";
    }








    