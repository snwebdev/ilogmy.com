<?php

     session_start();

require_once("../../inc/connection.php");
print_r($_POST);

$stones = $_POST['stones'];
$pounds = $_POST['pounds'];
$originalDate = $_POST['originalDateEntry'];
$user_id = $_SESSION['id'];

$weight = $stones * 14 + $pounds;

//check if there is already an entry by user for this date

$query = "UPDATE `weight` SET `pounds` = '$weight' WHERE `user_id`= '$user_id' AND `weight_date`='$originalDate' ;";
echo $query;

$result = mysqli_query($dbConnection, $query);
if ($result === FALSE) {
       echo "didn't worked<br />";
    } else {
       echo "did work<br />";
    }



//if ($result === FALSE) {
//   echo "ERROR";
//} 
//
//else if (mysqli_num_rows($result) > 0) {
//    echo "ERROR_DAY_ALREADY_HAS_RECORD";
//} 
//
//else {
//    $query = "INSERT INTO `weight` (`pounds`, `user_id`, `weight_date`)"
//            . " VALUES ('$weight', '$user_id', '$date');";
//   // echo "<br /> second query=" . $query . "<br />";
//    $result = mysqli_query($dbConnection, $query);
//    if ($result === FALSE) {
//       // echo "didn't worked<br />";
//    } else {
//       // echo "didn't work<br />";
//    }
//}
//
////$result = mysqli_query($dbConnection, $query);
////header('Location: main.php');
////}






    