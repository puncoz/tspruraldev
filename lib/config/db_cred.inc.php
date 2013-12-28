<?php

namespace DB_Cred;

/**
 * Create an empty array to store constants
 */
$C = array();

/**
 * The database host URL
 */
$C['DB_HOST'] = 'sql4.freemysqlhosting.net';

/**
 * The database username
 */
$C['DB_USER'] = 'sql425764';

/**
 * The database passowrd
 */
$C['DB_PASS'] = 'jN6%iR3!';

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
