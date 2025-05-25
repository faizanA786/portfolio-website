<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "admin";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernameInput = $_POST["username"];
    $passwordInput = $_POST["password"];

    $sql = "SELECT * FROM USERS WHERE username='$usernameInput' AND password='$passwordInput'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['UserID'] = $usernameInput;
        header("Location: addEntry.php");
        exit;
    } 
    else {
        Header("Location: login.html");
        exit;
    }
}
?>