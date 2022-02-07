<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "maciek");
$mysqli->set_charset("utf8");
$query = "SELECT * FROM `user` WHERE `id` != " . $_SESSION["id"];
$data = $mysqli->query($query);
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
    <a href="managearticle.php">Zarządzaj artykułami</a>

</nav>
<section>

        <h1>
            Użytkownicy
        </h1>
        <?php
        while($row = $data->fetch_assoc()){
            echo "<article>";
            echo "<div>";

            ?>

            <a href="edituser.php?id=<?= $row["id"] ?>">
                <img src="image/pencil.png">
            </a>
            <a href="action/deleteuser.php?id=<?= $row["id"] ?>">
                <img src="image/delete.png">
            </a>

            <?php
            echo "<p> ID:";
            echo $row["id"];
            echo  "</p>";
            echo "<p> Nazwa:";
            echo $row["name"];
            echo  "</p>";
            echo "<p> Email: ";
            echo $row["email"];
            echo  "</p>";
            echo "<p> Hasło:";
            echo $row["password"];
            echo  "</p>";
            echo "<p> Czy jest adminem: ";
            echo $row["is_admin"];
            echo  "</p>";
            echo  "</div>";
            echo "</article>";
        }
        ?>

</section>
<footer>
    Created by Maciej Goliszewski
</footer>
</body>
</html>