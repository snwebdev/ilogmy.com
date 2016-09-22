<?php

session_start();

require_once("../../inc/connection.php");

$user_id = $_SESSION['id'];


$query = "SELECT `name`, `portion-description`, `calories` from `calories-portion` WHERE user_id=$user_id ORDER BY `name`";
$result = mysqli_query($dbConnection, $query);




while ($row = $result->fetch_assoc()) {

    $name = $row["name"];
    $portionDescription = $row["portion-description"];
    $calories = $row["calories"];

    echo"<li class='list-group-item list-group-item-sub'>";
    echo "<span class='li-name'>";
    echo $name.",";
    echo "</span>";
    echo "<span class='list-group-item-sub li-portion-description'>";
    echo $portionDescription.",";
    echo "</span>";
    echo "<span class='list-group-item-sub calories'>";
    echo $calories." Cal.";
    echo "</span>";
    echo"</li>";
}
?>