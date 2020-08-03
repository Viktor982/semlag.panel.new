<?php


namespace NPCore\Config;

use ArrayAccess;

class ConfigArray implements ArrayAccess
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * ConfigArray constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = [];
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return in_array($offset, $this->items);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        $this->items[$offset] = null;
    }
}