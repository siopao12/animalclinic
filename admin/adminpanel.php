<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page if not logged in
    echo "<script>
            alert('You must log in to access the admin panel.');
            window.location.href = 'panel.php';
          </script>";
    exit();
}
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
                    <span class="fw-bold text-dark d-none d-md-inline">Admin,Gerald Seprado</span>
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
                        <a class="dropdown-item" href="adminlogout.php">
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

<div id="adminApprovalSection" class="main-content">
    <h3 class="mb-4 text-success">Admin Approval</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <input type="text" class="form-control form-control-sm w-auto" placeholder="Search by name or facility" style="max-width: 300px; border-color: #28a745;">
        <select class="form-select form-select-sm w-auto" style="max-width: 200px; border-color: #28a745;">
            <option value="" selected>Filter by Status</option>
            <option value="pending">Pending</option>
            <option value="approved">Approved</option>
            <option value="declined">Declined</option>
        </select>
    </div>

    <div class="table-responsive d-none d-md-block">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-success">
            <tr>
                <th>Facility ID</th>
                <th>Petitioner Name</th>
                <th>Facility Name</th>
                <th>Region</th>
                <th>City</th>
                <th>Request Status</th>
                <th>Date Submitted</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'fetchdata.php'; ?>
        </tbody>
    </table>
</div>


<!-- mobile -->
<div class="d-block d-md-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php include 'mobilefetch.php'; ?>
            </div>
        </div>
    </div>
</div>


<?php include 'adminmodal.php'; ?>



    <!-- Include Bootstrap and other JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</body>
<script src="../js/adminsidebar.js"></script>
</html>
