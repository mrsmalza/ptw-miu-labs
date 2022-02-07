<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");

$query = "UPDATE `user` SET `is_admin` = '" . $_POST["is_admin"] . "', `name` = '" . $_POST["name"] . "', `email` = '" . $_POST["email"] . "', `password` = '" . $_POST["password"] . "' WHERE `user`.`id` = " . $_GET["id"];

$mysqli->query($query);

header("Location: ../list.php");