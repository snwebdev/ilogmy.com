<?php


session_start();

require_once("../../inc/connection.php");


$user_id = $_SESSION['id'];
       ;

$query = "SELECT "
        . "date, "
        . "`calories_combination`.`name` AS combo_name, "
        . "`calories_items`.`name`,"
        . "`amount`, "
        . "`intake_time`, "
        . "`item_Id`, "
        . "ROUND(`calories_per_100` * `amount` / 100) "
        . "FROM `calories_intake` "
        . "JOIN calories_combination "
        . "ON `calories_intake`.`combo_id` = `calories_combination` .`id` "
        . "JOIN `calories_combo_content` "
        . "ON `calories_combo_content`.`calories_combination_id` = `calories_combination`.`id`"
        . "JOIN `calories_items`"
        . "ON `calories_combo_content`.`item_Id` = `calories_items`.`id` "
       
        . "WHERE `calories_intake`.`user_id` = $user_id "
       // . "ORDER BY intake_time "
        . "GROUP BY date, intake_time"

        ;

echo $query;
//$result = mysqli_query($dbConnection, $query);
//
//while ($row = $result->fetch_assoc()) {
//    $rows[]=$row;
//}

//foreach ($rows as $r) {
//    $time = strtotime($r['intake_time']);
//
//    //echo "date=".date("l",$time)." ".date('jS F Y', $time)."</br>";
//}



print json_encode($rows);