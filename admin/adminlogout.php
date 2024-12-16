<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the admin login page
echo "<script>
        alert('You have been logged out.');
        window.location.href = 'panel.php'; // Correct path based on your structure
      </script>";
exit();
?>
