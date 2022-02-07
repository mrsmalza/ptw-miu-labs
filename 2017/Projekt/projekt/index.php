<?php
session_start();
if (isset($_SESSION["id"])) {
    $mysqli = new mysqli("localhost", "root", "", "maciek");
    $query = "SELECT * FROM `product` WHERE `id` = 4";
    $mysqli->set_charset("utf8");
    $result = $mysqli->query($query);
}
?>
<!doctype html>
<html>
<head>
    <title>Forum - Laptopy</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<header>
    <?php
    if (!isset($_SESSION["id"])) {
        echo '<a href="login.php">Zaloguj się</a>';
        echo '<a href="registry.php">Zarejestruj się</a>';
    } else {
        echo '<a href="action/logout.php">Wyloguj się</a>';
    }
    ?>
</header>
<?php
if (isset($_SESSION["id"])):
    ?>
    <nav>
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
        <h1>Polecany laptop</h1>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<h2><a href='article.php?id=" . $row["id"] . "'>";
            echo $row["name"] . "</a></h2>";
            echo "<p><a href='article.php?id=" . $row["id"] . "'>";
            echo $row["description"];
            echo "</a></p>";
            echo "</article>";
        }
        ?>
    </section>
    <?php
    else:
    ?>
        <section>
            <h1>
                Strona z laptopami
            </h1>
            <p>
                Zaloguj się aby zobaczyć seriale
            </p>
        </section>
    <?php
endif;
?>
<footer>
    Created by Maciej Goliszewski
</footer>
</body>
</html>