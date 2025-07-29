<?php

abstract class Shape {
    abstract public function draw();
}
class Rectangle extends Shape {
    public function draw() {
        echo "Drawing a Regtangle<br>";
    }
}
class Circle extends Shape {
    public function draw() {
        echo "Drawing a Circle";
    }
}

$draw=[
    new Rectangle(),
    new Circle
];
foreach ($draw as $d){
    $d->draw();
}



?>