<?php

class Data
{
    protected $from;
    protected $msg;
    protected $timestamp;

    public function __construct($from, $msg, $timestamp){ 
        $this->from = $from;
        $this->msg = $msg;
        $this->timestamp = $timestamp;
    }

    protected function validData(){
        $this->from = preg_replace('/[^0-9]/', '', $this->from);
        if(strlen($this->from) === 10) {
            return true; 
        } else {
            return new Exception("Invalid! Phone number");
        }
    }
}
