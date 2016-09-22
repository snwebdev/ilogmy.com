<?php
     session_start();

require_once("../../inc/connection.php");

$name = $_POST['name'];
$calories = $_POST['calories'];
$user_id = $_SESSION['id'];


//$query = "INSERT INTO `calories-portion`(`name`, `portion-description`, `calories`, `user_id`) VALUES ('$name', '$portionDescription', $calories, $user_id)";
$query = "SELECT `id`,`name`, `calories_per_100` FROM `calories_items` WHERE `user_id` = $user_id";
//echo $query;

$result = mysqli_query($dbConnection, $query);
echo " <option selected disabled>Select item</option>";
while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $id = $row['id'];
    //echo $name;
    echo '<option value = "'.$id.'">'.$name.'</option>';
}
//
//    if ($result === FALSE) {
//        echo "didn't worked<br />";
//    } else {
//        echo "did work<br />";
//    }
