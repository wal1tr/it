<?php
// Подключение к базе данных cinema.sql
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);
// Проверка соединения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$limit = 2;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = 1;
  }

$offset = ($page - 1) * $limit;
// Выборка всех отзывов из таблицы reviews
$sql = "SELECT  * FROM posts , users 
WHERE posts.userId = users.userID
LIMIT $offset, $limit";
$result = $conn->query($sql);

$reviews = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $reviews[] = $row;
  }
} else {
  // Возвращаем специальное значение, когда отзывы закончились
  echo "NO_REVIEWS";
  exit();
}

$conn->close();

echo json_encode($reviews);
?>