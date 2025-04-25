<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$question_id = $data['question_id'];

$query = "DELETE FROM questions WHERE question_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $question_id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Question deleted successfully"]);
} else {
    echo json_encode(["error" => "Question deletion failed"]);
}
?>