<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="approveForm" action="approve_application.php" method="POST">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="approveModalLabel">Approve Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to approve this request?</p>
                    <!-- Hidden input for facility ID -->
                    <input type="hidden" id="facility-id-input" name="facility_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Approve</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.approve-button').forEach(button => {
        button.addEventListener('click', function () {
            // Get the facility ID from the button's data-id attribute
            const facilityId = this.getAttribute('data-id');
            document.getElementById('facility-id-input').value = facilityId;

            // Show the modal
            const approveModal = new bootstrap.Modal(document.getElementById('approveModal'));
            approveModal.show();
        });
    });

    // Reset modal input when it is hidden
    document.getElementById('approveModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('facility-id-input').value = '';
    });
</script>



<!-- Decline Modal -->
<div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="declineForm" action="decline_application.php" method="POST">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="declineModalLabel">Decline Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to decline this request?</p>
                    <!-- Hidden input for facility ID -->
                    <input type="hidden" id="decline-facility-id" name="facility_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Decline</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.decline-button').forEach(button => {
        button.addEventListener('click', function () {
            // Get the facility ID from the button's data-id attribute
            const facilityId = this.getAttribute('data-id');
            document.getElementById('decline-facility-id').value = facilityId;

            // Show the modal
            const declineModal = new bootstrap.Modal(document.getElementById('declineModal'));
            declineModal.show();
        });
    });

    // Reset modal input when it is hidden
    document.getElementById('declineModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('decline-facility-id').value = '';
    });
</script>


<!-- View Details Modal -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="viewDetailsModalLabel">Request Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Placeholder for dynamically loaded content -->
                <div id="modalContent">
                    <p>Loading details...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Fetch and Load Data Dynamically -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Attach click event to all buttons with class 'view-button'
        document.querySelectorAll(".view-button").forEach(button => {
            button.addEventListener("click", function () {
                const facilityId = this.getAttribute("data-id");
                const modalContent = document.getElementById("modalContent");

                // Fetch details via AJAX
                fetch(`details.php?facility_id=${facilityId}`)
                    .then(response => response.text())
                    .then(data => {
                        modalContent.innerHTML = data;
                    })
                    .catch(error => {
                        modalContent.innerHTML = `<p class="text-danger">Error loading details. Please try again later.</p>`;
                        console.error("Error fetching details:", error);
                    });
            });
        });
    });
</script>






