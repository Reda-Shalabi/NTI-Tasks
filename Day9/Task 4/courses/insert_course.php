<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "tranning_system");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $title = $_POST['title'] ?? null;
    $price = $_POST['price'] ?? null;
    $hours = $_POST['hours'] ?? null;

    if ($title && $price && $hours) {
        $stmt = $conn->prepare("INSERT INTO courses (title, price, hours) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $title, $price, $hours);
        $stmt->execute();
        $stmt->close();
        header("Location: courses.php");
        exit();
    } else {
        echo "Missing form data. Please go back and fill in all fields.";
    }
} else {
    echo "Invalid access. Please submit the form.";
}
?>
