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

        .nav {
            width: 240px;
            padding-top: 40px;
        }

        .nav-link {
            padding: 20px;
            font-size: 14px;
            border-radius: 40px 0 0 40px !important;
        }

        .tab-content {
            width: 100%;
            border-radius: 40px 0 0 0 !important;
        }
    </style>
</head>

<body>
    <div class="conatainer vh-100 d-flex flex-column bg-warning-subtle">
        <div class="p-2 d-flex gap-2 justify-content-end">
            <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
        </div>
        <div class="d-flex align-items-start flex-grow-1">
            <div class="nav flex-column nav-pills ps-2 gap-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active text-start" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</button>
                <button class="nav-link text-start" id="v-pills-inventory-tab" data-bs-toggle="pill" data-bs-target="#v-pills-inventory" type="button" role="tab" aria-controls="v-pills-inventory" aria-selected="false">Inventory</button>
                <button class="nav-link text-start" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</button>
                <button class="nav-link text-start" id="v-pills-monitoring-tab" data-bs-toggle="pill" data-bs-target="#v-pills-monitoring" type="button" role="tab" aria-controls="v-pills-monitoring" aria-selected="false">Monitoring</button>
                <button class="nav-link text-start" id="v-pills-reports-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reports" type="button" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</button>
                <button class="nav-link text-start" id="v-pills-customers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customers" type="button" role="tab" aria-controls="v-pills-customers" aria-selected="false">Customers</button>
                <button class="nav-link text-start" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">Users</button>
            </div>
            <div class="tab-content p-2 bg-primary h-100" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">Hello Dashboard!</div>
                <div class="tab-pane fade" id="v-pills-inventory" role="tabpanel" aria-labelledby="v-pills-inventory-tab" tabindex="0">Hello Inventory!</div>
                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab" tabindex="0">Hello Orders!</div>
                <div class="tab-pane fade" id="v-pills-monitoring" role="tabpanel" aria-labelledby="v-pills-monitoring-tab" tabindex="0">Hello Monitoring!</div>
                <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab" tabindex="0">Hello Reports</div>
                <div class="tab-pane fade" id="v-pills-customers" role="tabpanel" aria-labelledby="v-pills-customers-tab" tabindex="0">Hello Customers!</div>
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">Hello Users</div>
            </div>
        </div>
    </div>



    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>