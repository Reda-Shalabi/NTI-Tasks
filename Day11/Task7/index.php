<?php

class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function makeSound() {
        echo "Some generic animal sound<br>";
    }
}

class Dog extends Animal {

    public function makeSound() {
        echo "Woof<br>";
    }
}

$myDog = new Dog("Rex");
echo "Animal Name: " . $myDog->name . "<br>";
$myDog->makeSound();  
?>
