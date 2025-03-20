<?php
session_start();
include 'dbconnect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT USERID, USERNAME, PASSWORD, UNIT FROM user WHERE USERNAME = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userid, $db_username, $db_password, $unit);
        $stmt->fetch();

        // Verify password (assuming PASSWORD is hashed)
        if ($password == $db_password) {
            $_SESSION['USERID'] = $userid;
            $_SESSION['USERNAME'] = $db_username;
            $_SESSION['UNIT'] = $unit;

            header("Location: homepage.html"); // Redirect to dashboard
            exit();
        } else {
            echo "Invalid username .";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>