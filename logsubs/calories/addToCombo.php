<?php
     session_start();

require_once("../../inc/connection.php");

$user_id = $_SESSION['id'];
$combo_id = $_POST['comboId'];
$item_id = $_POST[itemId];
$quantity = $_POST['itemQuantity'];
print_r($_POST);


//foreach($combo_array as $combo_element){
// $item_name = $combo_element[itemName];
// $item_id = $combo_element[itemid];
// $quantity = $combo_element[itemQuantity];    
//    
    $query = "INSERT INTO `calories_combo_content`(`user_id`, `calories_combination_id`, `item_id`, `amount`) VALUES ($user_id, $combo_id, $item_id, $quantity)";
   echo $query;
    $result = mysqli_query($dbConnection, $query);

    if ($result === FALSE) {
        echo "didn't worked<br />";
    } else {
        echo "did work<br />";
    }

