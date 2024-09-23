<!doctype html>
<html lang="zxx">

<head>
	<!-- Meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<!-- Template CSS -->
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
		rel="stylesheet">
	<!-- Template Java google map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
</head>

<footer class="w3l-footer">
		<section class="footer-inner-main">
			<div class="footer-hny-grids py-5">
				<div class="container py-lg-4">
					<div class="text-txt">
						<div class="right-side">
							
							<div class="row footer-links">


								
								<div class="col-md-3 col-sm-6 sub-two-right mt-5">
									<h6>Информация</h6>
									<ul>
										<li><a href="index.php">Главная</a> </li>
										<li><a href="movies.php">Расписание</a> </li>
									</ul>
								</div>

								


								<div class="col-md-3 col-sm-6 sub-two-right mt-5">
									<h6>Рассылка</h6>
									<form action="#" class="subscribe mb-3" method="post">
										<input type="email" name="email" placeholder="Ваша почта" required="">
										<button><span class="fa fa-envelope-o"></span></button>
									</form>
									<p>Введите ваш адрес электронной почты, чтобы первым узнавать о секретных купонах, новостях и акциях.
									</p>
								</div>

								

								<div class="col-md-3 col-sm-6 sub-two-right mt-5" style="margin-left: 0px">
									<h6>Контакты</h6>
									<form action="#" class="subscribe mb-3" method="post">
									<div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2377.6918537224715!2d58.981896400000004!3d53.4203369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d12f37db2e5131%3A0x4e02f4fac59f4752!2z0JzQk9Ci0KMg0LjQvC4g0J3QvtGB0L7QstCwINCu0LbQvdGL0Lkg0LrQvtGA0L_Rg9GB!5e0!3m2!1sru!2sru!4v1703261868339!5m2!1sru!2sru"
										width="250px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
									</form>
									</div>
								
									<div class="col-md-3 col-sm-6 sub-two-right mt-5">
									<h6>Кинотеарт</h6>
									<ul>
										<li><a href="profile.php">Профиль</a> </li>
										<li><a href="tickets.php">Билеты</a> </li>
									</ul>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="below-section">
				<div class="container">
					<div class="copyright-footer">
						<div class="columns text-lg-left">
							<p>&copy; 2023 SilverStar. All rights reserved | Designed by VBH
						</div>

						<ul class="social text-lg-right">
							<li><a href="https://web.telegram.org/k/#@Pechenka7"><span class="fa fa-telegram" aria-hidden="true"></span></a>
							</li>
							

						</ul>
					</div>
				</div>
			</div>
		























			<!-- up level -->
			<button onclick="topFunction()" id="movetop" title="Go to top">
				<span class="fa fa-arrow-up" aria-hidden="true"></span>
			</button>
			<script>
				// When the user scrolls down 20px from the top of the document, show the button
				window.onscroll = function () {
					scrollFunction()
				};

				function scrollFunction() {
					if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
						document.getElementById("movetop").style.display = "block";
					} else {
						document.getElementById("movetop").style.display = "none";
					}
				}

				// When the user clicks on the button, scroll to the top of the document
				function topFunction() {
					document.body.scrollTop = 0;
					document.documentElement.scrollTop = 0;
				}
			</script>
			<!-- /up level -->


			<!-- /google map -->
			<script>
				function myMap() {
    			var mapCanvas = document.getElementById("map");
    			var mapOptions = {
        		center: new google.maps.LatLng(51.5, -0.2),
        		zoom: 10
    			};
    			var map = new google.maps.Map(mapCanvas, mapOptions);
				}
			</script>
			<!-- /google map -->
		</section>
	</footer>
