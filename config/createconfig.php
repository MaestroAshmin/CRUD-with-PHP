<?php
// include database connection
include 'database.php';
if (isset($_POST['firstName'])) {
    $firstName = $_POST['firstName'];
}
if (isset($_POST['lastName'])) {
    $lastName = $_POST['lastName'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
}
$sql = "INSERT INTO users (FirstName, LastName, Email) VALUES ('$firstName', '$lastName', '$email')";
if (mysqli_query($conn, $sql)) {
    echo 'Records added';
} else {
    //header('Location: ../create.php');
    echo "ERROR: Could not able to execute";
}
$conn->close();
