<?php

include './demo_conf.php';

class Test extends \Mysql\Table{

    public static function table(){
        return 'test_t';
    }

    public static function insert($data){
        return \Mysql\Db::insert(self::master(), self::table(), $data, true);
    }

    public static function replace($data){
        return \Mysql\Db::replace(self::master(), self::table(), $data);
    }
}

$row = Test::insert([
    'name' => 'test02',
    'test01' => 'test01'
]);

var_dump($row);

$row = Test::replace([
    'name' => 'test02',
    'test01' => 'test01',
    'id' => 2,
]);

var_dump($row);


