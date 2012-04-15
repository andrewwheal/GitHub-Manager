<? $current = \Arr::in_array_recursive('/'.\Uri::string(), $nav) ?>

<li class="<?= $current ? 'active' : '' ?> dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?= $name ?>
		<b class="caret"></b>
	</a>

	<ul class="dropdown-menu">
		<?
			foreach ($nav as $name => $link) {
				if (is_array($link)) {
					echo render('siconav/nav/children', array('nav' => $link, 'name' => $name));
				} else {
					echo render('siconav/nav/item', compact('name', 'link'));
				}
			}
		?>
	</ul>
</li>
