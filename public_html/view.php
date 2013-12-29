<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
require_once('..'.DS.'lib'.DS.'core'.DS.'init.inc.php');

$db = DB_Connect::getConnection();
$sql = "SELECT 
            `msg`, `timestamp`, `filename` 
        FROM 
            `sms`";
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($res as $r){

				echo $r['msg']. "<br>";
				echo $r['timestamp']."<br>";
				echo "<a href=\"upload/".$r['filename']."\" target=\"_blank\"> <img src=\"upload/".$r['filename']."\" height=150 width=150></a><br><br>";
			}
            
        } catch(Exception $e){
            self::$log = Logger::getLogger("viewSMS");
            self::$log->fatal($e->getMessage());
            die("Could not complete your request");
        }

