<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");
?>
<!doctype html>
<html>
<head>
    <title>Forum - Laptopy</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<header>
    <div>
        <a href="action/logout.php">Wyloguj się</a>
    </div>
</header>
<nav>
    <a href="index.php">Strona główna</a>
    <a href="list.php">Lista laptopów</a>
    <?php
        if ($_SESSION["is_admin"]){
            ?>
            <a href="manageuser.php">Zarządzaj użytkownikami</a>
            <a href="managearticle.php">Zarządzaj artykułami</a>
            <?php
        }
    ?>
</nav>
<section>
    <h1>
        Dodaj laptop
    </h1>
    <form action="action/add.php" method="post">
        <label for="name">
            <input name="name" placeholder="Nazwa laptopa" required>
        </label>
        <label for="author">
            <input name="author" placeholder="Twórca" required>
        </label>
        <label for="how">
            <input name="how" type="number" placeholder="Cena laptopa" required>
        </label>
        <label for="description">
            <input name="description" placeholder="Opis" required>
        </label>
        <label for="image">
            <input name="image" placeholder="Adres url obrazka" required>
        </label>
        <input type="submit">
    </form>
</section>
<footer>
    Created by Maciej Goliszewski
</footer>
</body>
</html>