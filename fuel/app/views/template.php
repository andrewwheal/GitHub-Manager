<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title><?= isset($title) ? $title : '' ?></title>

		<?= Asset::css('bootstrap.min.css') ?>
		<?= Asset::css('style.css') ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<?= Asset::js('bootstrap.min.js') ?>
	</head>

	<body>
		<header>
			<?= \SicoNav\Nav::instance()->render(); ?>
			<?= \SicoNav\Breadcrumbs::instance()->output(); ?>
		</header>

		<section class="container">
			<?= $content ?>
		</section>

		<footer class="container">
			<div class="row">
				<p class="span4" style="text-align: left;">GitHub Manager v1.0 alpha</p>
				<p class="span4" style="text-align: center;">Powered by <a href="http://fuelphp.com" target="_blank">FuelPHP</a></p>
				<p class="span4" style="text-align: right;">Created by: <a href="http://twitter.com/SicoAnimal" target="_blank">SicoAnimal</a></p>
			</div>
		</footer>
	</body>
</html>
