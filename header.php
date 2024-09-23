<?php
require("includes/config.php");
require("includes/functions.php");
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
	<link rel="icon" href="assets/images/fav.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<!-- Template CSS -->
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
		rel="stylesheet">
	<!-- Template CSS -->
</head>

<body>


<!-- header -->
<header id="site-header" class="w3l-header fixed-top">
		<!--/nav-->
		<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
			<div class="container">
				<h1><a class="navbar-brand" href="index.php" ><span class="fa fa-play icon-log"
							aria-hidden="true"></span>
						SilverStar </a></h1>

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<!-- <span class="navbar-toggler-icon"></span> -->
					<span class="fa icon-expand fa-bars"></span>
					<span class="fa icon-close fa-times"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						
						<li class="nav-item">
							<a href="index.php" class="nav-link" href="index.html">Главная</a>
						</li>
                        
						<li class="nav-item">
							<a class="nav-link" href="movies.php">Расписание</a>

						</li>
						<!-- /search popup -->
						<!--/search-right-->
						<div class="search-right">
						<a href="#search" class="btn search-hny mr-lg-3 mt-lg-0 mt-4" title="search">Поиск<span
								class="fa fa-search ml-3" aria-hidden="true"></span></a>
						<!-- search popup -->
						<div id="search" class="pop-overlay">
							<div class="popup">
								<form action="#" method="post" class="search-box">
									<input type="search" id="bookName" placeholder="Введите название" name="search"
										required="required" autofocus="">
								</form>
								<div class="browse-items">
									<h3 class="hny-title two mt-md-5 mt-4">Результаты:</h3>
									<ul class="search-items">
										<li><a href="movies.php" id="searchResults"></a></li>
									</ul>
								</div>
								</div>
							
							<a class="close" href="#close">×</a>
						</div>
						</div>
				    <li class="nav-item">
                    <?php if (isset($_SESSION['loggedin'])) { ?>
								<a class="nav-link" href="profile.php">Профиль</a>
								<?php } ?>
							</li>
							<li class="nav-item">
                    <?php if (isset($_SESSION['loggedin'])) { ?>
								<a class="nav-link" href="tickets.php">Билеты</a>
								<?php } ?>
							</li>
                            <?php if (!isset($_SESSION['loggedin'])) { ?>
						<li class="nav-item">
							<a class="nav-link navbar-item" href="login.php">
            Войти </a>
						</li>
                        <?php } else { ?>
							<a href="logout.php" class="navbar-item nav-link">
            Выйти 
          </a>
		  <?php } ?>

					</ul>

					<!--/search-right-->
					<!--/search-right-->
				
				</div>
				<!-- toggle switch for light and dark theme -->
				<div class="mobile-position">
					<nav class="navigation">
						<div class="theme-switch-wrapper">
							<label class="theme-switch" for="checkbox">
								<input type="checkbox" id="checkbox">
								<div class="mode-container">
									<i class="gg-sun"></i>
									<i class="gg-moon"></i>
								</div>
							</label>
						</div>
					</nav>
				</div>
				<!-- //toggle switch for light and dark theme -->
			</div>
		</nav>
		<!--//nav-->
	</header>

