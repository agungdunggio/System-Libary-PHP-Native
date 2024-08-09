<?php 


// require __DIR__ . '/env.php';
require __DIR__ . '/../env.php';

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



function query($sql, $params = [])
{
    global $conn;
    
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    if ($params) {
        $types = str_repeat('s', count($params)); 
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $data = $result->fetch_all(MYSQLI_ASSOC);
    
    $stmt->close();

    return $data;
}
