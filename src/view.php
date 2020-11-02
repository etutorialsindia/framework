<?php
namespace etutorials;
class view{
    private static $instance;
    private static $twig;
    public static function create($view)
    {
        if (!isset(self::$instance)) {
            self::$instance=new view($view);
        }
        return self::$instance;
    }
    private function __Construct($viewpath)
    {
        $loader = new \Twig\Loader\FilesystemLoader($viewpath);
        $twig = new \Twig\Environment($loader, ['debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        self::$twig = $twig;
    }
    public function render($data){
        $twig=self::$twig;
        $template=router::getTemplate();
        
        return $twig->render($template.".twig",$data);
    }
}