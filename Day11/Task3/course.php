<?php
class Course {
    private $title;
    private $instructor;

    public function __construct($title, $instructor) {
        $this->title = $title;
        $this->instructor = $instructor;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getInstructor() {
        return $this->instructor;
    }

    public function describe() {
        echo "Course Title: " . $this->getTitle() . "<br>";
        echo "Instructor: " . $this->getInstructor() . "<br>";
    }
}

$course1 = new Course("React & PHP Full Stack", "Eng. Reda");
$course1->describe();
?>
