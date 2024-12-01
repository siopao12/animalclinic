
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
        <form id="addPetForm" action="process_add_pet.php" method="POST" enctype="multipart/form-data">
          <!-- Row 1 -->
          <div class="row g-2">
            <div class="col-md-4">
            <label for="petName" class="form-label">Pet Name</label>
              <input type="text" class="form-control" id="petName" name="petName" required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Age</label>
              <input type="number" class="form-control" id="age" name="age"required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Gender</label>
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
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <div class="col-md-6">
            <label for="petName" class="form-label">Weight(kg)</label>
              <input type="number" step="0.1" class="form-control" id="weight" name="weight" required>
            </div>
          </div>
          <!-- Row 3 -->
          <div class="row g-2 mt-2">
            <div class="col-md-4">
            <label for="petName" class="form-label">Species</label>
              <input type="text" class="form-control" id="species" name="species"required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Breed</label>
              <input type="text" class="form-control" id="breed" name="breed" required>
            </div>
            <div class="col-md-4">
            <label for="petName" class="form-label">Color</label>
              <input type="text" class="form-control" id="color" name="color"required>
            </div>
          </div>
          <!-- Row 4 -->
          <div class="row g-2 mt-2">
            <div class="col-md-12">
            <label for="petName" class="form-label">Distinguishing Marks</label>
              <input type="text" class="form-control" id="distinguishingMarks" name="distinguishingMarks">
            </div>
          </div>
          <!-- Row 5 -->
          <div class="row g-2 mt-2">
            <div class="col-md-6">
            <label for="petName" class="form-label">antiRabiesVaccinationDate</label>
              <input type="date" class="form-control" id="antiRabiesVaccinationDate" name="antiRabiesVaccinationDate" required>
            </div>
            <div class="col-md-6">
            <label for="petName" class="form-label">antiRabiesExpiryDate</label>
              <input type="date" class="form-control" id="antiRabiesExpiryDate" name="antiRabiesExpiryDate" required>
            </div>
          </div>
          <!-- Row 6 -->
          <div class="row g-2 mt-2">
            <div class="col-md-12">
              <label class="form-label">Choose Image of Your Pets</label>
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