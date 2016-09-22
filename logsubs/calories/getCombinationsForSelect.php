<?php


session_start();

require_once("../../inc/connection.php");


$user_id = $_SESSION['id'];

$query = "SELECT `id`,`name` FROM `calories_combination` WHERE `user_id` = $user_id";


$result = mysqli_query($dbConnection, $query);
echo '<option value="" disabled selected>Select...</option>';
while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $id = $row['id'];
    //echo $name;
    echo '<option value = "'.$id.'">'.$name.'</option>';
}
