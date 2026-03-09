<?php

$route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

switch ($route) {

    case '':
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

    case 'logout':
        require 'logout.php';
        break;

    case 'form-submit':
        require './controllers/form_submit.php';
        break;

    default:
        http_response_code(404);
        echo "404 Page Not Found";
}
