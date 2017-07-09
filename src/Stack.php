<?php

class Stack
{
    private $stack = [];

    public function __construct()
    {
        $this->stack = [];
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }

    public function size()
    {
        return count($this->stack);
    }

    public function push($item)
    {
        $this->stack[] = $item;
    }

    public function pop()
    {
        if (empty($this->stack)) {
            throw new \LogicException('try to pop item from empty stack.');
        }
        return array_pop($this->stack);
    }

    public function top()
    {
        if (empty($this->stack)) {
            throw new \LogicException('try to top item from empty stack.');
        }
        return end($this->stack);
    }
}
