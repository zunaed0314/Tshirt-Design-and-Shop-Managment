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
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Get filters from URL parameters
$color = isset($_GET['color']) ? $conn->real_escape_string($_GET['color']) : '';
$size = isset($_GET['size']) ? $conn->real_escape_string($_GET['size']) : '';
$minPrice = isset($_GET['minPrice']) ? (int)$_GET['minPrice'] : '';
$maxPrice = isset($_GET['maxPrice']) ? (int)$_GET['maxPrice'] : '';

$id = $_SESSION['sid'];
$sql = "SELECT * FROM products WHERE sellerid='$id'";

// Apply filters
if (!empty($color)) {
    $sql .= " AND FIND_IN_SET('$color', colors)";
}
if (!empty($size)) {
    $sql .= " AND FIND_IN_SET('$size', sizes)";
}
if (!empty($minPrice)) {
    $sql .= " AND price >= $minPrice";
}
if (!empty($maxPrice)) {
    $sql .= " AND price <= $maxPrice";
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
    echo json_encode(['success' => true, 'products' => $products]);
} else {
    echo json_encode(['success' => false, 'message' => 'No products found.']);
}

$conn->close();
?>
