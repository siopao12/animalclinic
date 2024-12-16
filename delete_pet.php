<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already started
}
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please log in to manage your pets.');
            window.location.href = 'landing.php';
          </script>";
    exit();
}

$userId = $_SESSION['user_id']; // Get user ID from session

// Check if the delete request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deletePetId'])) {
    $petId = intval($_POST['deletePetId']); // Get the pet_id from the form submission

    // Verify the pet belongs to the logged-in user
    $stmt = $conn->prepare("SELECT pet_id FROM Pet_Information WHERE pet_id = ? AND petitioner_id = ?");
    $stmt->bind_param("ii", $petId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Begin transaction to delete pet details and associated records
        $conn->begin_transaction();

        try {
            // Delete pet image
            $stmt = $conn->prepare("DELETE FROM pet_images WHERE pet_id = ?");
            $stmt->bind_param("i", $petId);
            $stmt->execute();

            // Delete pet vaccinations
            $stmt = $conn->prepare("DELETE FROM vaccinations WHERE pet_id = ?");
            $stmt->bind_param("i", $petId);
            $stmt->execute();

            // Delete pet information
            $stmt = $conn->prepare("DELETE FROM Pet_Information WHERE pet_id = ?");
            $stmt->bind_param("i", $petId);
            $stmt->execute();

            // Commit transaction
            $conn->commit();

            echo "<script>
                    alert('Pet deleted successfully.');
                    window.location.href = 'index.php';
                  </script>";
        } catch (Exception $e) {
            // Rollback transaction on error
            $conn->rollback();
            echo "<script>
                    alert('Failed to delete pet. Please try again.');
                    window.history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid pet ID or you do not have permission to delete this pet.');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request.');
            window.history.back();
          </script>";
}
?>
