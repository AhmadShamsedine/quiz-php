<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'];
$description = $data['description'];
$created_by = $data['created_by'];

$query = "INSERT INTO quizzes (title, description, created_by) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssi", $title, $description, $created_by);

if ($stmt->execute()) {
    echo json_encode(["message" => "Quiz created successfully"]);
} else {
    echo json_encode(["error" => "Quiz creation failed"]);
}
?>