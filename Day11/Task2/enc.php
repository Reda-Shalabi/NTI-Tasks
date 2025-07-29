<?php
class Employee{
    public $name="hazem";
    protected $salary=2000;
    private $bonus=50;
    
    public function showAll(){
        echo "name: ".$this->name."<br>";
        echo "salary: ".$this->salary."<br>";
        echo "bonus: ".$this->bonus;
    }


}

$empl= new Employee();

echo $empl->showAll();



