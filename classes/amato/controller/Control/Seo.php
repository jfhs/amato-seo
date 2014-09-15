<?php

class Amato_Controller_Control_Seo extends Controller_Control
{
	public function action_seo() {
		if ($this->request->method() == 'POST') {
			$groups = $this->request->post('groups');
			foreach($groups as $group=>$items) {
				foreach($items as $id=>$fields) {
					$o = ORM::factory('Seo')->where('model', '=', ucfirst($group))
						->where('pk', '=', $id)->find();
					if (!$o->loaded()) {
						$o = ORM::factory('Seo');
						$o->model = ucfirst($group);
						$o->pk = $id;
					}
					foreach($fields as $k=>$v) {
						$o->$k = $v;
					}
					$o->save();
				}
			}
		}
		$groups = array();
		foreach(Kohana::$config->load('seo') as $group => $title) {
			$groups[$group] = array(
				'title' => $title,
				'items' => ORM::factory(ucfirst($group))->find_all(),
			);
		}
		$this->template->content = View::factory('control/seo', array(
			'groups' => $groups,
		));
	}
}