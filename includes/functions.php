<?php
function checkLogin()
{
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
}

function checkAdmin()
{
    if (!isset($_SESSION["loggedin"]) || $_SESSION["userGroup"] !== 1) {
        header("location: index.php");
        exit;
    }
}

function checkUserGroup()
{
    if ($_SESSION['userGroup'] === 0) {  ?>
      <p class='stat-val' style="color: #cd7f32;">Бронза</p>
      <p class='stat-key'>Участник</p>
    <?php
    } elseif ($_SESSION['userGroup'] === 1) {  ?>
      <p class='stat-val' style="color: #af0f0f;">Работник</p>
      <p class='stat-key'>Администратор</p>
    <?php
    } elseif ($_SESSION['userGroup'] === 2) { ?>
      <p class='stat-val' style="color: silver;">Серебро</p>
      <p class='stat-key'>Участник</p>
    <?php
    } elseif ($_SESSION['userGroup'] === 3) {  ?>
      <p class='stat-val' style="color: gold;">Золото</p>
      <p class='stat-key'>Участник</p>
    <?php }
}

function getMovies($conn)
{
    $query = "SELECT * FROM movies ORDER BY movieTitle ASC";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    return $result;
}

function getRecMovie($conn, $catid)
{
  $query = "SELECT movies.movieTitle FROM movies INNER JOIN connections ON movies.movieID = connections.conMovieID INNER JOIN categories ON connections.conCatID = categories.catID WHERE conCatID = $catid ORDER BY movieTitle DESC";

  $result = mysqli_query($conn, $query) or die("Query failed: $query");

  $rec = '';
  while ($row = $result->fetch_assoc()) {
    $rec .= "<u>{$row["movieTitle"]}</u> • ";
  }

  return $rec;
}

function getCategories($conn, $movieid)
{
    $query = "SELECT categories.catName FROM categories INNER JOIN connections ON categories.catID = connections.conCatID INNER JOIN movies ON connections.conMovieID = movies.movieID WHERE conMovieID = $movieid ORDER BY catName ASC";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    return $result;
}

function getPostUser($conn)
{
    $query = "SELECT * FROM users INNER JOIN posts ON users.userID = posts.userID ORDER BY postID DESC";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    return $result;
}

