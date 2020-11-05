<?php
namespace etutorials;
class course extends db{
    private static $table="course";
    public static function list(){
        $db=db::init();
        $temp=$db->select(self::$table,"id,name,summary,thumbnail,fee");
        return $temp;
    }
}