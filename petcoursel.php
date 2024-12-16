<!-- Main Content -->
<div id="dashboardSection" class="main-content container-fluid g-0" >
    <div class="container-fluid">
        <h1 class="text-center text-md-start mt-5 mt-md-3">Welcome to Paw's Doctor Dashboard,
        <?php
            // Fetch the username from the session
            echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';
            ?>!
        </h1>
        <p class="text-center text-md-start">Manage your appointments, services, and more from here.</p>

        <?php
// Include the database connection file
include 'config.php';

// Query to fetch pet images and information
$sql = "SELECT pi.image_id, pi.image_path, p.pet_name 
        FROM pet_images pi 
        JOIN Pet_Information p ON pi.pet_id = p.pet_id";

$result = $conn->query($sql);
?>

<!-- My Pets Section -->
<div class="row my-4">
    <div class="col-12">
        <div class="my-pets-section">
            <h4 class="section-title text-center text-md-start">MY PETS</h4>
            <div class="pet-carousel-container d-flex flex-column align-items-center">
                <!-- Carousel Controls -->
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <button class="carousel-control-prev btn btn-outline-secondary" id="prevPet">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="pet-carousel overflow-hidden flex-grow-1">
                        <div class="pet-carousel-items d-flex justify-content-start" id="petsContainer">
                            <!-- Individual Pet Cards -->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="pet-card">';
                                    echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['pet_name']) . '">';
                                    echo '<p>' . htmlspecialchars($row['pet_name']) . '</p>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>No pets found.</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <button class="carousel-control-next btn btn-outline-secondary" id="nextPet">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>