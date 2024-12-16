
<?php
// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session management
session_start();
// Include the database connection file
include 'config.php'; // Ensure the path is correct


// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../landing.php"); // Redirect to login or landing page if not logged in
    exit();
}

// Optionally, check if the user has the correct role (e.g., 'staff')
if ($_SESSION['role'] !== 'office_in_charge') {
    header("Location: ../unauthorized.php"); // Redirect to an unauthorized access page
    exit();
}
// Fetch service logs for the logged-in user
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM service_logs WHERE created_by = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw's Doctor Dashboard</title>
    <!-- Include Bootstrap and other CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/code/css/staff.css">

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid px-3">
        <!-- Hamburger Icon -->
        <button class="navbar-toggler" type="button" id="toggleSidebar" aria-label="Toggle Sidebar">
            <i class="bi bi-list"></i>
        </button>
        <!-- Right Section -->
        <div class="d-flex align-items-center ms-auto">
            <!-- Notification Icon -->
            <div class="dropdown me-2">
                <a href="#" class="text-decoration-none position-relative" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell notification-icon"></i>
                    <span class="notification-badge">3</span> <!-- Badge for unread notifications -->
                </a>
                <div class="dropdown-menu dropdown-menu-end notification-menu" aria-labelledby="notificationDropdown">
                    <h6 class="dropdown-header">Notifications</h6>
                    <div class="notification-item">
                        <p><strong>Fluffy</strong> has an upcoming vaccination on Dec 25, 2024.</p>
                        <small>10 minutes ago</small>
                    </div>
                    <div class="notification-item">
                        <p><strong>Snowball</strong> has an appointment for a check-up on Dec 10, 2024.</p>
                        <small>30 minutes ago</small>
                    </div>
                    <div class="notification-item">
                        <p>New clinic updates are available. Check them out!</p>
                        <small>1 hour ago</small>
                    </div>
                    <div class="text-center mt-2">
                        <a href="#" class="btn btn-sm btn-link">See all notifications</a>
                    </div>
                </div>
            </div>
            <!-- User Dropdown -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="image/gerald.jpg" alt="Profile Picture" class="profile-image me-2" width="30" height="30">
                    <span class="fw-bold text-dark d-none d-md-inline">Staff,Gerald Seprado</span>
                    <i class="bi bi-chevron-down ms-1"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end profile-dropdown" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person-circle me-2"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear me-2"></i> Settings
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="/code/logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
 <!-- Sidebar -->
 <div id="sidebar" class="sidebar p-0">
    <ul>
        <li>
            <a href="#" id="dashboardLink">
                <i class="fas fa-tachometer-alt text-success"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" id="customerLink">
                <i class="fas fa-users  text-success"></i>
                <span>Patient</span>
            </a>
        </li>
        <li>
            <a href="#" id="servicesLink">
                <i class="fas fa-clipboard-list  text-success"></i>
                <span>Services</span>
            </a>
        </li>
        <li>
            <a href="#" id="inquiryLink">
                <i class="fas fa-envelope  text-success"></i>
                <span>Inquiry</span>
            </a>
        </li>
        <li>
            <a href="#" id="inventoryLink">
                <i class="fas fa-boxes  text-success"></i>
                <span>Inventory</span>
            </a>
        </li>
        <li>
            <a href="#" id="reportsLink">
                <i class="fas fa-chart-bar  text-success"></i>
                <span>Reports</span>
            </a>
        </li>
        <li>
            <a href="#" id="appointmentLink">
                <i class="fas fa-calendar-alt  text-success"></i>
                <span>Appointment</span>
            </a>
        </li>
        <li>
            <a href="#" id="employeeLink">
                <i class="fas fa-user  text-success"></i>
                <span>Employee</span>
            </a>
        </li>
    </ul>
</div>
<div id="serviceSection" class="main-content">
    <h3 class="mb-4">Service Record</h3>
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">
            <i class="bi bi-plus"></i> Add Service
        </button>
        <input type="text" class="form-control w-auto mt-2 mt-md-0" placeholder="Search" style="max-width: 300px;">
    </div>
    <div class="table-responsive d-none d-md-block">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ServiceID</th>
                    <th>ServiceType</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['service_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['service_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td class="d-flex">
                                <button 
                                    class="btn btn-success btn-sm me-2" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editServiceModal" 
                                    onclick="document.getElementById('editServiceId').value = '<?php echo htmlspecialchars($row['service_id']); ?>'; 
                                            document.getElementById('editServiceType').value = '<?php echo htmlspecialchars($row['service_type']); ?>'; 
                                            document.getElementById('editDescription').value = '<?php echo htmlspecialchars($row['description']); ?>';">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <button 
                                    class="btn btn-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteServiceModal" 
                                    onclick="document.getElementById('deleteServiceId').value = '<?php echo htmlspecialchars($row['service_id']); ?>';">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No services found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

    <!-- Mobile Card View -->
<div class="d-block d-md-none">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">ServiceID: <?php echo htmlspecialchars($row['service_id']); ?></h5>
                    <p class="card-text"><strong>ServiceType:</strong> <?php echo htmlspecialchars($row['service_type']); ?></p>
                    <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                    <div class="d-flex">
                        <button 
                            class="btn btn-success btn-sm me-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editServiceModal" 
                            onclick="document.getElementById('editServiceId').value = '<?php echo htmlspecialchars($row['service_id']); ?>'; 
                                    document.getElementById('editServiceType').value = '<?php echo htmlspecialchars($row['service_type']); ?>'; 
                                    document.getElementById('editDescription').value = '<?php echo htmlspecialchars($row['description']); ?>';">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button 
                            class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteServiceModal" 
                            onclick="document.getElementById('deleteServiceId').value = '<?php echo htmlspecialchars($row['service_id']); ?>';">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No services found.
        </div>
    <?php endif; ?>
</div>


<!-- modals section -->
<?php include 'modals.php'; ?>

    <!-- Include Bootstrap and other JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</body>
<script>
    // Sidebar Toggle
    const sidebar = document.getElementById('sidebar');
    const toggleSidebarButton = document.getElementById('toggleSidebar');
    
    toggleSidebarButton.addEventListener('click', () => {
        if (window.innerWidth < 768) {
            // Mobile: Toggle 'show' class for sliding in/out
            sidebar.classList.toggle('show');
            // Update aria-expanded for accessibility
            toggleSidebarButton.setAttribute(
                'aria-expanded',
                sidebar.classList.contains('show')
            );
        } else {
            // Desktop: Toggle 'collapsed' class for collapsing/expanding
            sidebar.classList.toggle('collapsed');
            // Ensure 'show' class is removed to prevent conflict
            sidebar.classList.remove('show');
        }
    });

</script>
</html>
