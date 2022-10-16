<?php

namespace App\Core;

class Router
{

    protected array $routers = array();
    protected Request $request;

    public function __construct( Request $obRequest )
    {
        $this->request = $obRequest;
    }

    public function get($strPath, $callback)
    {
        $this->routers['GET'][$strPath] = $callback;
    }

    public function resolve()
    {
        $strPath = $this->request->getPath();
        $strMethod = $this->request->getMethod();
        if( !is_callable( $this->routers[$strMethod][$strPath] ) ){
            echo '<h1>Method Not Found!</h1>';
            die();
        }
        echo $this->routers[$strMethod][$strPath]();
    }
}