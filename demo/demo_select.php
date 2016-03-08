<?php

include './demo_conf.php';

class Test extends \Mysql\Table{

    public static function table(){
        return 'test_t';
    }

    public static function one_by_id($id){
        return \Mysql\Db::one(self::slave(), 'select * from %t where id = %d', [self::table(), $id]);
    }

    public static function like_by_name($name){
        return \Mysql\Db::more(self::slave(), 'select * from %t where name like %s', [self::table(), "%$name%"]);
    }

    public static function all_index_id(){
        return \Mysql\Db::more(self::slave(), 'select * from %t where 1', [self::table()], 'id');
    }
}

print_r(Test::one_by_id(2));
print_r(Test::like_by_name('te'));
print_r(Test::all_index_id());



