<?php
namespace etutorials;

class config
{
    private static $instance;
    private static $config;
    private static function __Constructor()
    {

    }
    public static function create()
    {
        if (!isset(self::$instance)) {
            self::$instance = new router();
        }
        self::$config = json_decode(file_get_contents("config/project.json"), true);
        return self::$instance;
    }
    public static function get($var = "")
    {
        self::create();
        if ($var != "") {
            return self::$config[$var];
        }

        return self::$config;
    }
    public static function path(){
        $path=explode(DIRECTORY_SEPARATOR,__DIR__);
        $path[count($path) - 1]='config';
        return implode(DIRECTORY_SEPARATOR,$path);
    }
}
