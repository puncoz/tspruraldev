<?php 

include_once('../lib/core/init.inc.php');

$db = DB_Connect::getConnection();
$smarty = Smarty_Singleton::instance();
$smarty->assign('bla', date("YD"));
$smarty->display('index.tpl');

phpinfo();

