<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");
$query = "SELECT * FROM `product` WHERE `name` = '" . $_POST["name"] . "'";
$row = $mysqli->query($query);
if ($row->num_rows == 0) {
    $query = "INSERT INTO `product` VALUES (null,'" . $_POST["name"] . "','" . $_POST["author"] . "','" . $_POST["description"] . "','" . $_POST["how"] . "','" . $_SESSION["id"] . "','" . $_POST["image"] . "')";

    if ($mysqli->query($query)) {
        header("Location: ../list.php");
    } else {
        header("Location: ../add.php");
    }

} else {
    header("Location: ../add.php");
}