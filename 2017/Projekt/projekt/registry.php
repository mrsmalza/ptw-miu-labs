<?php
session_start();
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
<nav>
    <a href="index.php">Strona główna</a>
</nav>
<section>
    <form action="action/registry.php" method="post">
        <h1>
            Rejestracja
        </h1>
        <label for="name">
            <input name="name" placeholder="Login" required>
        </label>
        <label for="password">
            <input name="password" type="password" placeholder="Hasło" required>
        </label>
        <label for="email">
            <input name="email" type="email" placeholder="Podaj swój e-mail" required>
        </label>
        <input type="submit">
    </form>
</section>
<footer>
    Created by Maciej Goliszewski
</footer>
</body>
</html>