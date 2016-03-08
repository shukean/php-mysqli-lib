<?php

include './demo_conf.php';

class Test extends \Mysql\Table{

    public static function table(){
        return 'test_t';
    }

    public static function delete_by_id($id){
        return \Mysql\Db::delete(self::master(), self::table(), ['id' => $id], true);
    }
}

$row = Test::delete_by_id([
    'name' => 'test02',
    'test01' => 'test01'
]);

var_dump($row);




