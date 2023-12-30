<?php
header('Content-Type: application/json');

$servername = 'localhost';
$username = 'alrawi_clickgame';
$password = 'T&6GxQaJ';
$dbname = 'alrawi_clickgame';

$input = json_decode(file_get_contents('php://input'));
$countryId = $input->countryId;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Simulate a click and update the country's score.
$sql = "UPDATE countries SET score = score + 1 WHERE id = $countryId";
$result = $conn->query($sql);

if ($result) {
    $clicks = $conn->affected_rows;

    echo json_encode(['clicks' => $clicks]);
} else {
    echo json_encode(['clicks' => 0]);
}

$conn->close();
?>
