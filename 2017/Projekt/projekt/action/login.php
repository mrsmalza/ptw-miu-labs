<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");

$query = "SELECT * FROM `user` WHERE `name` = '" . $_POST["name"] . "' AND `password` = '" . $_POST["password"] . "'";

$row = $mysqli->query($query);

if ($row->num_rows == 1) {
    while ($data = $row->fetch_assoc()) {
        $_SESSION["id"] = $data["id"];
        $_SESSION["name"] = $data["name"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["is_admin"] = $data["is_admin"];
    }
    header("Location: ../list.php");
} else {
    header("Location: ../login.php");
}