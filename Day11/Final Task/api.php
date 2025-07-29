<?php
include 'Student.php';

// تأكد أن البيانات جاءت بـ POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استقبل البيانات
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? 0;

    // أنشئ كائن الطالب وفعّله
    $student = new Student($name, $email, $age);
    $student->activate();
    $status = $student->getStatus();

    // أنشئ متغير welcome
    $welcome = "أهلاً بك يا {$student->name} في منصتنا!";

    // اطبع النتيجة كـ JSON
    echo json_encode([
        'status' => $status,
        'welcome' => $welcome
    ]);
} else {
    echo json_encode([
        'status' => false,
        'welcome' => 'يجب إرسال البيانات باستخدام POST'
    ]);
}
?>
