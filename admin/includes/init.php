<?php

defineD('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'home' . DS . 'petrero' . DS . 'www' . DS . 'PHP-OOP-Gallery-Beginners');

defined('INCLUDES_PATH') ? NULL : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');

require_once "functions.php";
require_once "new_config.php";
require_once "database.php";
require_once 'db_object.php';
require_once "user.php";
require_once "photo.php";
require_once "session.php";