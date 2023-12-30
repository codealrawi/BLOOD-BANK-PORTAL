<?php
header('Content-Type: application/json');

$servername = 'localhost';
$username = 'alrawi_clickgame';
$password = 'T&6GxQaJ';
$dbname = 'alrawi_clickgame';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch the top 10 countries by score in descending order.
$sql = 'SELECT * FROM countries ORDER BY score DESC LIMIT 10';
$result = $conn->query($sql);

$countries = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $countries[] = [
            'name' => $row['name'],
            'score' => $row['score'],
        ];
    }
}

$conn->close();

echo json_encode($countries);
?>
