<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /dapaglyn_prebooking/login");
    exit();
}
