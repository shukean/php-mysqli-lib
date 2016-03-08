<?php

include './demo_conf.php';

class Test extends \Mysql\Table{

    public static function table(){
        return 'test_t';
    }

    public static function update_name_by_id($name, $id){
        return \Mysql\Db::update(self::master(), self::table(), ['name' => $name], ['id' => $id], true);
    }
}

$row = Test::update_name_by_id('test0000', 2);

var_dump($row);




