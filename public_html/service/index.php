<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
require_once('..'.DS.'..'.DS.'lib'.DS.'core'.DS.'init.inc.php');
$purifier = new HTMLPurifier();

$get = array('from', 'keyword', 'text');
$status = true;
foreach($get as $param){
    if(!isset($_GET[$param])){
        $status = false;
        break;
    } else {
        $$param = $purifier->purify($_GET[$param]);
    }
}

if ($status) {
    $sms = new SMS($from, $keyword, $text);
    $m = $sms->processMsg();
    echo $m;
} else {
    echo 'Hack Attempt?';
}
