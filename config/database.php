<?php

$host = "localhost";
$db   = "dapaglyn_prebooking";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db, 3307);

if ($conn->connect_error) {
    die("DB Connection Failed");
}
