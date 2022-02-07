<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");
$query = "SELECT * FROM `user` WHERE `name` = '" . $_POST["name"] . "'";
$row = $mysqli->query($query);
if ($row->num_rows == 0) {
    $query = "INSERT INTO `user` VALUES (null,'" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["password"] . "')";
    if ($mysqli->query($query)) {
        header("Location: ../index.php");
    } else {
        header("Location: ../registry.php");
    }

} else {
    header("Location: ../registry.php");
}