<?php 

$conn = mysqli_connect("localhost", "root", "", "system_library_php_native");

function query($query): array {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}