<?php
require("./config.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
$title = "Home - Travel Blog";
include(ROOT . "templates/head.tpl");
?>

<body>

	<?php
	include(ROOT . "templates/navigation.tpl");
	include(ROOT . "templates/header.tpl");


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
				include(ROOT . "templates/sidebar.tpl");

				?>
			</div>
			<!-- //Sidebar -->
		</div>
	</main>

	<?php
	include(ROOT . "templates/footer.tpl");
	?>

</body>

</html>