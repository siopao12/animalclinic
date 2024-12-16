<?php
include 'config.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $facilityId = filter_input(INPUT_POST, 'facility_id', FILTER_VALIDATE_INT);

    if (!$facilityId) {
        echo "<script>
                alert('Invalid facility ID.');
                window.location.href = 'adminpanel.php';
              </script>";
        exit;
    }

    // Prepare the SQL query
    $sql = "
        UPDATE 
            petitioner_information AS pi
        JOIN 
            animal_facility_information AS afi 
        ON 
            pi.petitioner_id = afi.petitioner_id
        SET 
            pi.role_id = afi.selected_role, 
            afi.status = 'approved'
        WHERE 
            afi.facility_id = ? 
            AND afi.status = 'pending'
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $facilityId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Successful approval
            echo "<script>
                    alert('Request approved successfully!');
                    window.location.href = 'adminpanel.php';
                  </script>";
        } else {
            // No rows affected
            echo "<script>
                    alert('No changes made. The request may already be approved.');
                    window.location.href = 'adminpanel.php';
                  </script>";
        }
    } else {
        // Query failed
        echo "<script>
                alert('Failed to process the request. Please try again later.');
                window.location.href = 'adminpanel.php';
              </script>";
    }

    $stmt->close();
} else {
    // Invalid request method
    echo "<script>
            alert('Invalid request method.');
            window.location.href = 'adminpanel.php';
          </script>";
}
?>
