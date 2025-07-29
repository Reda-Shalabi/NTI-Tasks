<?php

abstract class Employee{
    public $salperhpur =50;
    abstract public function calsalary($a);
}
class HourlyEmployee extends Employee{
    public function calsalary($hours){
         $cal= ($this->salperhpur) *( $hours);
        echo "Your salary is: $cal"; 
    }
}
$as=new HourlyEmployee();
$as->calsalary(400);

?>