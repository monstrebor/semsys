<?php

class EmailView
{
    public static function render($view, $data = [])
    {
        extract($data);
        ob_start();
        require __DIR__ . "/../views/emails/{$view}.php";
        return ob_get_clean();
    }
}
