<?php

class SMS
{
    private $db;
    private $log;
    private $msg;
    private $text;
    private $from;
    private $keyword;

    function __construct($from, $keyword, $msg){
        $msg = trim($msg);
        $this->msg = $msg;
        $this->from = $from;
        $this->keyword = $keyword;
        $this->text = $keyword . " " . $msg;
        $this->db = DB_Connect::getConnection();
    }

    private function validPhone(){
        $this->from = preg_replace('/[^0-9]/', '', $this->from);
        if(strlen($this->from) === 10) {
            return true; 
        } else {
            return new Exception("Invalid! Phone number");
        }
    }

    public function processMsg(){
        $msg = $this->validPhone();
        if($msg === true){
            $this->collectMsg();
            if(strtolower($this->keyword) == "fund"){
                $vdcCode = preg_replace('/[^0-9]/', '', $this->msg);

                if(empty($vdcCode)){
                    return "Invalid! VDC Code";
                }

                $sql = "SELECT 
                            `project_name`, `status`, `commitment_amount` 
                        FROM 
                            `fundings` 
                        WHERE
                            `vdc_code`=:vdcCode LIMIT 1";
                        try {
                            $stmt = $this->db->prepare($sql);
                            $stmt->bindParam(":vdcCode", $vdcCode, PDO::PARAM_INT);
                            $stmt->execute();
                            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $res = array_pop($res);
                            $stmt->closeCursor();
                            if($stmt->rowCount() <= 0){
                                return "Invalid! VDC Code";
                            }else{
                                return "NRs. ".$res['commitment_amount']." has been commited to project \"".$res['project_name']."\". Current status: ".$res['status'];
                            }
                        } catch(Exception $e){
                            self::$log = Logger::getLogger(__CLASS__);
                            self::$log->fatal($e->getMessage());
                            die("Could not complete your request");
                        }
                
            } else {
                return "Your message has been posted. Thank you";
            }
        } else {
            return "Invalid! Phone number";
        }
    }

    function collectMsg(){
        $sql = "INSERT INTO 
                    `sms` (`from`, `msg`) 
                VALUES 
                    (:from, :msg)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":from", $this->from, PDO::PARAM_STR);
            $msg = $this->keyword." ".$this->msg; 
            $stmt->bindParam(":msg", $msg,  PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closecursor();
        } catch(Exception $e){
            self::$log = Logger::getLogger(__CLASS__);
            self::$log->fatal($e->getMessage());
            die("Could not complete your request");
        }
    }
}
