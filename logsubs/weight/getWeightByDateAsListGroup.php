<?php

session_start();

require_once("../../inc/connection.php");

$user_id = $_SESSION['id'];


$query = "SELECT `pounds`, `weight_date` from `weight` WHERE user_id='$user_id' ORDER BY `weight_date`";
$result = mysqli_query($dbConnection, $query);




while ($row = $result->fetch_assoc()) {

    $weight = $row["pounds"];
    $stone = floor($weight / 14);
    $pounds = $weight % 14;

    $date = date("d-m-Y", strtotime($row["weight_date"]));
    echo"<li class='list-group-item'>";
    echo "<span class='li-date'>";
    echo $date;
    echo "</span>";
    echo "<span class='li-stones'>";
    echo $stone;
    echo "</span>";
    echo "<span class='abreviation-stone'>st.</span>";
    echo "<span class='li-pounds'>";
    echo $pounds;
    echo "</span>";
    echo "<span class='abreviation-pounds'>lb.</span>";
    echo"</li>";
}
?>