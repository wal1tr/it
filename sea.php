<?php
session_start();

include 'header.php';

$postUser = getPostUser($connection);

if (isset($_GET['editid']) && $_GET['editid'] > 0) {
  $customerData = getPostInfo($connection, $_GET['editid']);
}



if (isset($_POST['updateid']) && $_POST['updateid'] > 0) {
  updatePost($connection);
  header("Location: index.php?editid=" . $_POST['updateid']);
}

?>

<!doctype html>
<html lang="zxx">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#bookName").keyup(function () {
                var searchValue = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "123.php",
                    data: {
                        search: searchValue,
                    },
                    success: function (response) {
                        $("#searchResults").html(response);
                    }
                });
            });

        });

    </script>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Поиск</title>
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/123.css">
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<!-- Template CSS -->
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
		rel="stylesheet">
	<!-- Template CSS -->
</head>

<section class="w3l-grids">
		<div class="grids-main py-5">
			<div class="container py-lg-3">
				<div class="headerhny-title">
					<div class="w3l-title-grids">
						<div class="headerhny-left">
							<h3 class="hny-title">Популярные фильмы</h3>
						</div>
						<div class="headerhny-right text-lg-right">
							<h4><a class="show-title" href="movies.php">Показать все</a></h4>
						</div>
					</div>
				</div>
				<div class="w3l-populohny-grids">
					<div class="item vhny-grid">
						<div class="box16">
								<figure>
									<img class="img-fluid" src="assets/images/ren.webp" alt="">
								</figure>
								<div class="box-content">
									<h3 class="title">Ренфилд</h3>
									<h4> <span class="post"><span class="fa fa-clock-o"> </span> 1ч 33мин

										</span>

										<span class="post fa fa-heart text-right"></span>
									</h4>
								</div>
								<span  aria-hidden="true"></span>
							</a>
						</div>
					</div>
					<div class="item vhny-grid">
						<div class="box16">
								<figure>
									<img class="img-fluid" src="assets/images/bomb.webp" alt="">
								</figure>
								<div class="box-content">
									<h3 class="title">Опенгеймер</h3>
									<h4> <span class="post"><span class="fa fa-clock-o"> </span> 3ч

										</span>

										<span class="post fa fa-heart text-right"></span>
									</h4>
								</div>
								<span  aria-hidden="true"></span>
							</a>
						</div>
					</div>
					<div class="item vhny-grid">
						<div class="box16">
								<figure>
									<img class="img-fluid" src="assets/images/fl.webp" alt="">
								</figure>
								<div class="box-content">
									<h3 class="title">Флэш</h3>
									<h4> <span class="post"><span class="fa fa-clock-o"> </span> 2ч 24мин

										</span>

										<span class="post fa fa-heart text-right"></span>
									</h4>
								</div>
								<span  aria-hidden="true"></span>
							</a>
						</div>
					</div>
					<div class="item vhny-grid">
						<div class="box16">
								<figure>
									<img class="img-fluid" src="assets/images/von.webp" alt="">
								</figure>
								<div class="box-content">
									<h3 class="title">Вонка</h3>
									<h4> <span class="post"><span class="fa fa-clock-o"> </span> 1ч 56мин

										</span>

										<span class="post fa fa-heart text-right"></span>
									</h4>
								</div>
								<span  aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <input type="text" id="bookName" placeholder="Введите название книги">
    <div id="searchResults"></div>