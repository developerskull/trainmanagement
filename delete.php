<?php
// Database connection
$con = mysqli_connect("localhost", "root", "423301", "train_db");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get JSON data from AngularJS
$data = json_decode(file_get_contents("php://input"));

// Extract ID
$id = $data->id;

// Prepare and execute delete query
$query = "DELETE FROM trains WHERE id='$id'";

if (mysqli_query($con, $query)) {
    echo "✅ Train deleted successfully.";
} else {
    echo "❌ Failed to delete train.";
}

// Close connection
mysqli_close($con);
?>
