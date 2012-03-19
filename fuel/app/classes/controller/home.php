<?php

class Controller_Home extends Controller_Template {

	public function before() {
		parent::before();

		Package::load('siconav');
		\SicoNav\Breadcrumbs::forge()->add('Home', '/');
	}

	public function action_index() {
		$this->template->title = 'GitHub Manager';
		$this->template->content = View::forge('home/index');
	}

	public function action_404() {
		$this->template->content = View::forge('404');
	}
}
