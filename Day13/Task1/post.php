<?php
header("Content-Type: application/json");
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $title = $data['title'] ?? null;
    $hours = $data['hours'] ?? null;
    $price = $data['price'] ?? null;

    if (!$title || !$hours || !$price) {
        echo json_encode(["status" => "error", "message" => "missing data"]);
        exit;
    }

    $sql = "INSERT INTO courses (title, hours, price)  VALUES ('$title', '$hours', '$price')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "inserted", "message" => "data entered successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "invalid request method"]);
}