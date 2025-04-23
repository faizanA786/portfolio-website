<?php
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
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO BLOGS (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        Header("Location: viewBlog.php");
        exit;
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>