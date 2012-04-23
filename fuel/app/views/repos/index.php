<header class="page-header">
	<h1>GitHub Repositories</h1>
</header>

<table class="table table-striped">
	<thead>
		<tr>
			<th colspan="2">Name</th>
			<th>Description</th>
			<th>Issues</th>
			<th>Updated At</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
		<? foreach ($repos as $repo): ?>
			<tr>
				<td>
					<? if ($repo->private): ?>
						<i class="icon-lock" title="Private Repo"></i>
					<? endif ?>
					<? if ($repo->fork): ?>
					<i class="icon-random" title="Repo is a Fork"></i>
					<? endif ?>
				</td>
				<td><?= $repo->name ?></td>
				<td><?= $repo->description ?></td>
				<td><?= $repo->open_issues ?></td>
				<td nowrap="nowrap"><?= \Date::time_ago(strtotime($repo->updated_at)) ?></td>
				<td class="btn-group" style="width: 125px;">
					<a href="/repos/view/<?=$repo->owner->login?>/<?= $repo->name ?>" class="btn">View Details</a>
					<button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="<?= $repo->html_url ?>">View on GitHub</a></li>
						<? if ($repo->homepage): ?>
							<li><a href="<?= $repo->homepage ?>">View Repo Homepage</a></li>
						<? endif ?>
					</ul>
				</td>
			</tr>
		<? endforeach ?>
	</tbody>

	<tfoot>
		<tr>
			<th colspan="2">Totals</th>
			<td><?= count($repos) ?></td>
			<td><?= array_reduce($repos, function($val, $repo){return $val+$repo->open_issues;}) ?></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
</table>

