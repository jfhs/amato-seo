<?php

$menu = array(
	'link' => 'control/seo',
	'title' => 'SEO',
);
Controller_Control::set_menu_item('seo', $menu);

Route::set('control_seo', 'control/seo')
	->defaults(array(
		'controller' => 'Control_Seo',
		'action'     => 'seo',
	));
