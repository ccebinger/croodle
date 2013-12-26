<?php

class result implements JsonSerializable
{
    protected $status = "200";
    protected $version = '';
    protected $id = '';
    protected $data = '';
    protected $errorMsg = '';

    public function __get($name)
    {
        if (!isset($this->$name)) {
            throw new Exception("try to get not defined property");
        }

        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (!isset($this->$name)) {
            throw new Exception("try to set not defined property");
        }

        switch ($name) {
            case 'status':
                if (!is_int($value)) {
                    throw new Exception ("wrong data type");
                }
                break;

            case 'data':
                if (!is_object($value) OR !is_a($value, 'Data')) {
                    throw new Exception ("wrong data type");
                }
                break;

            default:
                if (!is_string($value)) {
                    throw new Exception ("wrong data type");
                }
                break;
        }

        $this->$name = $value;
    }

    public function jsonSerialize() {
        $container = new stdClass();
        $container->version  = $this->version;
        $container->id       = $this->id;
        $container->data     = $this->data;
        $container->errorMsg = $this->errorMsg;

        return $container;
    }
}
?>
