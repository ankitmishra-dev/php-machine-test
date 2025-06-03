<?php
require dirname(__DIR__) . '/database-connection/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: /index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE students SET name = ?, class_division = ?, roll_number = ? WHERE id = ?");
    $stmt->execute([$_POST['name'], $_POST['class_division'], $_POST['roll_number'], $id]);

    header("Location: /index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    echo "Student not found.";
    exit;
}

require dirname(__DIR__) . '/views/edit-student-form.html';
