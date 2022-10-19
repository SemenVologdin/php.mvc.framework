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
        $fnCallBack = $this->routers[$strMethod][$strPath];
        if( is_callable( $fnCallBack ) ){
            return $fnCallBack();
        }elseif ( is_string($strMethod) ){
            return $this->renderView($fnCallBack);
        }
        return '<h1>Method Not Found!</h1>';
    }

    public function renderView( string $strMethod )
    {
        include_once Application::$ROOT_PATH . '/View/'. $strMethod . '.php';
    }

    protected function renderOnlyView()
    {

    }
}