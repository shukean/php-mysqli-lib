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

Test::begin();

$row = Test::delete_by_id(2);

var_dump($row);

//Test::rollback();




