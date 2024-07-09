<?php

interface Car
{

}

class Toyota implements Car
{
    public function getName(): void
    {
        echo __CLASS__ . "<br>";
    }
}

class Honda implements Car
{
    public function getName(): void
    {
        echo __CLASS__ . "<br>";
    }
}

abstract class Factory
{
    abstract function create($type);
}

class Manufacturer extends Factory
{
    public function create($type): Toyota|Honda
    {
        if ($type === "Toyota") {
            return new Toyota();
        } else
            return new Honda();
    }
}

function carOutput(Car $car): void
{
    $car->getName();
}

$car = new Manufacturer();
$toyota = $car->create("Toyota");
$honda = $car->create("Honda");

carOutput($toyota);