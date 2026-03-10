<?php

session_start();
require './config/database.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doctor = $conn->real_escape_string($_POST['doctor_name']);
    $contact = $conn->real_escape_string($_POST['contact_number']);
    $city = $conn->real_escape_string($_POST['city']);
    $email = $conn->real_escape_string($_POST['email']);
    $speciality = $conn->real_escape_string($_POST['speciality']);

    try {

        // Check duplicate contact
        $checkQuery = "SELECT id FROM book_reservations WHERE contact_number='$contact'";
        $result = $conn->query($checkQuery);

        if ($result->num_rows > 0) {

            $_SESSION['response'] = [
                "type" => "error",
                "message" => "Prebooking already submitted"
            ];
        } else {

            $insertQuery = "INSERT INTO book_reservations 
            (doctor_name, contact_number, city, email, speciality)
            VALUES ('$doctor', '$contact', '$city', '$email', '$speciality')";

            if ($conn->query($insertQuery)) {

                $_SESSION['response'] = [
                    "type" => "success",
                    "message" => "Your prebooking is received. We will contact you shortly."
                ];
            } else {

                $_SESSION['response'] = [
                    "type" => "error",
                    "message" => "Database error occurred"
                ];
            }
        }
    } catch (Exception $e) {

        $_SESSION['response'] = [
            "type" => "error",
            "message" => "Something went wrong"
        ];
    }

    header("Location: /form");
    exit;
}
