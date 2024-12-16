<?php
include 'config.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the facility ID
    $facilityId = filter_input(INPUT_POST, 'facility_id', FILTER_VALIDATE_INT);

    if (!$facilityId) {
        echo "<script>
                alert('Invalid facility ID.');
                window.location.href = 'adminpanel.php';
              </script>";
        exit;
    }

    // Debugging: Check the facility ID and its current status
    $checkSql = "SELECT status FROM animal_facility_information WHERE facility_id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("i", $facilityId);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['status'] !== 'pending') {
            echo "<script>
                    alert('Request is already processed. Current status: {$row['status']}');
                    window.location.href = 'adminpanel.php';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('No matching request found.');
                window.location.href = 'adminpanel.php';
              </script>";
        exit;
    }

    // Update the facility status to 'rejected'
    $sql = "
        UPDATE animal_facility_information 
        SET 
            status = 'rejected' 
        WHERE 
            facility_id = ? AND status = 'pending'
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $facilityId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "<script>
                    alert('Request successfully rejected.');
                    window.location.href = 'adminpanel.php';
                  </script>";
        } else {
            echo "<script>
                    alert('No changes made. The request may already be rejected or invalid.');
                    window.location.href = 'adminpanel.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Failed to process the rejection request. Please try again.');
                window.location.href = 'adminpanel.php';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('Invalid request method.');
            window.location.href = 'adminpanel.php';
          </script>";
}
?>
