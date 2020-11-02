<?php
namespace etutorials;

class db extends \optiwariindia\database
{
    private static $instance=null;
    public static function init()
    {
        if (!isset(self::$instance)) {
            $config=json::parse(file_get_contents(config::path().DIRECTORY_SEPARATOR."config.json"),1);
            self::$instance = new db($config['db']);
        }

        return self::$instance;
    }
    private function __Construct($config){
        parent::__Construct($config);
        parent::mode(3);
    }
}
