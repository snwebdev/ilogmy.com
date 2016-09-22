<?php

session_start();

require_once("../../inc/connection.php");


$calories_combination_id = $_POST['calories_combination_id'];
$user_id = $_SESSION['id'];


//$query = "INSERT INTO `calories-portion`(`name`, `portion-description`, `calories`, `user_id`) VALUES ('$name', '$portionDescription', $calories, $user_id)";
$query = "SELECT `item_id`, `name`, `amount`, `calories_combo_content`.`id` comboContentId "
        . "FROM `calories_combo_content` "
        . "INNER JOIN calories_items "
        . "ON `calories_combo_content`.`item_id` = `calories_items` .`id` WHERE `calories_combo_content`.`calories_combination_id` = $calories_combination_id"
;
//echo $query;

$result = mysqli_query($dbConnection, $query);

while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $amount = $row['amount'];
    $comboContentId = $row['comboContentId'];


    $id = $row['id'];
    echo '<li data-combo-content-id="'.$comboContentId.'">'
    . '<a href="#">'
    . '<span class=" remove glyphicon glyphicon-remove" aria-hidden="true"></span></a>'
    . $name . ' x '
    . $amount
    . 'g</li>';
}
echo '<li><a id="add" href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>';
