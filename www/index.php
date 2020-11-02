<?php
// echo json_encode($_SERVER);die;
$pdir=call_user_func(function () {
    $temp = explode(PATH_SEPARATOR, get_include_path());
    $temp[] = __DIR__;
    set_include_path(implode(PATH_SEPARATOR, $temp));
    $temp=explode(DIRECTORY_SEPARATOR,__DIR__);
    unset($temp[count($temp) -1]);
    return implode(DIRECTORY_SEPARATOR,$temp);
});
require_once $pdir.DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

$router=\etutorials\router::create();

$view=\etutorials\view::create("views");
echo $view->render($router->getData());
