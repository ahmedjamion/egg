<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egg_db";

// Check if database creation script should be run
$result = (new mysqli($servername, $username, $password))->query("SHOW DATABASES LIKE '$dbname'");
if ($result->num_rows == 0) {
    // Database does not exist, so include database creation script
    include 'db.php';
}


// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Egg</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>

</html>