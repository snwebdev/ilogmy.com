<?php

session_start();
print_r($_POST);

include_once("../../inc/connection.php");
$weight_date = $_POST['weightDate'];

$user_id = $_SESSION['id'];

$query = "DELETE FROM `weight` WHERE `user_id` = '$user_id' AND `weight_date` = '$weight_date'";

echo $query;

$result = mysqli_query($dbConnection, $query);


if ($result === TRUE) {
    echo "Record deleted successfully";

} else {
    echo "Error: " . $result . mysqli_error($conn);
}
?>