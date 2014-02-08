<?php
	include("config.php");
	$mysqli = new mysqli($config['db_server'], $config['db_username'], $config['db_password'], $config['db_name']);
	date_default_timezone_set($config['timezone']);
