<?php
// Start a session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: Validate the user's credentials here
    // For example, you might check if the username and password are in a database

    // If the user's credentials are valid, set the session variable and redirect to the dashboard
    if ($username == 'exampleuser' && $password == 'examplepassword') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // If the user's credentials are not valid, display an error message
        echo "Invalid username or password";
    }
}
?>