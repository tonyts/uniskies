<?php

define("TF_PATH",dirname(__FILE__).DIRECTORY_SEPARATOR.'TFCore'.DIRECTORY_SEPARATOR);
define("APP_PATH",dirname(__FILE__).DIRECTORY_SEPARATOR);

include_once 'TFCore'.DIRECTORY_SEPARATOR.'TFApplication.php';

try{
    TFApplication::Main();
}
catch(Exception $ex){
    TF_dump($ex);
}