<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");

$query = "UPDATE `product` SET `name` = '" . $_POST["name"] . "', `author` = '" . $_POST["author"] . "', `how` = " . $_POST["how"] . ", `description` = '" . $_POST["description"] . "' WHERE `product`.`id` = " . $_GET["id"];

$mysqli->query($query);

if ($_GET["page"] == 1){
    header("Location: ../managearticle.php");
}else {
    header("Location: ../list.php");
}
