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

<!--

-->
<!doctype html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Главная</title>
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/123.css">
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<!-- Template CSS -->
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
		rel="stylesheet">
		<script src="script1.js"></script>
	<!-- Template CSS -->
</head>

<body>
<br>
	<!-- //header -->
	<!-- main-slider -->
	<section class="w3l-main-slider position-relative" id="home">
		<div class="companies20-content">
			<div class="owl-one owl-carousel owl-theme">
				<div class="item">
					<li>
						<div class="slider-info banner-view bg bg2">
							<div class="banner-info">
								<h3>Переводчик</h3>
								<p>Афганистан, март 2018 года. Во время спецоперации по поиску оружия талибов отряд сержанта армии США Джона Кинли попадает в засаду. В живых остаются только сам Джон, получивший ранение, и местный переводчик Ахмед, который сотрудничает с американцами.</p>
								<a href="#small-dialog1" class="popup-with-zoom-anim play-view1">
									<span class="video-play-icon">
										<span class="fa fa-play"></span>
									</span>
									<h6>Смотреть</h6>
								</a>
								<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
								<div id="small-dialog1" class="zoom-anim-dialog mfp-hide">
								<iframe src="https://player.vimeo.com/video/795487990" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info  banner-view banner-top1 bg bg2">
							<div class="banner-info">
								<h3>Убийцы цветочной луны</h3>
								<p>Вскоре после Первой мировой Эрнест Беркхарт, отслуживший во Франции поваром, приезжает в Оклахому, где находится крупная резервация индейцев племени осейдж, внезапно разбогатевших из-за обнаруженной на их земле нефти. Там живёт его дядя Уильям Хейл по прозвищу Король — друг индейцев и большой человек.</p>
								<a href="#small-dialog2" class="popup-with-zoom-anim play-view1">
									<span class="video-play-icon">
										<span class="fa fa-play"></span>
									</span>
									<h6>Смотреть</h6>
								</a>
								<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
								<div id="small-dialog2" class="zoom-anim-dialog mfp-hide">
								<iframe src="https://player.vimeo.com/video/849546681" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info banner-view banner-top2 bg bg2">
							<div class="banner-info">
								<h3>Мой Хатико</h3>
								<p>Начало 2000-х годов. Во время поездки за город с коллегами немолодой университетский преподаватель Чэнь подбирает на дороге грязного и испуганного щенка. Никто не соглашается взять пёсика себе. Пообещав, что найдёт щенку новый дом, Чэнь тем не менее отказывает всем претендентам — так пёс получает кличку Хатико и становится новым членом семьи.</p>
								<a href="#small-dialog3" class="popup-with-zoom-anim play-view1">
									<span class="video-play-icon">
										<span class="fa fa-play"></span>
									</span>
									<h6>Смотреть</h6>
								</a>
								<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
								<div id="small-dialog3" class="zoom-anim-dialog mfp-hide">
								<iframe src="https://player.vimeo.com/video/854642130" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info banner-view banner-top3 bg bg2">
							<div class="banner-info">
								<h3>Неудержимые 4</h3>
								<p>Неудержимые несут потери: Барни Росс выбывает из строя, а Ли Кристмас отстранен от будущих операций. В команду набирают новых бойцов и отправляют возмещать ущерб. Но и они терпят поражение и попадают в плен. Теперь Ли Кристмас должен в одиночку пробраться в логово противника и освободить команду, попутно предотвратив глобальную катастрофу.</p>
								<a href="#small-dialog4" class="popup-with-zoom-anim play-view1">
									<span class="video-play-icon">
										<span class="fa fa-play"></span>
									</span>
									<h6>Смотреть</h6>
								</a>
								<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
								<div id="small-dialog4" class="zoom-anim-dialog mfp-hide">
									<iframe src="https://player.vimeo.com/video/840719502" allow="autoplay; fullscreen"
										allowfullscreen=""></iframe>
								</div>
							</div>
						</div>
					</li>
				</div>
			</div>
		</div>
	</section>
	<!-- //banner-slider-->
	<!-- main-slider -->
	<!--grids-sec1-->
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
	<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['userGroup'] !== 1) { ?>
	<section class="hero is-medium">
    <div class="hero-body">
      <div class="container">
        <div class="content has-text-centered">
          <h3 class="hny-title">Последние отзывы</h3>
          <?php
          if (isset($_SESSION['loggedin'])) { ?>
            <a href="post-new.php"><button class="button is-medium">Добавить отзыв</button></a>
          <?php } ?>
          <hr>
          <div id="reviews"></div>
          <button id="load-more" class="button">Показать еще</button>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>
<br>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['userGroup'] === 1) { ?>
<section class="hero is-medium">
  <div class="hero-body">
    <div class="container">
      <div class="content has-text-centered">
        <h3 class="hny-title">Последние отзывы</h3>
        <?php
        if (isset($_SESSION['loggedin'])) { ?>
          <a href="post-new.php"><button class="button is-medium">Добавить отзыв</button></a>
        <?php } ?>
        <hr>
        <?php while ($row = mysqli_fetch_array($postUser)) { ?>
          <div class="columns">
            <div class="column all-news">
              <h2 class="title">
                <a href="post.php?id=<?php echo $row['postID']; ?>">
                  <?php echo $row['postTitle']; ?>
                </a>
              </h2><i class="date">
                <?php echo ucfirst($row['userName']); ?> |
                <?php echo date('Y-m-d H:i', strtotime($row['postDate'])); ?>
              </i><br>
              <p class="post-comment">
                <?php echo $row['postComment']; ?>
              </p><br>
              <?php if (isset($_SESSION['loggedin']) && $_SESSION['userGroup'] === 1) { ?>
                <a href="post-edit.php?editid=<?php echo $row['postID']; ?>"><button class="button">Изменить</button></a>
                <a href="post-delete.php?deleteid=<?php echo $row['postID']; ?>"><button
                    class="button">Удалить</button></a><br><br>
              <?php } ?>
            </div>
          </div>
          <hr>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<br>


	<section class="w3l-mid-slider position-relative">
		<div class="companies20-content">
			<div class="owl-mid owl-carousel owl-theme">
				<div class="item">
					<li>
						<div class="slider-info mid-view bg bg2">
							<div class="container">
								<div class="mid-info">
									<span class="sub-text">Ужасы</span>
									<h3>Крик. Ночь перед Рождеством</h3>
									<p>2023 ‧ Ужасы/Комедия ‧ 2ч 33мин</p>
									<a class="watch" href="movies.php"><span class="fa fa-play"
											aria-hidden="true"></span>
										Смотреть</a>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info mid-view mid-top1 bg bg2">
							<div class="container">
								<div class="mid-info">
									<span class="sub-text">Драма</span>
									<h3>Феррари</h3>
									<p>2023 ‧ Драма/Биография ‧ 2ч 4мин</p>
									<a class="watch" href="movies.php"><span class="fa fa-play"
											aria-hidden="true"></span>
										Смотреть</a>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info mid-view mid-top2 bg bg2">
							<div class="container">
								<div class="mid-info">
									<span class="sub-text">Аниме</span>
									<h3>Мальчик и птица</h3>
									<p>2023 ‧ Аниме/Мультфильм ‧ 2ч 4мин</p>
									<a class="watch" href="movies.php"><span class="fa fa-play"
											aria-hidden="true"></span>
										Смотреть</a>
								</div>
							</div>
						</div>
					</li>
				</div>
			</div>
		</div>
	</section>
	<!-- //mid-slider-->
<br>
<br>
	<!-- footer-66 -->
	<?php include 'footer.php' ?>
	<!--//footer-66 -->
</body>

</html>
<!-- responsive tabs -->
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