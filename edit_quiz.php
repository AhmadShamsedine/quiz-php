<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$quiz_id = $data['quiz_id'];
$title = $data['title'];
$description = $data['description'];

$query = "UPDATE quizzes SET title = ?, description = ? WHERE quiz_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssi", $title, $description, $quiz_id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Quiz updated successfully"]);
} else {
    echo json_encode(["error" => "Quiz update failed"]);
}
?>