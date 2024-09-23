<?php
$connection = new mysqli("localhost", "root", "", "cinema");

if ($connection->connect_error) {
    die("Ошибка подключения к БД: " . $connection->connect_error);
}

if (isset($_POST["search"])) {
    $search = $connection->real_escape_string($_POST["search"]);
    $query = "SELECT movies.movieTitle
            FROM movies
              WHERE movies.movieTitle LIKE '%$search%'";
    $result = $connection->query($query);


    if ($result === false) { // проверка на false
        echo "Нет фильмов, соответствующих вашему запросу"; // сообщение об ошибке
    } else {
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='movies.php'>{$row['movieTitle']}</a></li>";
        }
    }
}
$connection->close();
?>
