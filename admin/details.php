<?php
include 'config.php'; // Include database connection

// Check if `facility_id` is set
if (isset($_GET['facility_id'])) {
    $facility_id = intval($_GET['facility_id']); // Sanitize input

    if ($facility_id <= 0) {
        echo "<p class='text-danger'>Invalid facility ID.</p>";
        exit;
    }

    // SQL query to fetch facility details
    $sql = "
        SELECT 
            a.facility_name,
            a.mobile_number AS facility_mobile,
            a.email_address AS facility_email,
            p.surname,
            p.firstname,
            p.middlename,
            p.name_extension,
            p.mobile_number AS petitioner_mobile,
            pa.region AS petitioner_region,
            pa.city AS petitioner_city,
            pa.barangay AS petitioner_barangay,
            pa.province AS petitioner_province,
            r.role_name AS petitioner_role,
            fa.building_number,
            fa.block,
            fa.lot_number,
            fa.street,
            fa.sitio,
            fa.subdivision,
            fa.village,
            fa.barangay AS facility_barangay,
            fa.municipality AS facility_municipality,
            fa.province AS facility_province,
            fa.region AS facility_region,
            fa.city AS facility_city,
            a.status AS facility_status,
            a.submitted_date
        FROM animal_facility_information a
        INNER JOIN petitioner_information p ON a.petitioner_id = p.petitioner_id
        INNER JOIN roles r ON p.role_id = r.role_id
        INNER JOIN petitioner_address pa ON p.address_id = pa.address_id
        INNER JOIN facility_address fa ON a.facility_address_id = fa.facility_address_id
        WHERE a.facility_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $facility_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $facilityData = $result->fetch_assoc();
            ?>
            <!-- Display Facility Data -->
            <div class="container">
                <!-- Petitioner Information -->
                <div class="border rounded p-3 mb-3">
                    <h5 class="text-success border-bottom pb-2">Petitioner Information</h5>
                    <p><strong>Name:</strong> <?= htmlspecialchars($facilityData['surname'] . ', ' . $facilityData['firstname'] . ' ' . ($facilityData['middlename'] ?? '') . ' ' . ($facilityData['name_extension'] ?? '')) ?></p>
                    <p><strong>Mobile:</strong> <?= htmlspecialchars($facilityData['petitioner_mobile']) ?></p>
                    <p><strong>Middlename:</strong> <?= htmlspecialchars($facilityData['middlename'] ?? 'N/A') ?></p>
                    <p><strong>Name Extension:</strong> <?= htmlspecialchars($facilityData['name_extension'] ?? 'N/A') ?></p>

                </div>

                <!-- Facility Information -->
                <div class="border rounded p-3 mb-3">
                    <h5 class="text-success border-bottom pb-2">Facility Information</h5>
                    <p><strong>Facility Name:</strong> <?= htmlspecialchars($facilityData['facility_name']) ?></p>
                    <p><strong>Mobile:</strong> <?= htmlspecialchars($facilityData['facility_mobile']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($facilityData['facility_email']) ?></p>
                    <p><strong>Province:</strong> <?= htmlspecialchars($facilityData['facility_province'] ?? 'N/A') ?></p>
                    <p><strong>Region:</strong> <?= htmlspecialchars($facilityData['facility_region'] ?? 'N/A') ?></p>
                    <p><strong>Barangay:</strong> <?= htmlspecialchars($facilityData['facility_barangay'] ?? 'N/A') ?></p>
                    <p><strong>City:</strong> <?= htmlspecialchars($facilityData['facility_city'] ?? 'N/A') ?></p>
                    <p><strong>Building Number:</strong> <?= htmlspecialchars($facilityData['building_number'] ?? 'N/A') ?></p>
                    <p><strong>Block:</strong> <?= htmlspecialchars($facilityData['block'] ?? 'N/A') ?></p>
                        <p><strong>Lot Number:</strong> <?= htmlspecialchars($facilityData['lot_number'] ?? 'N/A') ?></p>
                        <p><strong>Street:</strong> <?= htmlspecialchars($facilityData['street'] ?? 'N/A') ?></p>
                        <p><strong>Sitio:</strong> <?= htmlspecialchars($facilityData['sitio'] ?? 'N/A') ?></p>
                        <p><strong>Subdivision:</strong> <?= htmlspecialchars($facilityData['subdivision'] ?? 'N/A') ?></p>
                        <p><strong>Village:</strong> <?= htmlspecialchars($facilityData['village'] ?? 'N/A') ?></p>
                </div>
                </div>
            </div>

            <?php
        } else {
            echo "<p class='text-danger'>No data found for this facility.</p>";
        }
    } else {
        echo "<p class='text-danger'>Database query failed.</p>";
    }

    $stmt->close();
} else {
    echo "<p class='text-danger'>Invalid or missing facility ID.</p>";
}

$conn->close();
?>
