<!-- Modal Section -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="addServiceForm" action="add_services.php" method="POST">
                    <div class="mb-3">
                        <label for="serviceType" class="form-label">Service Type</label>
                        <input type="text" class="form-control" name="serviceType" id="serviceType" placeholder="Enter Service Type" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description" required></textarea>
                    </div>
                    <!-- Add a hidden field for the user's ID -->
                    <input type="hidden" name="created_by" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit" class="btn btn-success float-end">Save Service</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editServiceForm" action="edit_services.php" method="POST">
                    <input type="hidden" name="serviceId" id="editServiceId">
                    <div class="mb-3">
                        <label for="editServiceType" class="form-label">Service Type</label>
                        <input type="text" class="form-control" name="serviceType" id="editServiceType" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="editDescription" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-end">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteServiceModal" tabindex="-1" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteServiceModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this service?</p>
                <form id="deleteServiceForm" action="delete_services.php" method="POST">
                    <input type="hidden" name="serviceId" id="deleteServiceId">     
                    <button type="submit" class="btn btn-danger float-end">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
