<?php

session_start();

require_once("../../inc/connection.php");

$user_id = $_SESSION['id'];

$query = "SELECT `pounds`, `weight_date` from `weight` WHERE user_id='$user_id' ORDER BY `weight_date`";
$result = mysqli_query($dbConnection, $query);

$all = array();
$line = array();

while ($row = $result->fetch_assoc()) {
    $line['x'] = $row['weight_date'];
    $line['y'] = (int) $row['pounds'];
    array_push($all, $line);
}

echo json_encode($all);
?>