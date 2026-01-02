<?php

abstract class Controller
{
    protected function view($path, $data = [])
    {
        extract($data);
        require_once "../views/{$path}.php";
    }
}
