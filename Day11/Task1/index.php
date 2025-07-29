<?php
class Book {
    public $title;
    public function read() { 
        echo "You have read $this->title ";
    }
}

 $book = new book();
 $book->title ="Harry potter";
 $book->read();
 
?>