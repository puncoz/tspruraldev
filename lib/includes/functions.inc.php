<?php

/**
 * Auto load function for classes
 */
spl_autoload_register (function ($class) {
    $filename = LIB_PATH.DS.'class'.DS.strtolower($class).'.class.php';
    if(file_exists($filename)){
        include_once $filename;
    }
});

