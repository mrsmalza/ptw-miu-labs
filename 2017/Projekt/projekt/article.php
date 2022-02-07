<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");
$query = "SELECT * FROM `product` WHERE `id` = " . $_GET["id"];
$result = $mysqli->query($query);
$query = "SELECT DISTINCT  com.`id_user`, com.`id`, com.`description`, us.`name` FROM `comments` AS com, `product` as prod, `user` as us WHERE com.`id_product` = " . $_GET["id"] . " AND com.`id_user` = us.`id` ORDER BY com.`id` DESC";
$comments = $mysqli->query($query);
$id = null;
?>
<!doctype html>
<html>
<head>
    <title>Forum - Laptopy</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
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
    <?php
    while ($row = $result->fetch_assoc()):
        $id = $row["id_user"];
        ?>
        <h1><?= $row["name"] ?></h1>
        <article>

            <img src="<?= $row["img"]?>">
            <p>
                Laptop firmy: <?= $row["author"] ?>
            </p>
            <p>
                Cena: <?= $row["how"] ?> zł
            </p>
            <p>
                Opis: <?= $row["description"] ?>
            </p>
        </article>
        <?php
    endwhile;
    ?>
    <h2>
        Dodaj komentarz
    </h2>
    <form action="action/addcomment.php" method="post">
        <label>
            <input name="description" placeholder="Komentarz" required>
        </label>
        <label>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        </label>
        <input type="submit" value="Dodaj komentarz">
    </form>
    <h2>Komentarze</h2>
    <article>
        <?php
        if (empty($comments->num_rows) or $comments->num_rows == 0) {
            echo "<p>Brak komentarzy</p>";
        } else {
            while ($row = $comments->fetch_assoc()):
                ?>
                <div>
                    <h3>
                        <?= $row["name"] ?>
                        <?php if ($_SESSION["id"] == $id or $_SESSION["id"] == $row["id_user"]): ?>
                            <a href="action/delete.php?id=<?= $row["id"] ?>&id_product=<?= $_GET["id"] ?>">
                                <img src="image/delete.png">
                            </a>
                            <?php
                        endif;
                        ?>
                    </h3>
                    <p>
                        <?= $row["description"] ?>
                    </p>
                </div>

                <?php
            endwhile;
        }
        ?>
    </article>
</section>
<footer>
    Created by Maciej Goliszewski
</footer>
</body>
</html>