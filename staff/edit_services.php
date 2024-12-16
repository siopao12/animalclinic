<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serviceId = $_POST['serviceId'];
    $serviceType = trim($_POST['serviceType']);
    $description = trim($_POST['description']);

    if (!empty($serviceId) && !empty($serviceType) && !empty($description)) {
        // Update query with the correct column name 'service_id'
        $sql = "UPDATE service_logs SET service_type = ?, description = ? WHERE service_id = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "<script>
                    alert('Database error: " . $conn->error . "');
                    window.history.back(); // Redirect back to the form
                  </script>";
            exit();
        }

        $stmt->bind_param("ssi", $serviceType, $description, $serviceId);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Service updated successfully!');
                    window.location.href = 'staffdashboard.php'; // Redirect to the dashboard
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not update the service. Please try again.');
                    window.history.back(); // Redirect back to the form
                  </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('All fields are required!');
                window.history.back(); // Redirect back to the form
              </script>";
    }
}
?>
