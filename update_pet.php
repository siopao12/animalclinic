<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}

include 'config.php'; // Include your database configuration

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Sanitize input data
        $petId = intval($_POST['pet_id']);
        $petName = htmlspecialchars($_POST['pet_name']);
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $weight = $_POST['weight'];
        $species = htmlspecialchars($_POST['species']);
        $breed = htmlspecialchars($_POST['breed']);
        $color = htmlspecialchars($_POST['color']);
        $distinguishingMarks = htmlspecialchars($_POST['distinguishingMarks']);
        $vaccineName = htmlspecialchars($_POST['vaccine_name']);
        $vaccinationDate = $_POST['vaccination_date'];
        $expiryDate = $_POST['expiry_date'];

        // Handle pet image upload
        $imagePath = null;
        if (!empty($_FILES['pet_image']['name'])) {
            $imageDirectory = 'PetImages/';
            $imagePath = $imageDirectory . basename($_FILES['pet_image']['name']);

            if (!move_uploaded_file($_FILES['pet_image']['tmp_name'], $imagePath)) {
                throw new Exception("Image upload failed.");
            }
        }

        // Begin transaction
        $conn->begin_transaction();

        // Update Pet Information
        $stmt = $conn->prepare("UPDATE Pet_Information SET pet_name = ?, gender = ?, birthdate = ?, weight = ?, color = ?, distinguishing_marks = ? WHERE pet_id = ?");
        $stmt->bind_param("ssssssi", $petName, $gender, $birthdate, $weight, $color, $distinguishingMarks, $petId);
        $stmt->execute();
        $stmt->close();

        // Update species and breed if necessary
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

        $stmt = $conn->prepare("UPDATE Pet_Information SET species_id = ?, breed_id = ? WHERE pet_id = ?");
        $stmt->bind_param("iii", $speciesId, $breedId, $petId);
        $stmt->execute();
        $stmt->close();

        // Update vaccinations
        $stmt = $conn->prepare("UPDATE vaccinations SET vaccine_name = ?, vaccination_date = ?, expiry_date = ? WHERE pet_id = ?");
        $stmt->bind_param("sssi", $vaccineName, $vaccinationDate, $expiryDate, $petId);
        $stmt->execute();
        $stmt->close();

        // Update pet image if a new one was uploaded
        if ($imagePath) {
            $stmt = $conn->prepare("UPDATE pet_images SET image_path = ? WHERE pet_id = ?");
            $stmt->bind_param("si", $imagePath, $petId);
            $stmt->execute();
            $stmt->close();
        }

        // Commit transaction
        $conn->commit();

        echo "<script>
                alert('Pet information updated successfully.');
                window.location.href = 'index.php';
              </script>";
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.history.back();
              </script>";
    }
}

$conn->close();
?>
