<?php
session_start();
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    $response = ['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error];
    echo json_encode($response);
    exit();
}

// Get filter values from the request
$color = isset($_GET['color']) ? $_GET['color'] : '';
$size = isset($_GET['size']) ? $_GET['size'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';

// Build SQL query with conditions based on filters
$sql = "SELECT * FROM products WHERE sellerid='{$_SESSION['sid']}'";

if ($color) {
    $sql .= " AND colors LIKE '%$color%'";
}
if ($size) {
    $sql .= " AND sizes LIKE '%$size%'";
}
if ($min_price) {
    $sql .= " AND price >= $min_price";
}
if ($max_price) {
    $sql .= " AND price <= $max_price";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'colors' => $row['colors'],
            'sizes' => $row['sizes'],
            'image_path' => $row['image_path']
        ];
    }
    $response = ['success' => true, 'products' => $products];
} else {
    $response = ['success' => false, 'message' => 'No products found.'];
}

$conn->close();

echo json_encode($response);
?>
