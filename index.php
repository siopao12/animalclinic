<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: landing.php"); // Redirect to login or landing page if not logged in
    exit();
}
include 'config.php'; // Database connection file

// Fetch all services from the service_logs table
$sql = "SELECT service_type, description FROM service_logs";
$result = $conn->query($sql);

// Group services for carousel slides
$services = [];
while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}

// Split services into chunks of 4 (for each carousel slide)
$chunkedServices = array_chunk($services, 4);

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
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<!--Nv-->
<?php include 'navbar.php';?>
<?php include 'modals.php';?>
 <!-- Sidebar -->
 <div id="sidebar" class="sidebar collapsed p-0">
    <ul>
        <li>
            <a href="#" id="dashboardLink">
                <i class="fas fa-house text-success"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" id="myPetsLink">
                <i class="fas fa-paw text-success"></i>
                <span>My Pets</span>
            </a>
        </li>
        <li>
            <a href="#" id="clinicLink">
                <i class="fas fa-clinic-medical text-success"></i>
                <span>Services & Clinic</span>
            </a>
        </li>
        <li>
            <a href="#" id="appointmentsLink">
                <i class="fas fa-calendar-alt text-success"></i>
                <span>Appointments</span>
            </a>
        </li>
        <li>
            <a href="#" id="servicesLink">
                <i class="fas fa-heart text-success"></i>
                <span>Services</span>
            </a>
        </li>
        <li>
            <a href="#" id="settingsLink">
                <i class="fas fa-cog text-success"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div>

<?php include 'petcoursel.php'; ?>

        <!-- Calendar Section -->
        <div class="row">
            <!-- Upcoming Appointments -->
            <div class="col-lg-8 col-12 mb-4">
                <h4 class="section-title">Upcoming Appointments</h4>
                <div id="calendar"></div>
            </div>

            <!-- Quick Actions and Side Widgets -->
            <div class="col-lg-4 col-12">
                <!-- Quick Actions -->
                <div class="quick-actions mb-4">
                    <h4 class="section-title">Quick Actions</h4>
                    <button class="btn btn-success w-100 mb-2"data-bs-toggle="modal" data-bs-target="#addPetModal">+ Add Pets</button>
                    <button class="btn btn-primary w-100 mb-2">Appointment</button>
                    <button class="btn btn-info w-100 mb-2">Find Clinic</button>
                    <button class="btn btn-warning w-100">Inquiries</button>
                </div>

                <!-- Recent Invoices -->
                <div class="recent-invoices mb-4">
                    <h4 class="section-title">Recent Invoices</h4>
                    <ul class="list-unstyled">
                        <li>Invoice: #00125 - Paid</li>
                        <li>Invoice: #00241 - Paid</li>
                        <li>Invoice: #00242 - Paid</li>
                    </ul>
                </div>

                <!-- Pet Health Overview -->
                <div class="pet-health-overview">
                    <h4 class="section-title">Pet Health Overview</h4>
                    <ul class="list-unstyled">
                        <li>Fluffy: Vaccination due on Dec 25, 2024</li>
                        <li>Snowball: Vaccination due on Dec 25, 2024</li>
                        <li>Snowie: Vaccination due on Dec 25, 2024</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Pet Modal -->
<div class="modal fade" id="addPetModal" tabindex="-1" aria-labelledby="addPetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addPetModalLabel">ADD PETS</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Form Start -->
        <form id="addPetForm" action="process_add_pet.php" method="POST" enctype="multipart/form-data">
          <!-- Row 1 -->
          <div class="row g-2">
            <div class="col-md-4">
            <label for="petName" class="form-label">Pet Name</label>
              <input type="text" class="form-control" id="petName" name="petName" required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Age</label>
              <input type="number" class="form-control" id="age" name="age"required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Gender</label>
              <select class="form-select" id="gender" name="gender" required>
                <option value="" disabled selected>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <!-- Row 2 -->
          <div class="row g-2 mt-2">
          <div class="col-md-6">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <div class="col-md-6">
            <label for="petName" class="form-label">Weight(kg)</label>
              <input type="number" step="0.1" class="form-control" id="weight" name="weight" required>
            </div>
          </div>
          <!-- Row 3 -->
          <div class="row g-2 mt-2">
            <div class="col-md-4">
            <label for="petName" class="form-label">Species</label>
              <input type="text" class="form-control" id="species" name="species"required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Breed</label>
              <input type="text" class="form-control" id="breed" name="breed" required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Color</label>
              <input type="text" class="form-control" id="color" name="color"required>
            </div>
          </div>
          <!-- Row 4 -->
          <div class="row g-2 mt-2">
            <div class="col-md-12">
            <label for="petName" class="form-label">Distinguishing Marks</label>
              <input type="text" class="form-control" id="distinguishingMarks" name="distinguishingMarks">
            </div>
          </div>
          <!-- Row 5 -->
          <div class="row g-2 mt-2">
            <div class="col-md-6">
            <label for="petName" class="form-label">antiRabiesVaccinationDate</label>
              <input type="date" class="form-control" id="antiRabiesVaccinationDate" name="antiRabiesVaccinationDate" required>
            </div>
            <div class="col-md-6">
            <label for="petName" class="form-label">antiRabiesExpiryDate</label>
              <input type="date" class="form-control" id="antiRabiesExpiryDate" name="antiRabiesExpiryDate" required>
            </div>
          </div>
          <!-- Row 6 -->
          <div class="row g-2 mt-2">
            <div class="col-md-12">
              <label class="form-label">Choose Image of Your Pets</label>
              <input type="file" class="form-control" id="petImage" name="petImage" accept="image/*" required>
            </div>
          </div>
          <!-- Form End -->
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
        </form>
    </div>
  </div>
</div>
<div id="ClinicServices" class="main-content container-fluid g-0 d-none">
        <?php include 'servicesClinic.php'; ?>
    </div>
<div id="myPetsSection" class="main-content container-fluid g-0 d-none">
        <?php include 'mypets.php'; ?>
    </div>
    <!-- Include Bootstrap and other JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="js/initialize.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/philippines.js"></script>
</body>
</html>