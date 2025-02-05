<?php
session_start();
include 'connection.php'; // Ensure this file correctly connects to the database

if (isset($_POST['feedback'])) { // Ensure the form button name matches

    $email = $_POST['email'];
    $name = $_POST['name'];
    $msg = $_POST['message'];

    // Sanitize input to prevent SQL Injection
    $sanitized_email = mysqli_real_escape_string($connection, $email);
    $sanitized_name = mysqli_real_escape_string($connection, $name);
    $sanitized_msg = mysqli_real_escape_string($connection, $msg);

    // Insert into database
    $query = "INSERT INTO user_feedback (name, email, message) VALUES ('$sanitized_name', '$sanitized_email', '$sanitized_msg')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        header("Location: contact.html");
        exit(); // Prevent further execution after redirection
    } else {
        echo '<script>alert("Data not saved. Please try again.");</script>';
    }
}
?>
