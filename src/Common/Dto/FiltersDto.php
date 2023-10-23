<?php

class Filters
{
    private $data = [];

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function getAll()
    {
        return $this->data;
    }

    public function remove($key)
    {
        unset($this->data[$key]);
    }
}
