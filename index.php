<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/init.php';

// an example of using the Config class
//echo Config::get('mysql/host'); // 127.0.0.1

// an example of using the DB class
//$users = DB::getInstance()->query('SELECT username FROM users');

//if($users->count()) {
//	foreach($users as $user) {
//		echo $user->username;
//	}
//}

DB::getInstance();