function getPostInfo($conn, $customerId)
{
    $query = "SELECT * FROM posts INNER JOIN users ON users.userID = posts.userID WHERE postID=".$customerId; ;

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function savePost($conn)
{
    $date = date("Y-m-d H:i");
    $title = escapeInsert($conn, $_POST['postTitle']);
    $comment = escapeInsert($conn, $_POST['postComment']);
    $image = escapeInsert($conn, $_POST['postImg']);
    $userid = $_SESSION["id"];

    $query = "INSERT INTO posts
			(postComment, postDate, postTitle, postImg, userID)
			VALUES('$comment','$date', '$title', '$image', '$userid')";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

function updatePost($conn)
{
    $title = escapeInsert($conn, $_POST['postTitle']);
    $comment = escapeInsert($conn, $_POST['postComment']);
    $image = escapeInsert($conn, $_POST['postImg']);
    $editid = $_POST['updateid'];

    $query = "UPDATE posts
			SET postTitle='$title', postComment='$comment', postImg='$image'
			WHERE postID=". $editid;

    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}

function deletePost($conn, $customerId)
{
    $query = "DELETE FROM posts WHERE postID=". $customerId;

    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}

function escapeInsert($conn, $insert)
{
    $insert = htmlspecialchars($insert);

    $insert = mysqli_real_escape_string($conn, $insert);

    return $insert;
}

function changeImg($connection)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(trim($_POST["image"]))) {
            $info_err = "Please enter your about information.";
            return $info_err;
        } else {
            $image = trim($_POST["image"]);
        }
        if (empty($info_err)) {
            $sql = "UPDATE users SET userImg = ? WHERE userID = ?";
            if ($stmt = mysqli_prepare($connection, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $image, $param_id);
                $param_id = $_SESSION["id"];
                if (mysqli_stmt_execute($stmt)) {
                    session_destroy();
                    header("location: profile.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
}

function register($connection)
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty(trim($_POST["username"]))) {
        echo showError2("Пожалуйста введите имя пользователя");
        $username_err = "Пожалуйста, введите имя пользователя.";
      } else {
          $sql = "SELECT userId FROM users WHERE userName = ?";
          if ($stmt = mysqli_prepare($connection, $sql)) {
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              $param_username = trim($_POST["username"]);
              if (mysqli_stmt_execute($stmt)) {
                  mysqli_stmt_store_result($stmt);
                  if (mysqli_stmt_num_rows($stmt) == 1) {
                    echo showError2("Пользователь с таким именем уже существует");
                    $username_err = "Это имя пользователя уже занято.";
                  } else {
                      $username = trim($_POST["username"]);
                  }
              } else {
                echo showError2("Непредвиденная ошибка");
                echo "Что то пошло не так.Повторите попытку позже.";
              }
          }
          mysqli_stmt_close($stmt);
      }
      if (empty(trim($_POST["password"]))) {
        echo showError2("Пожалуйста, введите пароль");
        $password_err = "Пожалуйста, введите пароль.";
      } elseif (strlen(trim($_POST["password"])) < 6) {
        echo showError2("Пароль должен состоять минимум из 6 символов");
        $password_err = "Пароль должен содержать как минимум 6 символов.";
      } else {
          $password = trim($_POST["password"]);
      }
      if (empty(trim($_POST["confirm_password"]))) {
        echo showError2("Пожалуйста, подтвердите пароль");
        $confirm_password_err = "Пожалуйста, подтвердите пароль.";
      } else {
          $confirm_password = trim($_POST["confirm_password"]);
          if (empty($password_err) && ($password != $confirm_password)) {
            echo showError2("Пароли не совпадают");
            $confirm_password_err = "Пароли не сходятся.";
          }
      }
      if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
          $sql = "INSERT INTO users (userName, userPassword) VALUES (?, ?)";
          if ($stmt = mysqli_prepare($connection, $sql)) {
              mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
              $param_username = $username;
              $param_password = password_hash($password, PASSWORD_DEFAULT);
              if (mysqli_stmt_execute($stmt)) {
                echo showError2("Вы успешно зарегистрировались");
                 
              } else {
                echo showError2("Попробуйте еще раз");
                echo "Что то пошло не так.Повторите попытку позже.";
              }
          }
          mysqli_stmt_close($stmt);
      }
      mysqli_close($connection);
  }
}

function login($connection)
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty(trim($_POST["username"]))) {
          $username_err = "Please enter your username.";
      } else {
          $username = trim($_POST["username"]);
      }
      if (empty(trim($_POST["password"]))) {
          $password_err = "Please enter your password.";
      } else {
          $password = trim($_POST["password"]);
      }
      if (empty($username_err) && empty($password_err)) {
          $sql = "SELECT userId, userName, userPassword, userGroup, userCreated, userDesc, userImg, userFilm, userPoint, userBuy, userLvl FROM users WHERE userName = ?";

          if ($stmt = mysqli_prepare($connection, $sql)) {
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              $param_username = $username;
              if (mysqli_stmt_execute($stmt)) {
                  mysqli_stmt_store_result($stmt);

                  if (mysqli_stmt_num_rows($stmt) == 1) {
                      mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $group, $date, $desc, $image, $film, $point, $buy, $lvl);
                      if (mysqli_stmt_fetch($stmt)) {
                          if (password_verify($password, $hashed_password)) {
                              session_start();
                              $_SESSION["loggedin"] = true;
                              $_SESSION["id"] = $id;
                              $_SESSION["username"] = $username;
                              $_SESSION["userGroup"] = $group;
                              $_SESSION["userCreated"] = $date;
                              $_SESSION["userDesc"] = $desc;
                              $_SESSION["userImg"] = $image;
                              $_SESSION["userFilm"] = $film;
                              $_SESSION["userPoint"] = $point;
                              $_SESSION["userBuy"] = $buy;
                              $_SESSION["userLvl"] = $lvl;

                              header("location: profile.php");
                          } else {
                              echo showError2("Неправильный пароль");
                          }
                      }
                  } else {
                      echo showError2("Пользователя с таким именем не существует");
                  }
              } else {
                echo showError2("Непредвиденная ошибка");
              }
          }
          mysqli_stmt_close($stmt);
      }

  }
}


