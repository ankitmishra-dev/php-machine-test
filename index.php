<?php 

require 'database-connection' . DIRECTORY_SEPARATOR . 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $statement = $conn->prepare("INSERT INTO students (name, class_division, roll_number) VALUES (?, ?, ?)");

    $statement->execute([$_POST['name'], $_POST['class_division'], $_POST['roll_number']]);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$students = $conn->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require realpath('views\create-student-form.html'); ?>

<h2>Student List</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Class/Division</th>
        <th>Roll Number</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($students as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['class_division']) ?></td>
        <td><?= htmlspecialchars($row['roll_number']) ?></td>
        <td>
            <a href="edit-student/edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete-student/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>