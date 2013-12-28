<?php 

include_once('../lib/core/init.inc.php');

$db = DB_Connect::getConnection();
#$smarty = Smarty_Singleton::instance();
#$smarty->assign('bla', date("YD"));
#$smarty->display('index.tpl');

#phpinfo();

$from = $_GET['from'];
$keyword = $_GET['keyword'];
$msg = $_GET['text'];

$sms = new SMS;
$m = $sms->collectMsg($from, $keyword, $msg);
if ($m){
	echo "thank u";
} else {
	echo $m;
}


