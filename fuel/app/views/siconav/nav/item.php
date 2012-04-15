<? $current = '/'.\Uri::string() == $link ?>

<li class="<?= $current ? 'active' : '' ?>">
	<a href="<?= $link ?>"><?= $name ?></a>
</li>
