<?php

class Controller_Repos extends \Fuel\Core\Controller_Template {

	public function before() {
		parent::before();

		\SicoNav\Breadcrumbs::forge()->add('Home', '/');
		\SicoNav\Breadcrumbs::instance()->add('Repos', '/repos');
	}

	public function action_index() {
		$this->template->title = 'Repos | GitHub Manager';
		$this->template->content = View::forge('repos/index');
		$this->template->content->repos = \GitHub\Repos::organisation('propcom')->execute();
	}

	public function action_view($user, $repo) {
		\SicoNav\Breadcrumbs::instance()->add('View', "/repos/view/{$user}/{$repo}");

		\Config::load('githubmanager', true);

		$this->template->title = 'View Details | Repos | GitHub Manager';
		$this->template->content = View::forge('repos/view');
		$this->template->content->user = $user;
		$this->template->content->repo = \GitHub\Repos::get($user, $repo)->execute();
		$this->template->content->tags = \GitHub\Repos::tags($user, $repo)->execute();
		$this->template->content->branches = \GitHub\Repos::branches($user, $repo)->execute();
		$this->template->content->issues = \GitHub\Issues::repo($user, $repo, array('per_page' => \Config::get('githubmanager.repo_details.issues')))->execute();
		$this->template->content->pull_requests = \GitHub\PullRequests::all($user, $repo)->execute();

		if (isset($this->template->content->repo->master_branch)) {
			$master_branch = $this->template->content->repo->master_branch;
		} elseif (count($this->template->content->branches) == 1) {
			$master_branch = $this->template->content->branches[0]->name;
		} else {
			$master_branch = 'master';
		}

		$this->template->content->master_branch = $master_branch;
	}

}
