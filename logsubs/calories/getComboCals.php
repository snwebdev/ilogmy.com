<?php

session_start();

require_once("../../inc/connection.php");


$calories_combination_id = $_POST['calories_combination_id'];
$user_id = $_SESSION['id'];


$query = "SELECT SUM(ROUND(`amount` * `calories_per_100` /100, 0)) AS cals  "
        . "FROM `calories_combo_content` "
        . "JOIN calories_items "
        . "ON `calories_combo_content`.`item_id` = `calories_items` .`id` "
        . "WHERE `calories_combo_content`.`calories_combination_id` = $calories_combination_id"

        ;
//echo $query;

$result = mysqli_query($dbConnection, $query);
$row = $result->fetch_assoc();
echo $row['cals'];
//while ($row = $result->fetch_assoc()) {
//    $rows[]=$row;
//    $total += $row['items_cals'];
//
//}

//echo $total;
//echo '<li><a id="add" href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>';
//

//print json_encode($rows);