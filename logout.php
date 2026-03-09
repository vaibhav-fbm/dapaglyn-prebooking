<?php

session_start();

session_unset();   // remove session variables
session_destroy(); // destroy session

header("Location: /dapaglyn_prebooking/login");
exit;
