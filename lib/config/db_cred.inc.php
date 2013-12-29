<?php

namespace DB_Cred;

/**
 * Create an empty array to store constants
 */
$C = array();

/**
 * The database host URL
 */
$C['DB_HOST'] = 'localhost';

/**
 * The database username
 */
$C['DB_USER'] = 'admin';

/**
 * The database passowrd
 */
$C['DB_PASS'] = 'logadmin';

/**
 * The name of the datbase to work with
 */
$C['DB_NAME'] = 'tsprd';

/**
 * Define constatns for configuration info
 */
foreach($C as $name => $val){
    defined(__NAMESPACE__.'\\'.$name) ? null : define(__NAMESPACE__.'\\'.$name, $val);
}
