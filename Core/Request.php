<?php

namespace App\Core;

class Request
{
    public function getPath(): string
    {
        $strPath = $_SERVER['REQUEST_URI'] ?: '/';
        return explode('?', $strPath)[0];
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}