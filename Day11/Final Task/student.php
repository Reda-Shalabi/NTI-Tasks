<?php
class Student {
    public $name;
    public $email;
    public $age;
    private $isActive = false;

    public function __construct($name, $email, $age) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function activate() {
        $this->isActive = true;
    }

    public function getStatus() {
        return $this->isActive;
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تسجيل طالب</title>
</head>
<body>
  <form action="api.php" method="POST">
    <input type="text" name="name" placeholder="الاسم" required><br>
    <input type="email" name="email" placeholder="البريد الإلكتروني" required><br>
    <input type="number" name="age" placeholder="العمر" required><br>
    <button type="submit">إرسال</button>
  </form>
</body>
</html>
<?php
