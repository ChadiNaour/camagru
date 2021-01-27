<?php

$hostname = 'http://'.getenv('HTTP_HOST');
    define('DB_HOST', 'mysql:3306');
    define('DB_USER', 'root');
    define('DB_PWD', 'tiger');
    define('DB_NAME', 'camagru_db');

    define('CAMAGRU_ROOT', dirname(dirname(__FILE__)));
    define('URL_ROOT', $hostname.'/camagru');
    define('SITE_NAME', 'Camagru');
