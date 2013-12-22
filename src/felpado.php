<?php

namespace felpado;

foreach (felpado_functions() as $function) {
    require __DIR__ . '/functions/' . $function . '.php';
}

function felpado_functions() {
    $basename = function ($file) {
        return substr(basename($file), 0, -4);
    };

    return array_map($basename, glob(__DIR__ . '/functions/*.php'));
}

class param_rule
{
    private $validator;

    public function __construct(array $params)
    {
        $this->validator = isset($params['validator']) ? $params['validator'] : null;
    }

    public function getValidator()
    {
        return $this->validator;
    }
}

class required extends param_rule
{
}
class optional extends param_rule
{
    private $defaultValue;

    public function __construct(array $params)
    {
        parent::__construct($params);

        $this->defaultValue = isset($params['defaultValue']) ? $params['defaultValue'] : null;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
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
