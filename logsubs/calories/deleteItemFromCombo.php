<?php
     session_start();

require_once("../../inc/connection.php");

$user_id = $_SESSION['id'];
$combo_id = $_POST['comboId'];
$combo_array = $_POST['comboArray'];



//
// $item_name = $combo_element[itemName];
// $item_id = $combo_element[itemid];
// $quantity = $combo_element[itemQuantity];
//    
  $query = "DELETE FROM `calories_combo_content` WHERE `id` = $combo_id";
   echo $query;
 $result = mysqli_query($dbConnection, $query);

    if ($result === FALSE) {
        echo "didn't worked<br />";
    } else {
        echo "did work<br />";
    }

