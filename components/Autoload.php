<?php

spl_autoload_register('autoloader');

function autoloader($class_name){
    $paths = [
        "../models/",
        "../components/",
        "../controllers/"
    ];
    
    foreach($paths as $pathToClass){
        $pathToClass = $pathToClass . $class_name . '.php';
        if(is_file($pathToClass)){
            include_once($pathToClass);
        }
    }
}