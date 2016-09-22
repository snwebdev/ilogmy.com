<?php

session_start();

include_once("../inc/connection.php");

$stones = $_POST['editStones'];
$pounds = $_POST['editPounds'];
$date = $_POST['editDate'];
$user_id = $_SESSION['id'];

$weight = $stones * 14 + $pounds;
//echo "in edit";
//print_r($_POST);
 
   // echo "query=". $query;
 

if ($_POST["submit"] === "Delete entry"){
 $query = "DELETE FROM `record` WHERE `user_id` = '$user_id' AND `weight_date` = '$date'";
}

if ($_POST["submit"] === "Change entry"){
 $query = "UPDATE `record` SET `pounds` = '$weight' WHERE `user_id` = '$user_id' AND `weight_date` = '$date'";
}





$result = mysqli_query($dbConnection, $query);

 header('Location: displayTable.php');

//if ($result === TRUE) {
//    echo "New record created successfully";
//     header('Location: main.php');
//} else {
//    echo "Error: " . $result . "<br>" . mysqli_error($conn);
//}
?>