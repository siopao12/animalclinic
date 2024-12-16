<?php
session_start();
include 'config.php'; // Include your database connection file

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $facility_name = htmlspecialchars(trim($_POST['facility_name']));
    $mobile_number = htmlspecialchars(trim($_POST['mobile_number']));
    $email_address = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $selected_role_id = intval($_POST['selected_role_id']);
    $region = htmlspecialchars(trim($_POST['region']));
    $province = htmlspecialchars(trim($_POST['province']));
    $city = htmlspecialchars(trim($_POST['city']));
    $barangay = htmlspecialchars(trim($_POST['barangay']));
    $municipality = htmlspecialchars(trim($_POST['municipality']));
    $building_number = htmlspecialchars(trim($_POST['building_number']));
    $block = htmlspecialchars(trim($_POST['block']));
    $lot_number = htmlspecialchars(trim($_POST['lot_number']));
    $street = htmlspecialchars(trim($_POST['street']));
    $sitio = htmlspecialchars(trim($_POST['sitio']));
    $subdivision = htmlspecialchars(trim($_POST['subdivision']));
    $village = htmlspecialchars(trim($_POST['village']));
    $petitioner_id = $_SESSION['user_id']; // Assuming user_id is stored in the session

    // Validate required fields
    if (empty($facility_name) || empty($mobile_number) || empty($email_address) || empty($selected_role_id) || empty($region) || empty($province) || empty($city) || empty($barangay)) {
        echo "<script>alert('Please fill in all required fields!'); window.history.back();</script>";
        exit;
    }

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert into facility_address table
        $address_sql = "INSERT INTO facility_address (region, province, city, barangay, municipality, building_number, block, lot_number, street, sitio, subdivision, village)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $address_stmt = $conn->prepare($address_sql);
        $address_stmt->bind_param(
            "ssssssssssss",
            $region, $province, $city, $barangay, $municipality, $building_number, 
            $block, $lot_number, $street, $sitio, $subdivision, $village
        );
        $address_stmt->execute();
        $facility_address_id = $conn->insert_id; // Get the last inserted address_id

        // Insert into animal_facility_information table
        $facility_sql = "INSERT INTO animal_facility_information (facility_name, mobile_number, email_address, petitioner_id, selected_role, facility_address_id)
                         VALUES (?, ?, ?, ?, ?, ?)";
        $facility_stmt = $conn->prepare($facility_sql);
        $facility_stmt->bind_param(
            "sssiii",
            $facility_name, $mobile_number, $email_address, $petitioner_id, $selected_role_id, $facility_address_id
        );
        $facility_stmt->execute();

        // Commit transaction
        $conn->commit();

        echo "<script>alert('Clinic added successfully!'); window.location.href = 'index.php';</script>";
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        echo "<script>alert('Error adding clinic: " . $e->getMessage() . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request method!'); window.history.back();</script>";
}
?>
