<?php
session_start();

include 'header.php';
$info = "";
$info_err = "";
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
$url = "";
$image = "";

if (isset($_POST['ispass']) && $_POST['ispass'] == 1) {
  $new_password_err = changePassword($connection);
}

if (isset($_POST['isinfo']) && $_POST['isinfo'] == 1) {
  $info_err = changeInfo($connection);
}

if (isset($_POST['isurl']) && $_POST['isurl'] == 1) {
  $info_err = changeImg($connection);
}
checkLogin();

$page = "profile";
?>
	<title>Профиль</title>
	<link rel="stylesheet" href="assets/css/123.css">
<div class="w3l-breadcrumbs">
		<nav id="breadcrumbs" class="breadcrumbs">
			<div class="container page-wrapper">
			<a href="index.php">Главная</a> » <span class="breadcrumb_last" aria-current="page">Профиль</span>
			</div>
		</nav>
	</div>

<div class="w3l-ab-grids py-5">
		<div class="container py-lg-4">
			<div class="row ab-grids-sec align-items-center">
				<div class="col-lg-6 ab-right">
        <img width="450px" height="350px" alt='' src='<?php echo ($_SESSION["userImg"]); ?>'>
				</div>
				<div class="col-lg-6 ab-left pl-lg-4 mt-lg-0 mt-5">
        <h3 class="hny-title"><?php echo ucfirst($_SESSION["username"]); ?></h3>
					<p class="mt-3">Дата регистрации: <?php echo htmlspecialchars($_SESSION["userCreated"]); ?></p>
          <p class="mt-3">О пользователе: <?php echo htmlspecialchars($_SESSION["userDesc"]); ?>
          <p class="mt-3">Группа пользователя: <?php checkUserGroup() ?>
				</div>
			</div>
		   
			<div class="w3l-counter-stats-info text-center">
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter"><?php echo htmlspecialchars($_SESSION["userFilm"]); ?></p>
							<h4>Любимые фильмы</h4>

						</div>
					</div>
				</div>
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter"><?php echo htmlspecialchars($_SESSION["userPoint"]); ?></p>
							<h4>Очки пользователя</h4>

						</div>
					</div>
				</div>
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter"><?php echo htmlspecialchars($_SESSION["userBuy"]); ?></p>
							<h4>Куплено билетов</h4>

						</div>
					</div>
				</div>
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter"><?php echo htmlspecialchars($_SESSION["userLvl"]); ?></p>
							<h4>Уровень</h4>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>



  <section class="w3l-team" id="team">
			<div class="grids-main py-5">
				<div class="container py-lg-4">
					<div class="headerhny-title">
						<h3 class="hny-title">Настройки</h3>
            <br>
            <div class="row footer-links">
            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
            <h4 class="hny-title">Поменять пароль</h4>
            <div class="column is-half">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="ispass" id="ispass" value="1">
                <div class="field <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                  <label class="mt-3">Новый пароль</label>
                  <div class="control has-icons-left">
                    <input class="input is-medium" type="username" name="new_password" placeholder="Новый пароль"
                      value="<?php echo $new_password; ?>">
                   
                    <span class="help is-danger">
                      <?php echo $new_password_err; ?>
                    </span>
                  </div>
                </div>
                <div class="field <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                  <label class="mt-3">Введите пороль еще раз</label>
                  <div class="control has-icons-left">
                    <input class="input is-medium" type="password" name="confirm_password"
                      placeholder="Подтвердите пароль">
                    <span class="help is-danger">
                      <?php echo $confirm_password_err; ?>
                    </span>
                  </div>
                </div>
                <br><input class="button" type="submit" name="submit" value="Изменить пароль">
              </form>
            </div>
            </div>

            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
            <div class="column is-half">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="isinfo" id="isinfo" value="1">
                <div class="field <?php echo (!empty($info_err)) ? 'has-error' : ''; ?>">
                  <h4 class="hny-title">Информация о пользователе</h4>
                  <div class="control has-icons-left">
                    <br><textarea class="textarea is-medium" type="username" name="info" placeholder="Введите информацию.."
                      value="<?php echo $info; ?>"><?php echo $info; ?></textarea>
                    <span class="help is-danger">
                      <?php echo $info_err; ?>
                    </span>
                  </div>
                </div>
                <br><input class="button" type="submit" name="submit" value="Изменить информацию">
              </form>
            </div>
        </div>

            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
            <div class="column is-half">


			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="isurl" id="isurl" value="1">

                <div class="field <?php echo (!empty($info_err)) ? 'has-error' : ''; ?>">
                  <h4 class="hny-title">Изменить картинку пользователя</h4>
                  <div class="control has-icons-left">
                    <br><textarea class="textarea is-medium" type="username" name="image" placeholder="Введите url картинки.."
                      value="<?php echo $image; ?>"><?php echo $image; ?></textarea>
                    <span class="help is-danger">
                      <?php echo $info_err; ?>
                    </span>
                  </div>
                </div>
                <br><input class="button" type="submit" name="submit" value="Изменить картинку">
              </form>


            </div>
            </div>
                </div>
            </div>
			</div>
            </div>
        </section>




<link rel="stylesheet" href="assets/css/style-starter.css">

<div class="mobile-position" style="opacity: 0">
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


<!-- //script -->

<!-- //script -->
<!-- /mid-script -->

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
<!--Скрипт чтобы не выходило из профиля при переходе на другие страницы-->
<!-- disable body scroll which navbar is in active -->

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
<?php include 'footer.php' ?>



<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<!-- Повышение уровня -->