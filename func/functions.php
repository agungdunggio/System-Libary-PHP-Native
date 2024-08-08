<?php 

$conn = mysqli_connect("localhost", "root", "", "system_library_php_native");

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
