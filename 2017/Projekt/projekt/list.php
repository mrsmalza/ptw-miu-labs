<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "maciek");
$query = "SELECT * FROM `product` ORDER BY `id` DESC";
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
    <div>
        <a href="action/logout.php">Wyloguj się</a>
    </div>
</header>
<nav>
    <a href="index.php">Strona główna</a>
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
    <h1>Lista laptopów</h1>

    <?php
    if ($result->num_rows == 0) {
        echo "<p>Brak laptopów</p>";
    } else {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<h2><a href='article.php?id=" . $row["id"] . "'>";
            echo $i . ". " . $row["name"];
            if ($_SESSION["id"] == $row["id_user"]):?>
                <a href="edit.php?id=<?= $row["id"] ?>&page=0">
                    <img src="image/pencil.png">
                </a>
                <a href="action/deletearticle.php?id=<?= $row["id"] ?>">
                    <img src="image/delete.png">
                </a>
                <?php
            endif;
            echo "</a></h2>";
            echo "<p><a href='article.php?id=" . $row["id"] . "'>";
            echo $row["description"];
            echo "</a></p>";
            echo "</article>";
            $i++;
        }
    }
    ?>
</section>
<footer>
    Created by Maciej Goliszewski
</footer>
</body>
</html>