<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found');
include 'database.php';
$sql = "DELETE from users where ID='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: ../index.php');
} else {
    echo "Error";
    //header('Location: ../read.php');
}
