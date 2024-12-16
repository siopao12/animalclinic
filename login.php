<?php
session_start();
include 'config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if email and password are set
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($email) && !empty($password)) {
        // Query to fetch user and role by email
        $sql = "SELECT 
                    p.petitioner_id, 
                    p.email, 
                    p.password, 
                    p.firstname, 
                    p.surname, 
                    r.role_name 
                FROM 
                    petitioner_information p
                JOIN 
                    roles r 
                ON 
                    p.role_id = r.role_id 
                WHERE 
                    p.email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['petitioner_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role_name']; // Fetch role name dynamically
                $_SESSION['username'] = $user['firstname'] . ' ' . $user['surname']; // Full name

                // Role-based redirection
                switch ($_SESSION['role']) {
                    case 'office_in_charge':
                        echo "<script>
                        alert('Login successful!');
                       window.location.href = '/code/staff/staffdashboard.php';
                    </script>"; 
                    break; // Added break here
                    case 'owner':
                        echo "<script>
                                alert('Login successful!');
                                window.location.href = 'owner_dashboad.php';
                              </script>";
                        break;
                    case 'manager':
                        echo "<script>
                                alert('Login successful!');
                                window.location.href = 'manager_dashboard.php';
                              </script>";
                        break;
                    case 'veterinarian':
                        echo "<script>
                                alert('Login successful!');
                                window.location.href = 'veterinarian_dashboard.php';
                              </script>";
                        break;
                    default:
                        echo "<script>
                                alert('Login successful!');
                                window.location.href = 'index.php';
                              </script>";
                        break;
                }
            } else {
                // Invalid password
                echo "<script>
                        alert('Invalid password. Please try again.');
                        window.history.back();
                      </script>";
            }
        } else {
            // No user found
            echo "<script>
                    alert('No user found with this email.');
                    window.history.back();
                  </script>";
        }
    }
}
?>
