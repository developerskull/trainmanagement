<?php
// Database connection
$con = mysqli_connect("localhost", "root", "423301", "train_db");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all trains sorted by train_name (A-Z)
$result = $con->query("SELECT * FROM trains ORDER BY train_name ASC");

// Prepare JSON output
$output = "";
while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($output != "") {
        $output .= ",";
    }
    $output .= '{"id":"' . $rs["id"] . '",';
    $output .= '"train_no":"' . $rs["train_no"] . '",';
    $output .= '"train_name":"' . $rs["train_name"] . '",';
    $output .= '"source":"' . $rs["source"] . '",';
    $output .= '"destination":"' . $rs["destination"] . '",';
    $output .= '"departure":"' . $rs["departure"] . '",';
    $output .= '"arrival":"' . $rs["arrival"] . '",';
    $output .= '"status":"' . $rs["status"] . '"}';
}

// Format and print JSON
$output = '{"records":[' . $output . ']}';
echo ($output);

// Close connection
$con->close();
?>
