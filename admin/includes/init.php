<?php

defineD('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'home' . DS . 'petrero' . DS . 'www' . DS . 'PHP-OOP-Gallery-Beginners');

defined('INCLUDES_PATH') ? NULL : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes' . DS);

require_once INCLUDES_PATH . "functions.php";
require_once INCLUDES_PATH . "new_config.php";
require_once INCLUDES_PATH . "database.php";
require_once INCLUDES_PATH . 'db_object.php';
require_once INCLUDES_PATH . "user.php";
require_once INCLUDES_PATH . "photo.php";
require_once INCLUDES_PATH . "session.php";