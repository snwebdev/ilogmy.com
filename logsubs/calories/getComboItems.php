<?php
     session_start();

require_once("../../inc/connection.php");


$calories_combination_id = $_POST['calories_combination_id'];
$user_id = $_SESSION['id'];


//$query = "INSERT INTO `calories-portion`(`name`, `portion-description`, `calories`, `user_id`) VALUES ('$name', '$portionDescription', $calories, $user_id)";
$query = "SELECT `item_id`, `name`, `amount` "
        . "FROM `calories_combo_content` "
        . "INNER JOIN calories_items "
        . "ON calories_combo_content.item_id = calories_items .id WHERE calories_combo_content.calories_combination_id = $calories_combination_id"
       ;
//echo $query;

$result = mysqli_query($dbConnection, $query);

while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $amount = $row['amount'];
   // $id = $row['id'];
    echo '<li>'. $name.' x '. $amount.'g</li>';
    //echo '<option value = "'.$id.'">'.$name.'</option>';
}


