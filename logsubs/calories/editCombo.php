<?php
     session_start();

require_once("../../inc/connection.php");

$user_id = $_SESSION['id'];
$combo_id = $_POST['comboId'];
$combo_array = $_POST['comboArray'];
print_r($combo_array);



 $item_name = $combo_element[itemName];
 $item_id = $combo_element[itemid];
 $quantity = $combo_element[itemQuantity];
    
    $query = "INSERT INTO `calories_combo_content`(`user_id`, `calories_combination_id`, `item_id`, `amount`) VALUES ($user_id, $combo_id, $item_id, $quantity)";

    $result = mysqli_query($dbConnection, $query);

    if ($result === FALSE) {
        echo "didn't worked<br />";
    } else {
        echo "did work<br />";
    }



//$combinationName = $_POST['combinationName'];
//$user_id = $_SESSION['id'];
//
//$query = "INSERT INTO `calories-combination`(`name`, `user_id`) VALUES ('$combinationName', $user_id)";
//







