<header class="page-header">
	<h1 class="pull-left"><?= \Inflector::humanize($repo->name, '-') ?></h1>

	<div id="details" class="pull-right">
		<? if ($repo->private): ?>
			<button class="btn disabled" title="Private"><i class="icon-lock"></i></button>
		<? endif ?>
		<? if ($repo->fork): ?>
			<button class="btn disabled" title="Forked"><i class="icon-random"></i></button>
		<? endif ?>
		<? if ($repo->homepage): ?>
			<a href="<?= $repo->homepage ?>" class="btn" title="Wiki"><i class="icon-home"></i></a>
		<? endif ?>
		<? if ($repo->has_wiki): ?>
			<a href="<?= $repo->html_url ?>/wiki" class="btn" title="Wiki"><i class="icon-file"></i></a>
		<? endif ?>
		<button class="btn disabled" title="Watchers"><i class="icon-eye-open"></i> <?= $repo->watchers ?></button>
		<button class="btn disabled" title="Forks"><i class="icon-random"></i> <?= $repo->forks ?></button>
		<a href="#issues" class="btn" title="Issues"><i class="icon-warning-sign"></i> <?= $repo->open_issues ?></a>
		<a href="#pulls" class="btn" title="Pull Requests"><i class="icon-download-alt"></i> <?= count($pull_requests) ?></a>
	</div>

	&nbsp;
</header>

<table class="table">
	<tbody>
		<tr>
			<th>Name</th>
			<td><?= $repo->name ?></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><?= $repo->description ?></td>
		</tr>
		<tr>
			<th>Tags</th>
			<td>
				<? foreach($tags as $tag): ?>
					<span class="label label-info"><?= $tag->name ?></span>
				<? endforeach ?>
			</td>
		</tr>
		<tr>
			<th>Branches</th>
			<td>
				<? foreach($branches as $branch): ?>
					<span class="label <?= ($branch->name == $master_branch) ? 'label-success' : 'label-info' ?>"><?= $branch->name ?></span>
				<? endforeach ?>
			</td>
		</tr>
		<tr>
			<th>Created</th>
			<td>
				<span class="span2"><?= \Date::time_ago(strtotime($repo->created_at)) ?></span>
				(<?= date('d/m/Y H:i', strtotime($repo->created_at)) ?>)
			</td>
		</tr>
		<tr>
			<th>Last Pushed</th>
			<td>
				<?= \Date::time_ago(strtotime($repo->pushed_at)) ?>
				(<?= date('d/m/Y H:i', strtotime($repo->pushed_at)) ?>)
			</td>
		</tr>
		<tr>
			<th>Last Updated</th>
			<td>
				<?= \Date::time_ago(strtotime($repo->updated_at)) ?>
				(<?= date('d/m/Y H:i', strtotime($repo->updated_at)) ?>)
			</td>
		</tr>
	</tbody>
</table>

<? if ($issues): ?>
	<section id="issues">
		<h3>Issues</h3>

		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Description</th>
					<th>Comments</th>
					<th>Updated At</th>
				</tr>
			</thead>
			<? foreach ($issues as $issue): ?>
				<tr>
					<td><?= $issue->number ?></td>
					<td><?= $issue->title ?></td>
					<td><?= \Str::truncate($issue->body, 100) ?></td>
					<td><?= $issue->comments ?></td>
					<td><?= $issue->updated_at ?></td>
				</tr>
			<? endforeach ?>

			<? if (count($issues) < $repo->open_issues): ?>
				<tfoot>
					<tr>
						<td colspan="5"><a href="/issues/<?= $user ?>/<?= $repo->name ?>" class="pull-right">View all Issues <i class="icon-chevron-right"></i></a></td>
					</tr>
				</tfoot>
			<? endif ?>
		</table>
	</section>
<? endif ?>

<? if ($pull_requests): ?>
	<section id="issues">
		<h3 id="pulls">Pull Requests</h3>

		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Description</th>
					<th>Updated At</th>
				</tr>
			</thead>
			<? foreach (array_slice($pull_requests, 0, \Config::get('githubmanager.repo_details.pull_requests')) as $pull_request): ?>
				<tr>
					<td><?= $pull_request->number ?></td>
					<td><?= $pull_request->title ?></td>
					<td><?= $pull_request->body ?></td>
					<td><?= $pull_request->updated_at ?></td>
				</tr>
			<? endforeach ?>

			<? if (count($pull_requests) > \Config::get('githubmanager.repo_details.pull_requests')): ?>
				<tfoot>
					<tr>
						<td colspan="5"><a href="/pullrequests/<?= $user ?>/<?= $repo->name ?>" class="pull-right">View all Pull Requests <i class="icon-chevron-right"></i></a></td>
					</tr>
				</tfoot>
			<? endif ?>
		</table>
	</section>
<? endif ?>
