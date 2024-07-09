<?php

interface Car
{
    public function typeOfCar();

    public function drivingRange();
}

class Toyota implements Car
{
    public function typeOfCar(): Toyota
    {
        echo "Toyota Car is created";
        return $this;
    }

    public function drivingRange(): Toyota
    {
        echo __CLASS__ . "Car has a driving range of 120 km";
        return $this;
    }
}

class Honda implements Car
{
    public function typeOfCar(): void
    {
        echo "Honda Car is created";
    }

    public function drivingRange(): void
    {
        echo __CLASS__ . " Car has a driving range of 150 km";
    }
}

class CarFactory
{
    /**
     * @throws Exception
     */
    public static function create($value = "")
    {
        if (empty($value)) {
            throw new Exception("Invalid Car Type");
        } else {
            $carClass = ucfirst($value);
            if (class_exists($carClass)) {
                return new $carClass();
            } else {
                throw new Exception(strtoupper($value) . " Type Not Found");
            }
        }
    }
}

try {
    $car = CarFactory::create("Toyota")->typeOfCar()->drivingRange();
} catch (Exception $e) {
    echo $e->getMessage();
}