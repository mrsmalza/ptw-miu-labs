<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");

$query = "SELECT DISTINCT  com.`id_product`, com.`id_user`, com.`id`, com.`description`, us.`name` FROM `comments` AS com, `product` as prod, `user` as us WHERE com.`id_user` = us.`id` ORDER BY com.`id` DESC LIMIT 1";

$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
    echo "<h3>" . $row["name"] . "<a href='action/delete.php?id=" . $row["id"] . "&id_product=" . $row["id_product"] ."'><img src='image/delete.png'></a></h3>";
    echo "<p>" . $row["description"] . "</p>";
}