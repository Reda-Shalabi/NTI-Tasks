<?php

// الكلاس الأساسي Vehicle
class Vehicle {
    public $make;
    public $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    public function info() {
        return "Make: $this->make, Model: $this->model";
    }
}

class Car extends Vehicle {
    public $fuelType;

    public function __construct($make, $model, $fuelType) {
        parent::__construct($make, $model);
        $this->fuelType = $fuelType;
    }

    public function info() {
        return parent::info() . ", Fuel Type: $this->fuelType";
    }
}

$myCar = new Car("Toyota", "Corolla", "Petrol");
echo $myCar->info();

?>
