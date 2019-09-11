<!-- PHP read record by ID will be here -->
<?php
if (isset($_POST['firstName'])) {
    $firstName = $_POST['FirstName'];
}
if (isset($_POST['lastName'])) {
    $lastName = $_POST['LastName'];
}
if (isset($_POST['email'])) {
    $email = $_POST['Email'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $firstName = trim($_POST["FirstName"]);
    $lastName = trim($_POST["LastName"]);
    $email = trim($_POST["Email"]);
}

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found');
include 'database.php';
$sql = "UPDATE users SET FirstName='$firstName', LastName='$lastName', Email='$email' where ID='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: ../index.php');
} else {
    echo "Error";
    //header('Location: ../read.php');
}

?>