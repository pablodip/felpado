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
    private $normalizer;

    public function __construct($params = array())
    {
        $this->validator = $this->getFirstParam($params, array('validator', 'v'));
        $this->normalizer = $this->getFirstParam($params, array('normalizer', 'n'));
    }

    public function getValidator()
    {
        return $this->validator;
    }

    public function getNormalizer()
    {
        return $this->normalizer;
    }

    protected function getFirstParam($params, $names)
    {
        foreach ($names as $name) {
            if (isset($params[$name])) {
                return $params[$name];
            }
        }
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

        $this->defaultValue = $this->getFirstParam($params, array('default_value', 'd'));
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

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
