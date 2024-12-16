<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}

include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please log in to view your pets.');
            window.location.href = 'landing.php';
          </script>";
    exit();
}

$userId = $_SESSION['user_id']; // Get user ID from session
 // Fetch and display pet details with calculated age
   $sql = "SELECT 
                p.pet_id,
                p.pet_name,
                p.gender,
                p.birthdate,
                TIMESTAMPDIFF(YEAR, p.birthdate, CURDATE()) AS age,
                p.weight,
                p.color,
                p.distinguishing_marks,
                s.species_name,
                b.breed_name,
                i.image_path,
                v.vaccine_name,
                v.vaccination_date,
                v.expiry_date
            FROM Pet_Information p
            LEFT JOIN species s ON p.species_id = s.species_id
            LEFT JOIN breeds b ON p.breed_id = b.breed_id
            LEFT JOIN pet_images i ON p.pet_id = i.pet_id
            LEFT JOIN vaccinations v ON p.pet_id = v.pet_id
            WHERE p.petitioner_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display pet cards
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="card border rounded-3 shadow-sm mb-4 p-3 d-flex flex-column flex-md-row align-items-center">
            <img src="' . htmlspecialchars($row['image_path']) . '" alt="Pet Photo" class="rounded mb-3 mb-md-0 me-md-3" style="width: 120px; height: 120px; object-fit: cover;">
            <div class="text-center text-md-start flex-grow-1 w-100">
                <h4 class="fw-bold text-success mb-3 text-center text-md-start">Name: ' . htmlspecialchars($row['pet_name']) . '</h4>
                <div class="row g-3 align-items-start">
                    <div class="col-12 col-md-4">
                        <p class="mb-1"><span class="fw-bold">Gender:</span> ' . htmlspecialchars($row['gender']) . '</p>
                        <p class="mb-1"><span class="fw-bold">Birthdate:</span> ' . htmlspecialchars($row['birthdate']) . '</p>
                        <p class="mb-1"><span class="fw-bold">Age:</span> ' . htmlspecialchars($row['age']) . ' years</p>
                        <p class="mb-1"><span class="fw-bold">Weight:</span> ' . htmlspecialchars($row['weight']) . ' kg</p>
                        <p class="mb-1"><span class="fw-bold">Color:</span> ' . htmlspecialchars($row['color']) . '</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="mb-1"><span class="fw-bold">Species:</span> ' . htmlspecialchars($row['species_name']) . '</p>
                        <p class="mb-1"><span class="fw-bold">Breed:</span> ' . htmlspecialchars($row['breed_name']) . '</p>
                        <p class="mb-1"><span class="fw-bold">Distinguishing Marks:</span> ' . htmlspecialchars($row['distinguishing_marks']) . '</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="mb-1"><span class="fw-bold">Vaccine Name:</span> ' . htmlspecialchars($row['vaccine_name']) . '</p>
                        <p class="mb-1"><span class="fw-bold">Vaccination Date:</span> ' . htmlspecialchars($row['vaccination_date']) . '</p>
                        <p class="mb-1"><span class="fw-bold">Expiry Date:</span> ' . htmlspecialchars($row['expiry_date']) . '</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-end mt-3 mt-md-0 w-100">
                <button 
                    class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#editPetModal"
                    data-id="' . htmlspecialchars($row['pet_id']) . '"
                    data-name="' . htmlspecialchars($row['pet_name']) . '"
                    data-gender="' . htmlspecialchars($row['gender']) . '"
                    data-birthdate="' . htmlspecialchars($row['birthdate']) . '"
                    data-weight="' . htmlspecialchars($row['weight']) . '"
                    data-color="' . htmlspecialchars($row['color']) . '"
                    data-species="' . htmlspecialchars($row['species_name']) . '"
                    data-breed="' . htmlspecialchars($row['breed_name']) . '"
                    data-marks="' . htmlspecialchars($row['distinguishing_marks']) . '"
                    data-vaccine-name="' . htmlspecialchars($row['vaccine_name']) . '"
                    data-vaccination-date="' . htmlspecialchars($row['vaccination_date']) . '"
                    data-expiry-date="' . htmlspecialchars($row['expiry_date']) . '">
                    Edit
                </button>
                <button 
                    class="btn btn-danger btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#deletePetModal" 
                    data-id="' . htmlspecialchars($row['pet_id']) . '">
                    Delete
                </button>
            </div>
        </div>';
    }
    ?>
