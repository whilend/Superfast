<?php

define("SUPERFAST", __DIR__.'/');
define("DEBUG_MODE", TRUE);

$config = Array(
	'db'              =>
		Array(
			'database_type' => 'mysql',
			'database_name' => 'test',
			'server'        => '127.0.0.1',
			'username'      => 'root',
			'password'      => '',
			'debug_mode'    => DEBUG_MODE
		)
);

include SUPERFAST.'system/autoload.php';
$app = new \Superfast\Micro\MicroApplication($config);
include SUPERFAST.'app/app.php';
$app->run();