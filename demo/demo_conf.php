<?php

$offset = 8;
date_default_timezone_set('Etc/GMT'.($offset > 0 ? '-' : '+' ).abs($offset));

/**
 * first key must be master mysql db config,
 * other configs are salves
 *
 */
$_mysql_config = [
    0 => [
        'host' => '',
        'user' => 'ceshi',
        'password' => 'ceshi2015',
        'dbname' => 'z2c',
        'port' => '3306',
        'charset' => 'utf8',
        'connection_timeout' => '3'
        //'socket' => '',
        //'flags' => ''
    ],
    1 => [
        'host' => '',
        'user' => 'ceshi',
        'password' => 'ceshi2015',
        'dbname' => 'z2c',
        'port' => '3306',
        'charset' => 'utf8',
        'connection_timeout' => '3'
        //'socket' => '',
        //'flags' => ''
    ],
    2 => [
        'host' => '',
        'user' => 'ceshi',
        'password' => 'ceshi2015',
        'dbname' => 'z2c',
        'port' => '3306',
        'charset' => 'utf8',
        'connection_timeout' => '3'
        //'socket' => '',
        //'flags' => ''
    ]
];


function mysql_log_warn($line, $file, $msg, $errno = 0, $params = []){
    echo sprintf("[%s:%d - %d]%s\n", $file, $line, $errno, $msg);
}

function mysql_log_error($line, $file, $msg, $errno = 0, $params = []){
    echo sprintf("[%s:%d - %d]%s\n", $file, $line, $errno, $msg);
}

function mysql_log_info($line, $file, $msg, $errno = 0, $params = []){
    echo sprintf("[%s:%d - %d]%s\n", $file, $line, $errno, $msg);
}

function mysql_log_debug($line, $file, $msg, $errno = 0, $params = []){
    echo sprintf("[%s:%d - %d]%s\n", $file, $line, $errno, $msg);
}

include './Mysql/Table.php';
include './Mysql/Db.php';
include './Mysql/Gconfig.php';

register_shutdown_function(function(){
    if (\Mysql\Db::getMasterTransNums() > 0){
        mysql_log_error(__LINE__, __FILE__, 'mysql have translate not commit or rollback, mysql lib will auto rollback');
        \Mysql\Db::freeMasterTransNotReleaseLinks();
    }
});

\Mysql\Db::initConfig($_mysql_config);


