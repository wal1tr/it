<?php
session_start();

include 'header.php';

$allMovies = getMovies($connection);
$recMovie = getRecMovie($connection, 3);

require 'includes/Customer.php';
require 'includes/Adult.php';
require 'includes/Child.php';

$adult = new Adult('18', '15', 'Gold');
$child = new Child('0 - 17', '8', $recMovie);
?>
<!doctype html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<!-- Template CSS -->
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
		rel="stylesheet">
	<!-- Template CSS -->
</head>

<body>
  
<div class="w3l-breadcrumbs">
		<nav id="breadcrumbs" class="breadcrumbs">
			<div class="container page-wrapper">
				<a href="index.php">Главная</a> » <span class="breadcrumb_last" aria-current="page">Расисание</span>
			</div>
		</nav>
	</div>

<section class="w3l-albums py-5" id="projects">
		<div class="container py-lg-4">
			<div class="row">
				<div class="col-lg-12 mx-auto">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<ul class="resp-tabs-list hor_1">
							<li>Сегодня</li>
							<li>Завтра</li>
							<li>Послезавтра</li>
							<div class="clear"></div>
						</ul>
						<div class="resp-tabs-container hor_1">
							<div class="albums-content">
								<div class="row">
									<!--/set1-->
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div  class="img-circle">
												<a href="tickets.php">

													<img src="assets/images/ren.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, ужасы</p>
												<a class="author-book-title" href="tickets.php">Ренфилд</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 23:25

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/bomb.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, история</p>
												<a class="author-book-title" href="tickets.php">Опенгеймер</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 13:10

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/fl.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, фантастика</p>
												<a class="author-book-title" href="tickets.php">Флэш</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 21:50

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<!--//set1-->
									<!--/set1-->
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/von.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, мюзикл</p>
												<a class="author-book-title" href="tickets.php">Вонка</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 14:45

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/translate.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, боевик</p>
												<a class="author-book-title" href="tickets.php">Переводчик</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 15:15

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/boyandbird.jpg" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>Япония, аниме</p>
												<a class="author-book-title" href="tickets.php">Мальчик и птица</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 15:30

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<!--//set1-->
									<!--/set1-->
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/unstop.webp" class="img-fluid"
														alt="author image">
													
												</a>
											</div>
											<div class="message">
												<p>США, боевик</p>
												<a class="author-book-title" href="tickets.php">Неудержимые 4</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 16:00

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/wish.jpg" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, мультфильм</p>
												<a class="author-book-title" href="tickets.php">Заветное желание</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 16:20

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/myhatiko.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>Китай, драма</p>
												<a class="author-book-title" href="tickets.php">Мой Хатико</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 17:00

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<!--//set1-->
								</div>
							</div>
							<div class="albums-content">
								<div class="row">
									<!--/set1-->
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/pila.jpg" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
                      <p>США, ужасы</p>
												<a class="author-book-title" href="tickets.php">Пила 10</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 11:10

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/scream.jpg" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
                      <p>США, ужасы</p>
												<a class="author-book-title" href="tickets.php">Крик.Ночь перед Рождеством</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 11:30

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/myhatiko.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>Китай, драма</p>
												<a class="author-book-title" href="tickets.php">Мой Хатико</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 17:00

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<!--//set1-->
									<!--/set2-->
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/von.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, мюзикл</p>
												<a class="author-book-title" href="tickets.php">Вонка</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 14:45


													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/bomb.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, история</p>
												<a class="author-book-title" href="tickets.php">Опенгеймер</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 13:10

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/unstop.webp" class="img-fluid"
														alt="author image">
													
												</a>
											</div>
											<div class="message">
												<p>США, боевик</p>
												<a class="author-book-title" href="tickets.php">Неудержимые 4</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 16:00

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<!--//set2-->
								</div>
							</div>
							<div class="albums-content">
								<div class="row">
									<!--/set3-->
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php"><img src="assets/images/gnoms.jpg" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
                      <p>США, ужасы</p>
												<a class="author-book-title" href="tickets.php">Гномы. Новогодний беспредел</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 14:15

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/wish.jpg" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, мультфильм</p>
												<a class="author-book-title" href="tickets.php">Заветное желание</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 16:20

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/translate.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, боевик</p>
												<a class="author-book-title" href="tickets.php">Переводчик</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 15:15

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<!--//set3-->
									<!--/set3-->
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="tickets.php">

													<img src="assets/images/ren.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, ужасы</p>
												<a class="author-book-title" href="tickets.php">Ренфилд</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 23:25

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/fl.webp" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>США, фантастика</p>
												<a class="author-book-title" href="tickets.php">Флэш</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 21:50

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
											<a href="tickets.php"><img src="assets/images/boyandbird.jpg" class="img-fluid"
														alt="author image">

												</a>
											</div>
											<div class="message">
												<p>Япония, аниме</p>
												<a class="author-book-title" href="tickets.php">Мальчик и птица</a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> 15:30

													</span>

													<span class="post fa  text-right"></span>
												</h4>
											</div>
										</div>

									</div>
									<!--//set3-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include 'footer.php' ?>


<script src="assets/js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/easyResponsiveTabs.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      //Horizontal Tab
      $('#parentHorizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function (event) { // Callback function if tab is switched
          var $tab = $(this);
          var $info = $('#nested-tabInfo');
          var $name = $('span', $info);
          $name.text($tab.text());
          $info.show();
        }
      });
    });
  </script>  
<!-- //responsive tabs -->
<!--/theme-change-->
<script src="assets/js/theme-change.js"></script>
<!-- //theme-change-->
<script src="assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
	$(document).ready(function () {
		$('.owl-one').owlCarousel({
			stagePadding:280,
			loop: true,
			margin: 20,
			nav: true,
			responsiveClass: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					stagePadding:40,
					nav: false
				},
				480: {
					items: 1,
					stagePadding:60,
					nav: true
				},
				667: {
					items: 1,
					stagePadding:80,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<!-- //script -->
<script>
	$(document).ready(function () {
		$('.owl-three').owlCarousel({
			loop: true,
			margin: 20,
			nav: false,
			responsiveClass: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 2,
					nav: false
				},
				480: {
					items: 2,
					nav: true
				},
				667: {
					items: 3,
					nav: true
				},
				1000: {
					items: 5,
					nav: true
				}
			}
		})
	})
</script>
<!-- //script -->
<!-- /mid-script -->
<script>
	$(document).ready(function () {
		$('.owl-mid').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			responsiveClass: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<!-- //mid-script -->

<!-- script for owlcarousel -->
<!-- Template JavaScript -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function () {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom'
		});
	});
</script>
<!--//-->
<!-- disable body scroll which navbar is in active -->
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
	$(window).on("scroll", function () {
		var scroll = $(window).scrollTop();

		if (scroll >= 80) {
			$("#site-header").addClass("nav-fixed");
		} else {
			$("#site-header").removeClass("nav-fixed");
		}
	});

	//Main navigation Active Class Add Remove
	$(".navbar-toggler").on("click", function () {
		$("header").toggleClass("active");
	});
	$(document).on("ready", function () {
		if ($(window).width() > 991) {
			$("header").removeClass("active");
		}
		$(window).on("resize", function () {
			if ($(window).width() > 991) {
				$("header").removeClass("active");
			}
		});
	});
</script>
<!--//MENU-JS-->

<script src="assets/js/bootstrap.min.js"></script>