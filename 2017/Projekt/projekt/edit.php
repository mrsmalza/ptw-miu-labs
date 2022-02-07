<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "maciek");
$query = "SELECT * FROM `product` WHERE `id` = ".$_GET["id"];
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
            Edycja laptopa
        </h1>
        <?php
            while ($row = $result->fetch_assoc()):
        ?>
            <form action="action/updatelaptop.php?id=<?=$row["id"]?>&page=<?=$_GET["page"]?>" method="post">
                <label for="name">
                    <input name="name" placeholder="Nazwa serialu" value="<?=$row["name"]?>" required>
                </label>
                <label for="author">
                    <input name="author" placeholder="Autor" value="<?=$row["author"]?>" required>
                </label>
                <label for="how">
                    <input name="how" type="number" placeholder="Ilość odcinków" value="<?=$row["how"]?>" required>
                </label>
                <label for="description">
                    <input name="description" placeholder="Opis" value="<?=$row["description"]?>" required>
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