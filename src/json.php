<?php 
namespace etutorials;
class json{
    public static function parse($data){
        return json_decode($data,1);
    }
    public static function encode($data){
        return json_encode($data);
    }
}