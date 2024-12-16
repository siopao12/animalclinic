<?php
include 'config.php'; // Include the database connection

// Query to fetch data
$sql = "SELECT 
            a.facility_id, 
            CONCAT(p.surname, ', ', p.firstname) AS petitioner_name,
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
        // Determine badge class for status
        $badgeClass = $row['request_status'] === 'pending' ? 'bg-warning' : 
                      ($row['request_status'] === 'approved' ? 'bg-success' : 'bg-danger');

        // Generate each table row
        echo "<tr>
                <td>{$row['facility_id']}</td>
                <td>{$row['petitioner_name']}</td>
                <td>{$row['facility_name']}</td>
                <td>{$row['region']}</td>
                <td>{$row['city']}</td>
                <td><span class='badge {$badgeClass}'>{$row['request_status']}</span></td>
                <td>{$row['submitted_date']}</td>
                <td>{$row['role_name']}</td>
                <td>
                    <div class='d-flex justify-content-center gap-2'>
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
                            class='btn btn-success btn-sm approve-button' 
                            data-id='" . htmlspecialchars($row['facility_id']) . "' 
                            data-bs-toggle='modal' 
                            data-bs-target='#approveModal'>
                            <i class='bi bi-check-circle'></i> Approve
                        </button>

                        <!-- Decline Button -->
                        <button 
                            class='btn btn-danger btn-sm decline-button' 
                            data-id='" . htmlspecialchars($row['facility_id']) . "' 
                            data-bs-toggle='modal' 
                            data-bs-target='#declineModal'>
                            <i class='bi bi-x-circle'></i> Decline
                        </button>
                    </div>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='9' class='text-center'>No data available</td></tr>";
}
?>
