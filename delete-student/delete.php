<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'database-connection' . DIRECTORY_SEPARATOR . 'db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $statement = $conn->prepare("DELETE FROM students WHERE id = ?");
    $statement->execute([$id]);
}

header('Location: /index.php');

exit;