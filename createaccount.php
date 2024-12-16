<?php
session_start();
include 'config.php'; // Ensure this file contains the $conn variable with the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $plainPassword = $_POST['Thirdpassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $surname = htmlspecialchars(trim($_POST['surname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $middlename = htmlspecialchars(trim($_POST['middlename']));
    $nameExtension = htmlspecialchars(trim($_POST['nameExtension']));
    $mobileNumber = htmlspecialchars(trim($_POST['mobileNumber']));

    $region = htmlspecialchars(trim($_POST['region']));
    $province = htmlspecialchars(trim($_POST['province']));
    $city = htmlspecialchars(trim($_POST['city']));
    $barangay = htmlspecialchars(trim($_POST['barangay']));
    $municipality = htmlspecialchars(trim($_POST['municipality']));
    $buildingNumber = htmlspecialchars(trim($_POST['buildingNumber']));
    $block = htmlspecialchars(trim($_POST['block']));
    $lotNumber = htmlspecialchars(trim($_POST['lotNumber']));
    $street = htmlspecialchars(trim($_POST['street']));
    $sitio = htmlspecialchars(trim($_POST['sitio']));
    $subdivision = htmlspecialchars(trim($_POST['subdivision']));
    $village = htmlspecialchars(trim($_POST['village']));

    // Check if passwords match
    if ($plainPassword !== $confirmPassword) {
        echo "<script>
                alert('Passwords do not match. Please try again.');
                window.history.back();
              </script>";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Insert into address table
    $addressSql = "INSERT INTO petitioner_address (region, province, city, barangay, municipality, building_number, block, lot_number, street, sitio, subdivision, village) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($addressSql);

    if (!$stmt) {
        echo "<script>
                alert('Database error: " . $conn->error . "');
                window.history.back();
              </script>";
        exit;
    }

    $stmt->bind_param(
        "ssssssssssss",
        $region, $province, $city, $barangay, $municipality, $buildingNumber, 
        $block, $lotNumber, $street, $sitio, $subdivision, $village
    );

    if (!$stmt->execute()) {
        echo "<script>
                alert('Error inserting address: {$stmt->error}');
                window.history.back();
              </script>";
        exit;
    }

    $addressId = $stmt->insert_id; // Get the last inserted address_id
    $stmt->close();

    // Fetch the default role_id for 'user'
    $defaultRoleName = 'user';
    $roleSql = "SELECT role_id FROM roles WHERE role_name = ?";
    $stmt = $conn->prepare($roleSql);

    if (!$stmt) {
        echo "<script>
                alert('Database error: " . $conn->error . "');
                window.history.back();
              </script>";
        exit;
    }

    $stmt->bind_param("s", $defaultRoleName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        echo "<script>
                alert('Error fetching default role. Please contact support.');
                window.history.back();
              </script>";
        exit;
    }

    $role = $result->fetch_assoc();
    $defaultRoleId = $role['role_id']; // Default role_id for 'user'
    $stmt->close();

    // Insert into petitioner_information table with default role_id
    $petitionerSql = "INSERT INTO petitioner_information (email, password, surname, firstname, middlename, name_extension, mobile_number, role_id, address_id) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($petitionerSql);

    if (!$stmt) {
        echo "<script>
                alert('Database error: " . $conn->error . "');
                window.history.back();
              </script>";
        exit;
    }

    $stmt->bind_param(
        "ssssssssi",
        $email, $hashedPassword, $surname, $firstname, $middlename, 
        $nameExtension, $mobileNumber, $defaultRoleId, $addressId
    );

    if ($stmt->execute()) {
        echo "<script>
                alert('Account created successfully!');
                window.location.href = 'landing.php';
              </script>";
    } else {
        echo "<script>
                alert('Error creating account: {$stmt->error}');
                window.history.back();
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
