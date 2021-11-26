<?php

/**
 * Add session with given name and value and change location
 *
 * @param string  $sessionName 
 * @param any $sessionValue 
 * 
 * @return void
 */ 
function addSession(string $sessionName, $sessionValue): void{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION[$sessionName] = $sessionValue;
}

/**
 * Change location
 * 
 * @param string  $location default: ../public/index.php;
 * 
 * @return void
 */

function changeLocation(string $location = '../public/index.php'): void{
    header("Location: $location");
    exit();
}

function changeAmmountColor(string $ammount){
    if($ammount[0] === '-'){
        return '<span style="color: red">'. $ammount .'</span>';
    }else{
        return '<span style="color: green">'. $ammount .'</span>';
    }
}