<?php
session_start();
require '../config/database.php';

$doctor = $_POST['doctor_name'] ?? '';
$contact = $_POST['contact_number'] ?? '';
$city = $_POST['city'] ?? '';
$email = $_POST['email'] ?? '';
$speciality = $_POST['speciality'] ?? '';

try {

    // Check duplicate contact number
    $stmt = $conn->prepare("SELECT id FROM book_reservations WHERE contact_number = ?");
    $stmt->bind_param("s", $contact);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $_SESSION['response'] = [
            "type" => "error",
            "message" => "Prebooking already submitted"
        ];
    } else {

        $insert = $conn->prepare("INSERT INTO book_reservations 
        (doctor_name, contact_number, city, email, speciality)
        VALUES (?, ?, ?, ?, ?)");

        $insert->bind_param("sssss", $doctor, $contact, $city, $email, $speciality);

        if ($insert->execute()) {

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

header("Location: /dapaglyn_prebooking/form");
exit;
