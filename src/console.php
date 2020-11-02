<?php
namespace etutorials;
class console{
    public static function log($var){
        echo json_encode($var);
        die;
    }
}