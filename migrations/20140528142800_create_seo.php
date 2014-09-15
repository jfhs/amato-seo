<?php defined('SYSPATH') or die('No direct script access.');

class create_seo extends Migration
{
	public function up()
	{
		DB::query(Database::UPDATE,"
			CREATE TABLE `seo` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `model` varchar(255) NOT NULL,
			  `pk` varchar(255) NOT NULL,
			  `title` varchar(255) NOT NULL,
			  `keywords` text NOT NULL,
			  `meta` text NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8
				")
			->execute();
	}

	public function down()
	{
		$this->drop_table('seo');
	}
}