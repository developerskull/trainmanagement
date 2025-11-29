<?php
$con = mysqli_connect("localhost", "root", "423301", "train_db");
if (!$con) { die("Connection failed: " . mysqli_connect_error()); }

$result = $con->query("SELECT * FROM trains ORDER BY train_name ASC");

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}

echo json_encode(['records' => $records], JSON_PRETTY_PRINT);

$con->close();
?>
