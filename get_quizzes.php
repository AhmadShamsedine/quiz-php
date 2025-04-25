<?php
include 'db.php';

$query = "SELECT * FROM quizzes";
$result = $conn->query($query);

$quizzes = [];
while ($row = $result->fetch_assoc()) {
    $quizzes[] = $row;
}

echo json_encode($quizzes);
?>