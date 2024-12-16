document.addEventListener('DOMContentLoaded', () => {
    const viewButtons = document.querySelectorAll('.view-button');
    const modalBody = document.querySelector('#viewDetailsModal .modal-body');

    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            const facilityId = button.getAttribute('data-id');

            // Check if facilityId is valid
            if (!facilityId) {
                modalBody.innerHTML = `<p class="text-danger">Invalid facility ID.</p>`;
                return;
            }

            // Fetch details from the backend
            fetch('details.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `facility_id=${encodeURIComponent(facilityId)}`
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        modalBody.innerHTML = `<p class="text-danger">${data.error}</p>`;
                    } else {
                        modalBody.innerHTML = `
                            <h5>Petitioner Information</h5>
                            <p><strong>Name:</strong> ${data.surname}, ${data.firstname} ${data.middlename || ''} ${data.name_extension || ''}</p>
                            <p><strong>Mobile:</strong> ${data.petitioner_mobile}</p>
                            <p><strong>Region:</strong> ${data.petitioner_region}</p>
                            <p><strong>City:</strong> ${data.petitioner_city}</p>
                
                            <h5>Facility Information</h5>
                            <p><strong>Facility Name:</strong> ${data.facility_name}</p>
                            <p><strong>Mobile:</strong> ${data.facility_mobile}</p>
                            <p><strong>Email Address:</strong> ${data.facility_email}</p>
                
                            <h5>Facility Address</h5>
                            <p><strong>Building Number:</strong> ${data.building_number || 'N/A'}</p>
                            <p><strong>Block:</strong> ${data.block || 'N/A'}</p>
                            <p><strong>Lot Number:</strong> ${data.lot_number || 'N/A'}</p>
                            <p><strong>Street:</strong> ${data.street || 'N/A'}</p>
                            <p><strong>Sitio:</strong> ${data.sitio || 'N/A'}</p>
                            <p><strong>Subdivision:</strong> ${data.subdivision || 'N/A'}</p>
                            <p><strong>Village:</strong> ${data.village || 'N/A'}</p>
                            <p><strong>Barangay:</strong> ${data.facility_barangay || 'N/A'}</p>
                            <p><strong>Municipality:</strong> ${data.facility_municipality || 'N/A'}</p>
                            <p><strong>Province:</strong> ${data.facility_province || 'N/A'}</p>
                            <p><strong>Region:</strong> ${data.facility_region || 'N/A'}</p>
                            <p><strong>City:</strong> ${data.facility_city || 'N/A'}</p>
                        `;
                    }
                })
                .catch(error => {
                    modalBody.innerHTML = `<p class="text-danger">Error fetching data. Please try again later.</p>`;
                    console.error("Fetch error:", error);
                });
        });
    });
});
