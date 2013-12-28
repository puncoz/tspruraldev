<?php

class SMS
{
	private $from;
	private $keyword;
	private $msg;
	private $db;

	function __construct(){
		$this->db = DB_Connect::getConnection();
	}

	function collectMsg($from, $keyword, $msg){
	    $sql = "INSERT INTO 
				    `sms` (`from`, `keyword`, `msg`) 
				VALUES 
				    (:from, :keyword, :msg)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":from", $from, PDO::PARAM_STR);
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->bindParam(":msg", $msg, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closecursor();
            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
            return $e->getMessage();
        }
    }
}
