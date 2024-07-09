<?php

class Helper
{
    public function __construct()
    {
        echo __CLASS__ . " is created";
    }

    public function toDoSomething($value): void
    {
        echo __CLASS__ . " is doing something {$value}";
    }
}