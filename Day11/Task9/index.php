<?php

trait Timestampable{
    public function currentTimestamp($time){
        echo"$time";
    }
}
class Order {
    use Timestampable;
}
class Invoice {
    use Timestampable;
}
$n=new Order();
$n->currentTimestamp("3:30 AM <br> 7/29/2025<br>");
$o=new Invoice();
$o->currentTimestamp("5:30 PM <br> 7/21/2023<br>");
?>