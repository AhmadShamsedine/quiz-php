<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$question_id = $data['question_id'];
$question_text = $data['question_text'];
$correct_answer = $data['correct_answer'];

$query = "UPDATE questions SET question_text = ?, correct_answer = ? WHERE question_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssi", $question_text, $correct_answer, $question_id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Question updated successfully"]);
} else {
    echo json_encode(["error" => "Question update failed"]);
}
?>