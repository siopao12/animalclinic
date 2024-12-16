<?php
// condition.php

// Include database configuration
include 'config.php';
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input data
    $symptoms = isset($_POST['symptom']) ? $_POST['symptom'] : [];
    $descriptions = isset($_POST['description']) ? $_POST['description'] : [];
    $pet_id = isset($_POST['pet_id']) ? intval($_POST['pet_id']) : 0;

    // Assume user_id is stored in the session
    $user_id = $_SESSION['user_id']; // Replace with your session key

    // Validate pet_id based on the user
    $pet_exists = false;

    if ($pet_id > 0) {
        $pet_query = "SELECT pet_id FROM Pet_Information WHERE pet_id = ? AND petitioner_id = ?";
        $stmt = mysqli_prepare($conn, $pet_query);
        mysqli_stmt_bind_param($stmt, 'ii', $pet_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $pet_exists = mysqli_num_rows($result) > 0;
        mysqli_stmt_close($stmt);
    }

    // Ensure pet_id is valid and symptoms/descriptions have matching counts
    if ($pet_exists && is_array($symptoms) && is_array($descriptions) && count($symptoms) === count($descriptions)) {
        // Prepare the SQL statement for inserting data
        $sql = "INSERT INTO conditions (pet_id, symptom, description) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        foreach ($symptoms as $index => $symptom) {
            $symptom = htmlspecialchars($symptom, ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($descriptions[$index], ENT_QUOTES, 'UTF-8');

            mysqli_stmt_bind_param($stmt, 'iss', $pet_id, $symptom, $description);

            if (!mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='index.php';</script>";
                exit;
            }
        }

        mysqli_stmt_close($stmt);
        echo "<script>alert('Record added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid input. Please ensure all fields are correctly filled and IDs are valid.'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request method.'); window.location.href='index.php';</script>";
}

// Close the database connection
mysqli_close($conn);
?>
