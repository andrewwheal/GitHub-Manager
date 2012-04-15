<?php

class Controller_Repos extends \Fuel\Core\Controller_Template {

	public function before() {
		parent::before();

		\SicoNav\Breadcrumbs::forge()->add('Home', '/');
	}

	public function action_index() {
		\SicoNav\Breadcrumbs::instance()->add('Repos', '/repos');

		$this->template->title = 'Repos | GitHub Manager';
		$this->template->content = View::forge('repos/index');
		$this->template->content->repos = \GitHub\Repos::organisation('propcom')->execute();
	}

}
