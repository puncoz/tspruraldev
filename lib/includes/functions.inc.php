<?php

function validPhone($phone){
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if(strlen($phone) === 10) {
        return $phone; 
    } else {
        return new Exception("Invalid! Phone number");
    }
}
