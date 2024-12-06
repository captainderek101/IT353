<?php
    $servername = "localhost";
    $serverusername = "root";
    $serverpassword = NULL;
    $dbname = "IT353_Project";

    // Create connection
    $conn = new mysqli($servername, $serverusername, $serverpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    if(isset($_SESSION['userID']))
    {
        $userID = $_SESSION['userID'];
    }
?>