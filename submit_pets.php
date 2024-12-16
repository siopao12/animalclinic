<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}

include 'config.php'; // Ensure this file initializes the database connection

// Create a database connection using MySQLi

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please log in to add your pets.');
            window.location.href = 'landing.php';
          </script>";
    exit();
}

$userId = $_SESSION['user_id']; // Get user ID from session

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Sanitize input
        $petName = htmlspecialchars($_POST['petName']);
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $weight = $_POST['weight'];
        $species = htmlspecialchars($_POST['species']);
        $breed = htmlspecialchars($_POST['breed']);
        $color = htmlspecialchars($_POST['color']);
        $distinguishingMarks = htmlspecialchars($_POST['distinguishingMarks']);
        $vaccineName = htmlspecialchars($_POST['VaccineName']);
        $vaccinationDate = $_POST['VaccinationDate'];
        $expiryDate = $_POST['ExpiryDate'];

        // Handle pet image upload
        if (!empty($_FILES['petImage']['name'])) {
            $imageDirectory = 'PetImages/';
            $imagePath = $imageDirectory . basename($_FILES['petImage']['name']);

            if (!move_uploaded_file($_FILES['petImage']['tmp_name'], $imagePath)) {
                throw new Exception("Image upload failed.");
            }
        } else {
            throw new Exception("No image file uploaded.");
        }

        // Insert species and breed if necessary
        $speciesId = null;
        $breedId = null;

        $stmt = $conn->prepare("SELECT species_id FROM species WHERE species_name = ?");
        $stmt->bind_param("s", $species);
        $stmt->execute();
        $stmt->bind_result($speciesId);
        $stmt->fetch();
        $stmt->close();

        if (!$speciesId) {
            $stmt = $conn->prepare("INSERT INTO species (species_name) VALUES (?)");
            $stmt->bind_param("s", $species);
            $stmt->execute();
            $speciesId = $stmt->insert_id;
            $stmt->close();
        }

        $stmt = $conn->prepare("SELECT breed_id FROM breeds WHERE breed_name = ? AND species_id = ?");
        $stmt->bind_param("si", $breed, $speciesId);
        $stmt->execute();
        $stmt->bind_result($breedId);
        $stmt->fetch();
        $stmt->close();

        if (!$breedId) {
            $stmt = $conn->prepare("INSERT INTO breeds (breed_name, species_id) VALUES (?, ?)");
            $stmt->bind_param("si", $breed, $speciesId);
            $stmt->execute();
            $breedId = $stmt->insert_id;
            $stmt->close();
        }

        // Insert into Pet_Information
        $stmt = $conn->prepare("INSERT INTO Pet_Information (pet_name, gender, birthdate, weight, color, distinguishing_marks, species_id, breed_id, petitioner_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssiii", $petName, $gender, $birthdate, $weight, $color, $distinguishingMarks, $speciesId, $breedId, $userId);
        $stmt->execute();
        $petId = $stmt->insert_id;
        $stmt->close();

        // Insert into pet_images
        $stmt = $conn->prepare("INSERT INTO pet_images (pet_id, image_path) VALUES (?, ?)");
        $stmt->bind_param("is", $petId, $imagePath);
        $stmt->execute();
        $stmt->close();

        // Insert into vaccinations
        $stmt = $conn->prepare("INSERT INTO vaccinations (pet_id, vaccine_name, vaccination_date, expiry_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $petId, $vaccineName, $vaccinationDate, $expiryDate);
        $stmt->execute();
        $stmt->close();

        echo "<script>
                alert('Pet added successfully.');
                window.location.href = 'index.php';
              </script>";
    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.history.back();
              </script>";
    }
}

$conn->close();
?>
