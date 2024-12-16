<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serviceId = $_POST['serviceId'];

    if (!empty($serviceId)) {
        // Delete query with the correct column name 'service_id'
        $sql = "DELETE FROM service_logs WHERE service_id = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "<script>
                    alert('Database error: " . $conn->error . "');
                    window.history.back(); // Redirect back to the form
                  </script>";
            exit();
        }

        $stmt->bind_param("i", $serviceId);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Service deleted successfully!');
                    window.location.href = 'staffdashboard.php'; // Redirect to the dashboard
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not delete the service. Please try again.');
                    window.history.back(); // Redirect back to the form
                  </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Invalid service ID!');
                window.history.back(); // Redirect back to the form
              </script>";
    }
}
?>
