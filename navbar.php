<!-- Navbar -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid px-3">
        <!-- Hamburger Icon -->
        <button class="navbar-toggler" type="button" id="toggleSidebar" aria-label="Toggle Sidebar">
            <i class="bi bi-list"></i>
        </button>
        <!-- Logo and Brand -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="image/logo.png" alt="Logo" class="me-2" width="30" height="30">
            <span class="d-none d-sm-inline">PAW'S DOCTOR</span>
        </a>
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
                    <?php
                    // Fetch the username from the session
                    $userName = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';
                    ?>
                    <span class="fw-bold text-dark d-none d-md-inline"><?php echo $userName; ?></span>
                    <i class="bi bi-chevron-down ms-1"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end profile-dropdown" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person-circle me-2"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addClinicModal">
                            <i class="bi bi-plus-circle me-2"></i> Add Your Clinic
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear me-2"></i> Settings
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item"  href="logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>