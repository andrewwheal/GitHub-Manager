<aside class="container">
	<ul class="breadcrumb">
		<?
			$i = count($breadcrumbs);
		?>
		<? foreach ($breadcrumbs as $title => $link): ?>
			<? $i-- ?>

			<? if ($i): ?>
				<li><a href="<?= $link ?>"><?= $title ?></a></li>
				<li><span class="divider">/</span></li>
			<? else: ?>
				<li><?= $title ?></li>
			<? endif ?>
		<? endforeach ?>
	</ul>
</aside>
