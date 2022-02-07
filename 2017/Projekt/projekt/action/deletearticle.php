<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");

$query = "DELETE FROM `product` WHERE `id` = " . $_GET["id"];
$mysqli->query($query);
$query = "DELETE FROM `comments` WHERE `id_product` = " . $_GET["id"];
$mysqli->query($query);

header("Location: " .  $_SERVER['HTTP_REFERER']);