function showError($message) {
    echo "<script>alert('$message');</script>";
}

function showError2($message2) {
    echo "<script>Swal.fire('$message2');</script>";
}

function changePassword($connection)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(trim($_POST["new_password"]))) {
            $new_password_err = "Please enter the new password.";
            return $new_password_err;
        } elseif (strlen(trim($_POST["new_password"])) < 6) {
            $new_password_err = "Password must have atleast 6 characters.";
            return $new_password_err;
        } else {
            $new_password = trim($_POST["new_password"]);
        }
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm the password.";
            return $confirm_password_err;
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($new_password_err) && ($new_password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        if (empty($new_password_err) && empty($confirm_password_err)) {
            $sql = "UPDATE users SET userPassword = ? WHERE userID = ?";
            if ($stmt = mysqli_prepare($connection, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $param_id = $_SESSION["id"];
                if (mysqli_stmt_execute($stmt)) {
                    session_destroy();
                    header("location: login.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($connection);
    }
}

function changeInfo($connection)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(trim($_POST["info"]))) {
            $info_err = "Please enter your about information.";
            return $info_err;
        } else {
            $info = trim($_POST["info"]);
        }
        if (empty($info_err)) {
            $sql = "UPDATE users SET userDesc = ? WHERE userID = ?";
            if ($stmt = mysqli_prepare($connection, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $info, $param_id);
                $param_id = $_SESSION["id"];
                if (mysqli_stmt_execute($stmt)) {
                    session_destroy();
                    header("location: profile.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
}

//////////////////////////
//// API functions  /////
////////////////////////

function savePostAPI($conn)
{
    $date = date("Y-m-d H:i");
    $title = escapeInsert($conn, $_POST['postTitle']);
    $comment = escapeInsert($conn, $_POST['postComment']);
    $image = escapeInsert($conn, $_POST['postImg']);
    $username = escapeInsert($conn, $_POST['userName']);;

    $query = "INSERT INTO posts
			(postComment, postDate, postTitle, postImg, userID)
			VALUES('$comment','$date', '$title', '$image', (SELECT userID FROM users WHERE userName = '$username'))";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

function getPostInfoAPI($conn, $id)
{
    $query = "SELECT * FROM posts INNER JOIN users ON users.userID = posts.userID WHERE postID=".$id; ;

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function getAllPostsAPI($conn)
{
    $query = "SELECT * FROM users INNER JOIN posts ON users.userID = posts.userID ORDER BY postID DESC";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
}

function deletePostAPI($conn, $id)
{
    $query = "DELETE FROM posts WHERE postID=". $id;

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    return 'Post deleted';
}

function updatePostAPI($conn)
{
    $title = escapeInsert($conn, $_POST['postTitle']);
    $comment = escapeInsert($conn, $_POST['postComment']);
    $image = escapeInsert($conn, $_POST['postImg']);
    $id = $_GET['id'];

    $query = "UPDATE posts
			SET postTitle='$title', postComment='$comment', postImg='$image'
			WHERE postID=". $id;

    $result = mysqli_query($conn, $query) or die("Query failed: $query");

    return 'Post updated.';
}

?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
<noscript>Enable JavaScript to see this message</noscript>