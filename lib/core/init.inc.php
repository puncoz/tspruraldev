<?php

/**
 * Error reporting
 */
error_reporting(E_ALL | E_STRICT);

/**
 * DIRECTORY_SEPERATOR \ for Windows and / for UNIX a like systems
 */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

/**
 * LIB directory
 */
defined('LIB_PATH') ? null : define('LIB_PATH', dirname(__DIR__));

/**
 * Auto load function for classes
 */
spl_autoload_register (function ($class) {
    $filename = LIB_PATH.DS.'class'.DS.strtolower($class).'.class.php';
    if(file_exists($filename)){
        include_once $filename;
    }
});

/**
 * Log for PHP
 */
require_once(LIB_PATH.DS.'log4php'.DS.'Logger.php');
Logger::configure(LIB_PATH.DS.'config'.DS.'log4php.inc.php');


/**
 * Load smarty templating library
 */
require_once(LIB_PATH.DS.'smarty'.DS.'Smarty.class.php');
