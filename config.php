<?php
	// 程序配置文件
	define("PATH", dirname(__FILE__));

	include(PATH.'/core/db.class.php');
	$db = new Db();

	include(PATH.'/core/input.class.php');

	$input = new input();
?>