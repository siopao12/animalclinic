<!-- Add Pet Modal -->
<div class="modal fade" id="addPetModal" tabindex="-1" aria-labelledby="addPetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addPetModalLabel">ADD PETS</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Form Start -->
        <form id="addPetForm" action="submit_pets.php" method="POST" enctype="multipart/form-data">
          <!-- Row 1 -->
          <div class="row g-2">
            <div class="col-md-4">
              <label for="petName" class="form-label">Pet Name</label>
              <input type="text" class="form-control" id="petName" name="petName" required>
            </div>
            <div class="col-md-4">
              <label for="birthdate" class="form-label">Birthdate</label>
              <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <div class="col-md-4">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" id="gender" name="gender" required>
                <option value="" disabled selected>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <!-- Row 2 -->
          <div class="row g-2 mt-2">
            <div class="col-md-6">
              <label for="weight" class="form-label">Weight (kg)</label>
              <input type="number" step="0.1" class="form-control" id="weight" name="weight" required>
            </div>
            <div class="col-md-6">
              <label for="species" class="form-label">Species</label>
              <input type="text" class="form-control" id="species" name="species" required>
            </div>
          </div>
          <!-- Row 3 -->
          <div class="row g-2 mt-2">
            <div class="col-md-4">
              <label for="breed" class="form-label">Breed</label>
              <input type="text" class="form-control" id="breed" name="breed" required>
            </div>
            <div class="col-md-4">
              <label for="color" class="form-label">Color</label>
              <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="col-md-4">
              <label for="distinguishingMarks" class="form-label">Distinguishing Marks</label>
              <input type="text" class="form-control" id="distinguishingMarks" name="distinguishingMarks" placeholder="e.g., White spot on the chest" required>

            </div>
          </div>
          <!-- Row 4 -->
          <div class="row g-2 mt-2">
            <div class="col-md-4">
              <label for="vaccineName" class="form-label">Vaccine Name</label>
              <input type="text" class="form-control" id="vaccineName" name="VaccineName" required>
            </div>
            <div class="col-md-4">
              <label for="VaccinationDate" class="form-label">Vaccination Date</label>
              <input type="date" class="form-control" id="VaccinationDate" name="VaccinationDate" required>
            </div>
            <div class="col-md-4">
              <label for="ExpiryDate" class="form-label">Expiry Date</label>
              <input type="date" class="form-control" id="ExpiryDate" name="ExpiryDate" required>
            </div>
          </div>
          
          <!-- Row 5 -->
          <div class="row g-2 mt-2">
            <div class="col-md-12">
              <label class="form-label">Choose Image of Your Pet</label>
              <input type="file" class="form-control" id="petImage" name="petImage" accept="image/*" required>
            </div>
          </div>
          <!-- Form End -->
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
        </form>
    </div>
  </div>
</div>





<!-- Add Your Clinic Modal -->
<div class="modal fade" id="addClinicModal" tabindex="-1" aria-labelledby="addClinicModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold" id="addClinicModalLabel">Add Your Clinic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <form id="addClinicForm" action="add_clinic.php" method="POST">
                <div class="modal-body">
                    <!-- Facility Information -->
                    <h6 class="fw-bold mb-3 text-success">Animal Facility Information</h6>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="facility_name" placeholder="Facility Name" required>
                        </div>
                        <div class="col-md-6">
                            <select id="region" name="region" class="form-select" required>
                                <option value="" selected>Region</option>
                                <!-- Populate regions dynamically -->
                            </select>
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-6">
                            <select id="province" name="province" class="form-select" required>
                                <option value="" selected>Province</option>
                                <!-- Populate provinces dynamically -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select id="city" name="city" class="form-select" required>
                                <option value="" selected>City</option>
                                <!-- Populate cities dynamically -->
                            </select>
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-4">
                            <select id="barangay" name="barangay" class="form-select" required>
                                <option value="" selected>Barangay</option>
                                <!-- Populate barangays dynamically -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipality">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="building_number" placeholder="Building Number">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="block" placeholder="Block">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="lot_number" placeholder="Lot Number">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="street" placeholder="Street">
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="sitio" placeholder="Sitio">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="subdivision" placeholder="Subdivision">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="village" placeholder="Village">
                        </div>
                        <div class="col-md-3">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-12">
                            <label for="petitionerRole" class="form-label fw-bold mb-3 text-success">Select Petitioner Role</label>
                            <select id="petitionerRole" name="selected_role_id" class="form-select" required>
                                <option value="" selected>Select Role</option>
                                <?php
                                // Include your database connection file
                                include 'config.php';

                                // Fetch roles dynamically from the database, excluding roles with role_id 1 and 6
                                $sql = "SELECT role_id, role_name FROM roles WHERE role_id NOT IN (1, 6)";
                                $result = $conn->query($sql);

                                if (!$result) {
                                    echo "<option value=''>Error fetching roles</option>";
                                } else {
                                    while ($role = $result->fetch_assoc()) {
                                        echo "<option value='{$role['role_id']}'>{$role['role_name']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Symptoms Details Modal -->
<div class="modal fade" id="symptomsDetailsModal" tabindex="-1" aria-labelledby="symptomsDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="symptomsDetailsModalLabel">Symptoms Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form id="symptomsDetailsForm" action="condition.php" method="POST">
          <!-- Select Pet -->
          <div class="mb-3">
            <label for="pet_id" class="form-label">Select Pet</label>
            <select class="form-select" id="pet_id" name="pet_id" required>
              <option value="" disabled selected>Select Pet</option>
              <?php
              // Fetch all pets for the logged-in user
              session_start();
              $user_id = $_SESSION['user_id']; // Replace with session key
              $pet_query = "SELECT pet_id, pet_name FROM Pet_Information WHERE petitioner_id = ?";
              $stmt = mysqli_prepare($conn, $pet_query);
              mysqli_stmt_bind_param($stmt, 'i', $user_id);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='{$row['pet_id']}'>{$row['pet_name']}</option>";
              }
              mysqli_stmt_close($stmt);
              ?>
            </select>
          </div>

          <!-- Select Symptoms -->
          <div class="mb-3">
            <label for="symptom" class="form-label">Select Symptoms</label>
            <select class="form-select" id="symptom" name="symptom[]" required>
              <option value="" disabled selected>Select Symptom</option>
              <option value="Cough">Cough</option>
              <option value="Fever">Fever</option>
              <option value="Loss of Appetite">Loss of Appetite</option>
              <option value="Lethargy">Lethargy</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <!-- Add Description -->
          <div class="mb-3">
            <label for="description" class="form-label">Add Description</label>
            <textarea class="form-control" id="description" name="description[]" rows="3" placeholder="Describe the symptom" required></textarea>
          </div>

          <!-- Add Other Condition Button -->
          <div class="d-grid gap-2">
            <button type="button" id="addOtherCondition" class="btn btn-outline-secondary">Add another Condition</button>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="symptomsDetailsForm" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('addOtherCondition').addEventListener('click', function () {
    const container = document.getElementById('symptomsDetailsForm');
    const newField = `
      <div class="mb-3">
        <label for="symptom" class="form-label">Select Symptoms</label>
        <select class="form-select" name="symptom[]" required>
          <option value="" disabled selected>Select Symptom</option>
          <option value="Cough">Cough</option>
          <option value="Fever">Fever</option>
          <option value="Loss of Appetite">Loss of Appetite</option>
          <option value="Lethargy">Lethargy</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Add Description</label>
        <textarea class="form-control" name="description[]" rows="3" placeholder="Describe the symptom" required></textarea>
      </div>`;
    container.insertAdjacentHTML('beforeend', newField);
  });
</script>
