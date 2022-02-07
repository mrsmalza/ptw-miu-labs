<?php
session_start();

$mysqli = new mysqli("localhost","root","","maciek");

$query = "DELETE FROM `user` WHERE `id` = '" . $_GET["id"] . "'";

if ($mysqli->query($query)) {
    header("Location: ../list.php");
} else {
    header("Location: ../manageuser.php");
}