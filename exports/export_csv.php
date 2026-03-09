<?php

require '../config/database.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=reservations.csv');

$output = fopen("php://output", "w");

fputcsv($output, ['Doctor', 'Contact', 'City', 'Email', 'Speciality']);

$result = $conn->query("SELECT * FROM book_reservations");

while ($row = $result->fetch_assoc()) {

    fputcsv($output, [
        $row['doctor_name'],
        $row['contact_number'],
        $row['city'],
        $row['email'],
        $row['speciality']
    ]);
}

fclose($output);
