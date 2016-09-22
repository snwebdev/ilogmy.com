<?php

session_start();

require_once("../../inc/connection.php");


$user_id = $_SESSION['id'];
$day = $_POST['date'];
//print_r($_POST['date']);

$query = "SELECT "
        . "`date`, "
        . "`time`,"
        . "`calories_combination`.`name` AS combo_name,"
        . "SUM(ROUND(`calories_per_100` * `amount` / 100)) AS cals "
        . "FROM `calories_intake` "
        . "JOIN calories_combination "
        . "ON `calories_intake`.`combo_id` = `calories_combination` .`id` "
        . "JOIN `calories_combo_content` "
        . "ON `calories_combo_content`.`calories_combination_id` = `calories_combination`.`id`"
        . "JOIN `calories_items`"
        . "ON `calories_combo_content`.`item_Id` = `calories_items`.`id` "
        . "WHERE `calories_intake`.`user_id` = $user_id "
        . "AND `date` = '$day'"
       
       . "GROUP BY intake_time, combo_name"
;

$result = mysqli_query($dbConnection, $query);

while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

print json_encode($rows);
