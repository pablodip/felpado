<?php

namespace felpado;

foreach (felpado_functions() as $function) {
    require __DIR__ . '/functions/' . $function . '.php';
}

function felpado_functions() {
    return array_map(function ($file) {
        return substr(basename($file), 0, -4);
    }, glob(__DIR__ . '/functions/*.php'));
}

class value_rule
{
    private $callback;

    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    public function getCallback()
    {
        return $this->callback;
    }
}

class required extends value_rule
{
}
class optional extends value_rule
{
    private $default;

    public function __construct($callback, $default = null)
    {
        parent::__construct($callback);

        $this->default = $default;
    }

    public function getDefault()
    {
        return $this->default;
    }
}

class placeholder
{
    private static $instance;

    private function __construct()
    {
    }

    public static function create()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
