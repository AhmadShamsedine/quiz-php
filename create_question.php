<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$quiz_id = $data['quiz_id'];
$question_text = $data['question_text'];
$question_type = $data['question_type'];
$correct_answer = $data['correct_answer'];

$query = "INSERT INTO questions (quiz_id, question_text, question_type, correct_answer) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("isss", $quiz_id, $question_text, $question_type, $correct_answer);

if ($stmt->execute()) {
    echo json_encode(["message" => "Question created successfully"]);
} else {
    echo json_encode(["error" => "Question creation failed"]);
}
?>