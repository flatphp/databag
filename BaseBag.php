<?php namespace Flatphp\Databag;

class BaseBag implements \ArrayAccess, \IteratorAggregate, \JsonSerializable
{
    protected $data = [];

    public function __construct(array $data = [])
    {
        $this->set($data);
        $this->init();
    }

    public function init()
    {
    }

    public function set($data)
    {
        foreach ($data as $k=>$v) {
            $this->setItem($k, $v);
        }
        return $this;
    }

    public function setItem($key, $value)
    {
        $method = 'set'. str_replace('_', '', ucwords($key, '_'));
        if (method_exists($this, $method)) {
            $this->$method($value);
        } else {
            $this->fillData($key, $value);
        }
        return $this;
    }

    protected function fillData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getValue($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    public function __set($name, $value)
    {
        $this->setItem($name, $value);
    }

    public function __get($name)
    {
        return $this->getValue($name);
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function jsonSerialize()
    {
        return $this->data;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function toJson()
    {
        return json_encode($this->jsonSerialize(), JSON_UNESCAPED_UNICODE);
    }
}