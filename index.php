<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/init.php';

echo Config::get('mysql/host'); // 127.0.0.1