<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://localhost/project/");
    $config['dbname'] = 'chat-system';
    $config['host'] =   'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}else{
    define("BASE_URL", "http://localhost/project/");
    $config['dbname'] = 'chat-system';
    $config['host'] =   'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}

global $db;
try{

    $pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);

}catch(PDOException $e){

    echo "ERRO: ".$e->getMessage();
    exit;

} 