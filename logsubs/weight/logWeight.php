<?php

     session_start();

//$test="log weight";
require_once("../../inc/connection.php");

//echo "test=" . $test . "<br />";

$stones = $_POST['stones'];
$pounds = $_POST['pounds'];
$date = $_POST['date'];
$user_id = $_SESSION['id'];

$weight = $stones * 14 + $pounds;

//check if there is already an entry by user for this date

$query = "SELECT * FROM `weight` where `user_id` = '$user_id' AND `weight_date` = '$date';";
//echo "first query=" . $query;

$result = mysqli_query($dbConnection, $query);



if ($result === FALSE) {
   echo "ERROR";
} 

else if (mysqli_num_rows($result) > 0) {
    echo "ERROR_DAY_ALREADY_HAS_RECORD";
} 

else {
    $query = "INSERT INTO `weight` (`pounds`, `user_id`, `weight_date`)"
            . " VALUES ('$weight', '$user_id', '$date');";
   // echo "<br /> second query=" . $query . "<br />";
    $result = mysqli_query($dbConnection, $query);
    if ($result === FALSE) {
       // echo "didn't worked<br />";
    } else {
       // echo "didn't work<br />";
    }
}

//$result = mysqli_query($dbConnection, $query);
//header('Location: main.php');
//}






    