<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$quiz_id = $data['quiz_id'];

$query = "DELETE FROM quizzes WHERE quiz_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $quiz_id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Quiz deleted successfully"]);
} else {
    echo json_encode(["error" => "Quiz deletion failed"]);
}
?>