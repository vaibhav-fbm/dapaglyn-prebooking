<?php

session_start();
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: /dashboard");
        exit;
    } else {

        $_SESSION['login_error'] = "Invalid username or password";

        header("Location: /login");
        exit;
    }
}
