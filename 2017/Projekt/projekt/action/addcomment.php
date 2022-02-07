<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");

$query = "INSERT INTO `comments` VALUES (null, '" . $_POST["id"] . "', '" . $_SESSION["id"] . "', '" . $_POST["description"] . "')";

$mysqli->query($query);