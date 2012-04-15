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
		<?= \SicoNav\Nav::instance()->render(); ?>
		<?= \SicoNav\Breadcrumbs::instance()->output(); ?>

		<section class="container">
			<?= $content ?>
		</section>
	</body>
</html>
