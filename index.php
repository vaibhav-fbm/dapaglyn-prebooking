<?php

$route = $_GET['route'] ?? '';

switch ($route) {

    case '':
        require 'views/form/form.php';
        break;

    case 'form':
        require 'views/form/form.php';
        break;

    case 'login':
        require 'views/auth/login.php';
        break;

    case 'dashboard':
        require 'views/dashboard/dashboard.php';
        break;

    case 'export':
        require 'exports/export_csv.php';
        break;

    default:
        echo "404 Page Not Found";
}
