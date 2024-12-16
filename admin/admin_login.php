<?php
// Start the session
session_start();

// Include the database connection file
include 'config.php'; // Replace with your actual database connection file

// Enable output buffering to suppress unwanted output
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT petitioner_id, email, password, role_id FROM petitioner_information WHERE email = ? AND role_id = (SELECT role_id FROM roles WHERE role_name = 'admin') LIMIT 1";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $admin = $result->fetch_assoc();
                if (password_verify($password, $admin['password'])) {
                    // Set session variables
                    $_SESSION['admin_id'] = $admin['petitioner_id'];
                    $_SESSION['admin_email'] = $admin['email'];
                    echo "<script>
                        alert('Login successful!');
                        window.location.href = 'adminpanel.php'; // Ensure this matches the actual file location
                      </script>";
                    exit();
                } else {
                    echo "<script>
                            alert('Invalid email or password.');
                            window.location.href = 'panel.php';
                          </script>";
                    exit();
                }
            } else {
                echo "<script>
                        alert('Admin not found or unauthorized access.');
                        window.location.href = 'panel.php';
                      </script>";
                exit();
            }

            // Safely close the statement
            if (isset($stmt) && $stmt instanceof mysqli_stmt) {
                $stmt->close();
            }
        } else {
            echo "<script>
                    alert('Database query failed.');
                    window.location.href = 'panel.php';
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Please fill in all fields.');
                window.location.href = 'panel.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('Form not submitted.');
            window.location.href = 'panel.php';
          </script>";
}

// Close the database connection
$conn->close();

// Clear any output in the buffer
ob_end_clean();
?>
