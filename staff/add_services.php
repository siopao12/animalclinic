<?php
session_start();
include 'config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $serviceType = trim($_POST['serviceType']);
    $description = trim($_POST['description']);
    $createdBy = $_SESSION['user_id']; // Assume the user's ID is stored in the session after login

    // Validate inputs
    if (empty($serviceType) || empty($description)) {
        echo "All fields are required!";
        exit;
    }

    // Prepare and execute the SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO service_logs (service_type, description, created_by) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $serviceType, $description, $createdBy);

    if ($stmt->execute()) {
        // Success message using JavaScript
        echo "<script>
                alert('Service added successfully!');
                window.location.href = 'staffdashboard.php'; // Redirect to the services listing page
              </script>";
    } else {
        // Log error to check the actual problem
        error_log("Database error: " . $stmt->error);
        // Error message using JavaScript
        echo "<script>
                alert('Error: Could not add service. Please try again.');
                window.location.href = 'staffdashboard.php'; // Redirect back to the add service form
              </script>";
    }

    $stmt->close(); // Close the statement
}

// Fetching data logic (Example)
$sql = "SELECT * FROM service_logs WHERE created_by = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']); // Fetch only the logged-in user's data
$stmt->execute();
$result = $stmt->get_result(); // Assign result to $result

// Check if result is valid before calling fetch_assoc()
if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Process rows (Example: print row data)
        echo "Service Type: " . htmlspecialchars($row['service_type']) . "<br>";
        echo "Description: " . htmlspecialchars($row['description']) . "<br>";
    }
} else {
    echo "No services found.";
}

$stmt->close();
$conn->close();
?>
