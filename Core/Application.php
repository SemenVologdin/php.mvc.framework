<?php

namespace App\Core;

class Application
{
    public Router $router;
    public Request $request;
    public static string $ROOT_PATH;
    public function __construct( $strRootPath )
    {
        static::$ROOT_PATH = $strRootPath;
        $this->request = new Request();
        $this->router = new Router( $this->request );
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}