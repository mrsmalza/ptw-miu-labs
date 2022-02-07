<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "maciek");
$query = "SELECT * FROM `user` WHERE `id` = ".$_GET["id"];
$mysqli->set_charset("utf8");
$result = $mysqli->query($query);

?>
<!doctype html>
<html>
<head>
    <title>Forum - Laptopy</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<header>
    <a href="action/logout.php">Wyloguj się</a>
</header>
<nav>
    <a href="index.php">Strona główna</a>
    <a href="list.php">Lista laptopów</a>
    <a href="add.php">Dodaj laptop</a>
    <a href="managearticle.php">Zarządzaj artykułami</a>

</nav>
<section>
    <h1>
        Edycja użytkownika
    </h1>
    <?php
    while ($row = $result->fetch_assoc()):
        ?>
        <form action="action/updateuser.php?id=<?=$row["id"]?>" method="post">
            <label for="name">
                <input name="name" placeholder="Nazwa użytkownika" value="<?=$row["name"]?>" required>
            </label>
            <label for="password">
                <input name="password" placeholder="Hasło" type="password" value="<?=$row["password"]?>" required>
            </label>
            <label for="email">
                <input name="email" type="email" placeholder="E-mail" value="<?=$row["email"]?>" required>
            </label>
            <label for="is_admin">
                <input name="is_admin" placeholder="Jest adminem" value="<?=$row["is_admin"]?>" required>
            </label>
            <input type="submit">
        </form>
        <?php
    endwhile;
    ?>
</section>
<footer>
    Created by Maciej Goliszewski
</footer>
</body>
</html>