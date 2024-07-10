<?php

abstract class AutoGearCar
{
}

class ToyotaCompany extends AutoGearCar
{
    public function getName(): void
    {
        echo __CLASS__ . " is creating an automatic Toyota car.\n";
    }
}

class HondaCompany extends AutoGearCar
{
    public function getName(): void
    {
        echo __CLASS__ . " is creating an automatic Honda car.\n";
    }
}

abstract class ManualGearCar
{
}

class FordCompany extends ManualGearCar
{
    public function getName(): void
    {
        echo __CLASS__ . " is creating a manual Ford car.\n";
    }
}

class ChevroletCompany extends ManualGearCar
{
    public function getName(): void
    {
        echo __CLASS__ . " is creating a manual Chevrolet car.\n";
    }
}

abstract class CarFactory
{
    abstract function createCarOne();

    abstract function createCarTwo();
}

class AutoCarFactory extends CarFactory
{
    public function createCarOne(): ToyotaCompany
    {
        return new ToyotaCompany();
    }

    public function createCarTwo(): HondaCompany
    {
        return new HondaCompany();
    }

}

class ManualCarFactory extends CarFactory
{
    public function createCarOne(): FordCompany
    {
        return new FordCompany();
    }

    public function createCarTwo(): ChevroletCompany
    {
        return new ChevroletCompany();
    }
}

$autoCarFactory = new AutoCarFactory();
$toyota = $autoCarFactory->createCarOne();
$honda = $autoCarFactory->createCarTwo();

$manualCarFactory = new ManualCarFactory();
$ford = $manualCarFactory->createCarOne();
$chevrolet = $manualCarFactory->createCarTwo();

$toyota->getName();
echo "<br>";
$ford->getName();