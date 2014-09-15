<?php

class Amato_Seo
{
	/**
	 * @param ORM $obj
	 */
	public static function get($obj)
	{
		return ORM::factory('Seo')->where('model', '=', strtolower($obj->object_name()))
			->where('pk', '=', $obj->pk())
			->find();
	}
}