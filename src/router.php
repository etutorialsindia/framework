<?php
namespace etutorials;

class router
{
    private static $instance;
    private static $templates = [];
    private static function __Constructor()
    {

    }
    public static function create()
    {
        if (!isset(self::$instance)) {
            self::$instance = new router();
        }
        return self::$instance;
    }
    public function getTemplate()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = explode(DIRECTORY_SEPARATOR, strtolower($_SERVER['REQUEST_URI']));
        if (isset($path[1])) {
            $path[1] = ($path[1] == "") ? "index" : $path[1];
            $temp = self::$templates[$method][$path[1]] ?? self::$templates[$path[1]] ?? $path[1];
        } else {
            $temp = "index";
        }
        return $temp;
    }
    public function setTemplate($path, $template = "index", $method = "")
    {
        if ($method != "") {
            self::$templates[$method][$path] = $template;
        } else {
            self::$templates[$path] = $template;
        }
    }
    public function getData()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = explode(DIRECTORY_SEPARATOR, strtolower($_SERVER['REQUEST_URI']));
        $data = config::get();
        $data['courses']=course::list();
        if (empty($path[1])) {
            return $data;
        }

        if (class_exists("etutorials\\" . $path[1])) {
            $data = call_user_func_array(["etutorials\\" . $path[1], $path[2]??"init"], $data);
        }
        return $data;
    }
}
