<nav class="navbar navbar-fixed-top ">
	<div class="navbar-inner">
		<div class="container">
			<a href="/" class="brand">GitHub Manager</a>

			<ul class="nav">
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
		</div>
	</div>
</nav>
