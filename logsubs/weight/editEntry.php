<?php

session_start();

include_once("../inc/connection.php");

$stones = $_POST['stones'];
$pounds = $_POST['pounds'];
$date = $_POST['date'];
$user_id = $_SESSION['id'];

$weight = $stones * 14 + $pounds;


$query = "Delete FROM `record` WHERE  `user_id` = '$user_id' AND `weight_date` = '$date')";
      


$result = mysqli_query($dbConnection, $query);

if ($result === TRUE) {
    echo "New record created successfully";
     header('Location: main.php');
} else {
    echo "Error: " . $result . "<br>" . mysqli_error($conn);
}
?>