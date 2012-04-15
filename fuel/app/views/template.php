<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title><?= isset($title) ? $title : '' ?></title>

		<?= Asset::css('bootstrap.min.css') ?>
		<?= Asset::css('style.css') ?>

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
