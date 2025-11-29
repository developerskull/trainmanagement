<?php
$con = mysqli_connect("localhost", "root", "423301", "train_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$data = json_decode(file_get_contents("php://input"));

$train_no = mysqli_real_escape_string($con, $data->train_no);
$train_name = mysqli_real_escape_string($con, $data->train_name);
$source = mysqli_real_escape_string($con, $data->source);
$destination = mysqli_real_escape_string($con, $data->destination);
$departure = mysqli_real_escape_string($con, $data->departure);
$arrival = mysqli_real_escape_string($con, $data->arrival);
$status = mysqli_real_escape_string($con, $data->status);
$btnname = $data->btnname;
$id = isset($data->id) ? $data->id : 0;

if ($btnname == "Add") {
    $query = "INSERT INTO trains (train_no, train_name, source, destination, departure, arrival, status)
              VALUES ('$train_no', '$train_name', '$source', '$destination', '$departure', '$arrival', '$status')";
    echo mysqli_query($con, $query) ? "✅ Train Added Successfully!" : "❌ Failed to Add Train.";
}
elseif ($btnname == "Update") {
    $query = "UPDATE trains SET train_no='$train_no', train_name='$train_name', source='$source', 
              destination='$destination', departure='$departure', arrival='$arrival', status='$status' WHERE id='$id'";
    echo mysqli_query($con, $query) ? "✅ Train Updated Successfully!" : "❌ Failed to Update Train.";
}

mysqli_close($con);
?>
