
<!-- My Pet Section -->
<div class="container">
    <!-- Header Section -->
    <h2 class="text-success fw-bold mb-4 text-center text-md-start">MY PETS</h2>

    <!-- Search, Filter, and Buttons -->
    <div class="row g-3 align-items-center mb-4">
        <!-- Search -->
        <div class="col-12 col-md-4">
            <div class="d-flex flex-column flex-md-row align-items-center">
                <label for="search" class="form-label me-md-2 mb-1 mb-md-0">Search:</label>
                <input type="text" id="search" class="form-control" placeholder="Search by name or type">
            </div>
        </div>
        <!-- Filter -->
        <div class="col-12 col-md-4">
            <div class="d-flex flex-column flex-md-row align-items-center">
                <label for="filter" class="form-label me-md-2 mb-1 mb-md-0">Filter:</label>
                <select id="filter" class="form-select">
                    <option selected>All Types</option>
                    <option>Dogs</option>
                    <option>Cats</option>
                </select>
            </div>
        </div>
        <!-- Buttons -->
        <div class="col-12 col-md-4 d-flex flex-column flex-sm-row gap-2">
            <button class="btn btn-primary w-100 w-sm-auto" data-bs-toggle="modal" data-bs-target="#addPetModal">+ Add Pet</button>
            <button class="btn btn-success w-100 w-sm-auto" data-bs-toggle="modal" data-bs-target="#symptomsDetailsModal">+ Add Condition</button>
        </div>
    </div>
</div>


    <!-- Pet Cards -->
    <?php include 'pet_data.php'; ?>
    
  <!-- Edit Pet Modal -->
<div class="modal fade" id="editPetModal" tabindex="-1" aria-labelledby="editPetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="editPetModalLabel">Edit Pet Information</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form id="editPetForm" action="update_pet.php" method="POST" enctype="multipart/form-data">
          <!-- Hidden field for Pet ID -->
          <input type="hidden" name="pet_id" id="editPetId">

          <div class="row g-3">
            <!-- Pet Name -->
            <div class="col-md-6">
              <label for="editPetName" class="form-label">Pet Name</label>
              <input type="text" class="form-control" id="editPetName" name="pet_name" required>
            </div>
            <!-- Birthdate -->
            <div class="col-md-6">
              <label for="editPetBirthdate" class="form-label">Birthdate</label>
              <input type="date" class="form-control" id="editPetBirthdate" name="birthdate" required>
            </div>
            <!-- Gender -->
            <div class="col-md-6">
              <label for="editPetGender" class="form-label">Gender</label>
              <select class="form-select" id="editPetGender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <!-- Weight -->
            <div class="col-md-6">
              <label for="editPetWeight" class="form-label">Weight (kg)</label>
              <input type="number" class="form-control" id="editPetWeight" name="weight" step="0.1" required>
            </div>
            <!-- Species -->
            <div class="col-md-6">
              <label for="editPetSpecies" class="form-label">Species</label>
              <input type="text" class="form-control" id="editPetSpecies" name="species" required>
            </div>
            <!-- Breed -->
            <div class="col-md-6">
              <label for="editPetBreed" class="form-label">Breed</label>
              <input type="text" class="form-control" id="editPetBreed" name="breed" required>
            </div>
            <!-- Color -->
            <div class="col-md-6">
              <label for="editPetColor" class="form-label">Color</label>
              <input type="text" class="form-control" id="editPetColor" name="color" required>
            </div>
            <!-- Distinguishing Marks -->
            <div class="col-md-6">
                <label for="editDistinguishingMark" class="form-label">Distinguishing Marks</label>
                <input type="text" class="form-control" id="editDistinguishingMark" name="distinguishingMarks">
                </div>
            <!-- Vaccine Name -->
            <div class="col-md-6">
              <label for="editVaccineName" class="form-label">Vaccine Name</label>
              <input type="text" class="form-control" id="editVaccineName" name="vaccine_name" required>
            </div>
            <!-- Vaccination Date -->
            <div class="col-md-6">
              <label for="editVaccinationDate" class="form-label">Vaccination Date</label>
              <input type="date" class="form-control" id="editVaccinationDate" name="vaccination_date" required>
            </div>
            <!-- Expiry Date -->
            <div class="col-md-6">
              <label for="editExpiryDate" class="form-label">Expiry Date</label>
              <input type="date" class="form-control" id="editExpiryDate" name="expiry_date" required>
            </div>
            <!-- Pet Image -->
            <div class="col-md-6">
              <label for="editPetImage" class="form-label">Choose Image</label>
              <input type="file" class="form-control" id="editPetImage" name="pet_image" accept="image/*">
            </div>
          </div>
        </form>
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" form="editPetForm">Save Changes</button>
      </div>
    </div>
  </div>
</div>



<!-- Delete Pet Modal -->
<div class="modal fade" id="deletePetModal" tabindex="-1" aria-labelledby="deletePetModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="delete_pet.php" method="POST">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deletePetModalLabel">Delete Pet</h5>
          <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this pet?</p>
          <input type="hidden" id="deletePetId" name="deletePetId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Populate the modal with the pet ID
  document.querySelectorAll('.btn-danger[data-bs-target="#deletePetModal"]').forEach(button => {
    button.addEventListener('click', function() {
      const petId = this.getAttribute('data-id');
      document.getElementById('deletePetId').value = petId;
    });
  });
</script>


<script>
   document.addEventListener("DOMContentLoaded", () => {
  // Get the modal and form elements
  const editPetModal = document.getElementById("editPetModal");
  const editPetForm = document.getElementById("editPetForm");

  // When the modal is about to be shown
  editPetModal.addEventListener("show.bs.modal", function (event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    // Extract data-* attributes from the button
    const petId = button.getAttribute("data-id");
    const petName = button.getAttribute("data-name");
    const gender = button.getAttribute("data-gender");
    const birthdate = button.getAttribute("data-birthdate");
    const weight = button.getAttribute("data-weight");
    const color = button.getAttribute("data-color");
    const species = button.getAttribute("data-species");
    const breed = button.getAttribute("data-breed");
    const marks = button.getAttribute("data-marks");
    const vaccineName = button.getAttribute("data-vaccine-name");
    const vaccinationDate = button.getAttribute("data-vaccination-date");
    const expiryDate = button.getAttribute("data-expiry-date");

    // Populate the form fields
    editPetForm.querySelector("#editPetId").value = petId;
    editPetForm.querySelector("#editPetName").value = petName;
    editPetForm.querySelector("#editPetGender").value = gender;
    editPetForm.querySelector("#editPetBirthdate").value = birthdate;
    editPetForm.querySelector("#editPetWeight").value = weight;
    editPetForm.querySelector("#editPetColor").value = color;
    editPetForm.querySelector("#editPetSpecies").value = species;
    editPetForm.querySelector("#editPetBreed").value = breed;
    editPetForm.querySelector("#editDistinguishingMark").value = marks;
    editPetForm.querySelector("#editVaccineName").value = vaccineName;
    editPetForm.querySelector("#editVaccinationDate").value = vaccinationDate;
    editPetForm.querySelector("#editExpiryDate").value = expiryDate;
  });
});

</script>


