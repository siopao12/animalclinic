<?php
include 'config.php'; // Include database connection

$sql = "SELECT 
            a.facility_id,
            p.firstname AS petitioner_firstname,
            p.surname AS petitioner_surname,
            a.facility_name,
            f.region,
            f.city,
            a.status AS request_status,
            a.submitted_date,
            r.role_name
        FROM 
            animal_facility_information a
        JOIN 
            petitioner_information p ON a.petitioner_id = p.petitioner_id
        JOIN 
            facility_address f ON a.facility_address_id = f.facility_address_id
        JOIN 
            roles r ON a.selected_role = r.role_id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Determine badge class for the status
        $badgeClass = $row['request_status'] === 'pending' ? 'bg-warning' : 
                      ($row['request_status'] === 'approved' ? 'bg-success' : 'bg-danger');

        echo "<div class='card mb-3 border-success'>
                <div class='card-body'>
                    <h5 class='card-title text-success'>Facility ID: {$row['facility_id']}</h5>
                    <p class='mb-1'><strong>Petitioner Name:</strong> {$row['petitioner_surname']}, {$row['petitioner_firstname']}</p>
                    <p class='mb-1'><strong>Facility Name:</strong> {$row['facility_name']}</p>
                    <p class='mb-1'><strong>Region:</strong> {$row['region']}</p>
                    <p class='mb-1'><strong>City:</strong> {$row['city']}</p>
                    <p class='mb-1'><strong>Status:</strong> 
                        <span class='badge {$badgeClass}'>{$row['request_status']}</span>
                    </p>
                    <p class='mb-1'><strong>Date Submitted:</strong> {$row['submitted_date']}</p>
                    <p class='mb-1'><strong>Role:</strong> {$row['role_name']}</p>
                    <div class='d-grid gap-2 mt-3'>
                        <!-- View Button -->
                        <button 
                            class='btn btn-info btn-sm view-button' 
                            data-id='" . htmlspecialchars($row['facility_id']) . "' 
                            data-bs-toggle='modal' 
                            data-bs-target='#viewDetailsModal'>
                            <i class='bi bi-eye'></i> View
                        </button>

                        <!-- Approve Button -->
                        <button 
                            class='btn btn-success btn-sm' 
                            data-id='" . htmlspecialchars($row['facility_id']) . "' 
                            data-bs-toggle='modal' 
                            data-bs-target='#approveModal'>
                            <i class='bi bi-check-circle'></i> Approve
                        </button>

                        <!-- Decline Button -->
                        <button 
                            class='btn btn-danger btn-sm' 
                            data-id='" . htmlspecialchars($row['facility_id']) . "' 
                            data-bs-toggle='modal' 
                            data-bs-target='#declineModal'>
                            <i class='bi bi-x-circle'></i> Decline
                        </button>
                    </div>
                </div>
              </div>";
    }
} else {
    echo "<div class='text-center'>No applications found</div>";
}
?>
