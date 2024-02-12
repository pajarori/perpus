<?php

class BaseCore
{
    protected $data;

    public function data()
    {
        return $this->data;
    }

    public function first()
    {
        return $this->data[0];
    }

    public function count()
    {
        return count($this->data);
    }
}
