<?php
session_start();

include 'header.php';
checkLogin();

// Database connection and fetching movies
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";


require_once 'includes/functions.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to fetch movies for dropdown
if (!function_exists('getMovies')) {
  function getMovies($connection)
  {
    function getMovies($connection)
    {
      $movie_query = "SELECT movieID, movieTitle FROM movies";
      return $connection->query($movie_query);
    }
  }
}
$movies = getMovies($conn);


function getSeatStatus($connection, $row, $seatNumber)
{
  $query = "SELECT `status` FROM `seats` WHERE `row` = ? AND `seatNumber` = ?"; // Убедитесь, что имена столбцов и таблицы верны
  $stmt = $connection->prepare($query);

  if (!$stmt) {
    die("Prepare failed: " . $connection->error); // Выводит ошибку, если запрос не может быть подготовлен
  }

  $stmt->bind_param("ii", $row, $seatNumber);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $seat = $result->fetch_assoc();
    return $seat['status'];
  } else {
    return 'available';
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/123.css" />
  <title>Бронирование билетов на фильм</title>
</head>

<script>
// Get the movie select element
var movieSelect = document.getElementById("movie");

// Add a change event listener
movieSelect.addEventListener("change", function() {
  // Clear the selected seats
  clearSelection();
});
</script>
<body>
<div class="w3l-breadcrumbs">
		<nav id="breadcrumbs" class="breadcrumbs">
			<div class="container page-wrapper">
				<a href="index.php">Главная</a> » <span class="breadcrumb_last" aria-current="page">Билеты</span>
			</div>
		</nav>
	</div>
  <br>
  <br>
  <br>
  <br>
  
  <div class="movie-container">
    <h2>Выберите фильм:</h2>
	<br>
    <form action='' method='post'>
      <select id='movie'>
        <?php while ($movie = $movies->fetch_assoc()) { ?>
          <option value='<?php echo $movie['movieCost']; ?>' data-movie-cost='<?php echo $movie['movieCost']; ?>'>
            <?php echo $movie['movieTitle']; ?>
          </option>
        <?php } ?>
      </select>
    </form>
  </div>
	<div class="container1">
    <div class="screen" style="background-color: grey"></div>
    <div class='seating-layout'></div>
	<?php
    for ($row = 1; $row <= 10; $row++) {
      echo "<div class='row'>";
      // Echo the row number here
      echo "<div class='row-number'>$row</div>";
      $seatCount = $row == 2 ? 20 : 20; // Количество мест в каждом ряду
      for ($seatNumber = 1; $seatNumber <= $seatCount; $seatNumber++) {
        $seatStatus = getSeatStatus($conn, $row, $seatNumber);
        $seatClass = $seatStatus == 'sold' ? 'seat sold' : 'seat';
        echo "<div class='$seatClass' data-row='$row' data-seat='$seatNumber'>";
        // Echo the seat number here
        echo "<span>$seatNumber</span>";
        echo "</div>";
      }
      echo "</div>";
    }
    ?>
  </div>
  </div>
<br>
<section class="footer-inner-main">
            <div class="footer-hny-grids py-5">
                <div class="container py-lg-4">
                    <div class="text-txt">
                        <div class="right-side">

                            <div class="row footer-links">



                                <div class="col-md-3 col-sm-6 sub-two-right mt-5">

                                </div>




                                <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                    <p>Выбранных мест: <span id='count'>0</span></p>
            <p>Цена: <span id='total'>0</span>₽</p>
                                </div>



                                <div class="col-md-3 col-sm-6 sub-two-right mt-5" style="margin-left: 0px">
                                    <a href="https://securecardpayment.ru/payment/merchants/sbersafe_sberid/payment_ru.html?mdOrder=0a7b9d1a-0048-75d1-b0cd-8c0e00005d8e"><button class="button" href=""; >Купить</button></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </section>

  <br>
  <script src="script.js"></script>
  <?php include 'footer.php'; ?>
</body>
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
</html>