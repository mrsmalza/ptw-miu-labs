<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");

$query = "DELETE FROM `comments` WHERE `id` = " . $_GET["id"];
$mysqli->query($query);

header("Location: ../article.php?id=" . $_GET["id_product"]);