<?php
require ("./config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Home - Travel Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700|Playfair+Display:400,400i,700,900i&amp;subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>

	<?php
	    include (ROOT . "templates/navigation.tpl");
	    include (ROOT . "templates/header.tpl");


	?>



	<main class="container">
		<div class="content-wrapper">
			<!-- Content -->
			<div class="content">

				<article class="post">
					<div class="post-img" style=" background-image: url(./img/post/post-1.jpg); "></div>
					<div class="post-content">

						<div class="post__cat">Lifestyle</div>
						<div class="post__title">End of the Ocean</div>
						<div class="post__text">Ted fermentum sed felis ut eleifend. Integer laoreet massa sed leo rhoncus, non posuere eros varius. Sed congue ligula leo, in molestie mauris viverra quis. Ut a dui a lectus molestie pulvinar id non magna. Nam blandit dictum ante id venenatis. </div>
						<a href="#" class="read-more">Read More</a>

					</div>
				</article>

				<article class="post">
					<div class="post-img" style=" background-image: url(./img/post/post-2.jpg); "></div>
					<div class="post-content">

						<div class="post__cat">Lifestyle</div>
						<div class="post__title">End of the Ocean</div>
						<div class="post__text">Ted fermentum sed felis ut eleifend. Integer laoreet massa sed leo rhoncus, non posuere eros varius. Sed congue ligula leo, in molestie mauris viverra quis. Ut a dui a lectus molestie pulvinar id non magna. Nam blandit dictum ante id venenatis. </div>
						<a href="#" class="read-more">Read More</a>

					</div>
				</article>

				<article class="post">
					<div class="post-img" style=" background-image: url(./img/post/post-3.jpg); "></div>
					<div class="post-content">

						<div class="post__cat">Lifestyle</div>
						<div class="post__title">End of the Ocean</div>
						<div class="post__text">Ted fermentum sed felis ut eleifend. Integer laoreet massa sed leo rhoncus, non posuere eros varius. Sed congue ligula leo, in molestie mauris viverra quis. Ut a dui a lectus molestie pulvinar id non magna. Nam blandit dictum ante id venenatis. </div>
						<a href="#" class="read-more">Read More</a>

					</div>
				</article>

				<a href="#" class="load-more">Load More</a>
			</div>
			<!-- //Content -->

			<!-- Sidebar -->
			<div class="sidebar">
                <?php
                    include (ROOT . "templates/sidebar.tpl");

                ?>
			</div>
			<!-- //Sidebar -->
		</div>
	</main>

	<footer class="footer">
		<div class="container">

			<div class="footer-nav-wrapper">
				<div class="footer-nav">
					<a href="#" class="footer-nav__link footer-nav__link--active">HOME</a>
					<a href="#" class="footer-nav__link">ABOUT ME</a>
					<a href="#" class="footer-nav__link">POST</a>
					<a href="#" class="footer-nav__link">CONTACT</a>
				</div>
				<form class="footer-form" action="">
					<input class="footer-form__input" type="text">
					<input class="footer-form__submit" type="submit" value="">
				</form>
			</div>

			<div class="footer-contacts">
				<p>travel@gmail.com</p>
				<p>(123) 456 789</p>
			</div>

			<div class="footer-line"></div>
			<div class="footer-copyright">

				<p><i class="far fa-copyright"></i> Copyrights 2017. Travelblog By VictorThemes</p>

				<div class="social">
					<div class="social__icon"><a href="#" class="fab fa-facebook-f"></a></div>
					<div class="social__icon"><a href="#" class="fab fa-twitter"></a></div>
					<div class="social__icon"><a href="#" class="fab fa-instagram"></a></div>
				</div>
			</div>

		</div>
	</footer>

</body>
</html>
