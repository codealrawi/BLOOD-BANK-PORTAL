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

$sql = 'SELECT * FROM countries';
$result = $conn->query($sql);

$countries = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $countries[] = [
            'id' => $row['id'],
            'name' => $row['name'],
        ];
    }
}

$conn->close();

echo json_encode($countries);
?>
