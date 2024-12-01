<!--Mypet section-->
<div >
        <!-- Header Section -->
        <h2 class="text-success fw-bold mb-4">MY PETS</h2>

    <!-- Search and Filter -->
        <div class="d-flex flex-column flex-md-row justify-content-md-end align-items-stretch align-items-md-center mb-4 gap-3">
        <!-- Search -->
        <div class="d-flex flex-column flex-md-row align-items-center">
            <label for="search" class="me-md-2 mb-1 mb-md-0">Search:</label>
            <input type="text" id="search" class="form-control" style="max-width: 200px; width: 100%;">
        </div>
        <!-- Filter -->
        <div class="d-flex flex-column flex-md-row align-items-center">
            <label for="filter" class="me-md-2 mb-1 mb-md-0">Filter:</label>
            <select id="filter" class="form-select" style="max-width: 150px; width: 100%;">
            <option selected>All Types</option>
            <option>Dogs</option>
            <option>Cats</option>
            </select>
        </div>
        <!-- Add Pet Button -->
        <div class="d-flex justify-content-center justify-content-md-start">
            <button class="btn btn-primary w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#addPetModal">+ Add Pet</button>
        </div>
        </div>

    <!-- Pet Cards -->
    <div class="card border rounded-3 shadow-sm mb-4 p-3 d-flex flex-column flex-md-row align-items-center">
        <!-- Pet Image -->
        <img src="image/dog1.jpg" alt="Pet Photo" class="rounded mb-3 mb-md-0 me-md-3" style="width: 120px; height: 120px; object-fit: cover;">
        
        <!-- Pet Details -->
        <div class="text-center text-md-start flex-grow-1 w-100">
            <!-- Pet Name -->
            <h4 class="fw-bold text-success mb-3 text-center text-md-start">Name: Blacky</h4>
            <div class="row g-3 align-items-start">
                <!-- Left Column -->
                <div class="col-12 col-md-4">
                    <p class="mb-1"><span class="fw-bold">Age:</span> Dog</p>
                    <p class="mb-1"><span class="fw-bold">Gender:</span> Pitbull</p>
                    <p class="mb-1"><span class="fw-bold">Birthdate:</span> Black</p>
                    <p class="mb-1"><span class="fw-bold">Weight:</span> 15 kg</p>
                </div>
                <!-- Middle Column -->
                <div class="col-12 col-md-4">
                    <p class="mb-1"><span class="fw-bold">Species:</span> Dog</p>
                    <p class="mb-1"><span class="fw-bold">Breed:</span> Pitbull</p>
                    <p class="mb-1"><span class="fw-bold">Color:</span> Black</p>
                    <p class="mb-1"><span class="fw-bold">Distinguishing Mark:</span> White patch on chest</p>
                </div>
                <!-- Right Column -->
                <div class="col-12 col-md-4">
                    <p class="mb-1"><span class="fw-bold">Anti-Rabies Vaccination Date:</span> 2023-06-01</p>
                    <p class="mb-1"><span class="fw-bold">Anti-Rabies Expiry Date:</span> 2024-06-01</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-end mt-3 mt-md-0 w-100">
            <button class="btn btn-success btn-sm">Check Pet Health</button>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPetModal">Edit</button>
            <button class="btn btn-danger btn-sm">Delete</button>
        </div>
    </div>

    <!-- edit Modal -->
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
                    <form id="editPetForm">
                        <div class="row g-3">
                            <!-- Row 1: Name and Age -->
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Pet Name</label>
                                <input type="text" class="form-control" id="petName" placeholder="Name" value="Blacky">
                            </div>
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Age</label>
                                <input type="text" class="form-control" id="petAge" placeholder="Age" value="Dog">
                            </div>

                            <!-- Row 2: Gender and Weight -->
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="petGender" placeholder="Gender" value="Pitbull">
                            </div>
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Weight</label>
                                <input type="text" class="form-control" id="petWeight" placeholder="Weight" value="15 kg">
                            </div>

                            <!-- Row 3: Species and Breed -->
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Species</label>
                                <input type="text" class="form-control" id="petSpecies" placeholder="Species" value="Dog">
                            </div>
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Breed</label>
                                <input type="text" class="form-control" id="petBreed" placeholder="Breed" value="Pitbull">
                            </div>

                            <!-- Row 4: Color and Distinguishing Mark -->
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Color</label>
                                <input type="text" class="form-control" id="petColor" placeholder="Color" value="Black">
                            </div>
                            <div class="col-md-6">
                                <label for="petName" class="form-label">Distinguishing Mark</label>
                                <input type="text" class="form-control" id="distMark" placeholder="Distinguishing Mark" value="White patch on chest">
                            </div>

                            <!-- Row 5: Vaccination Date and Expiry Date -->
                            <div class="col-md-6">
                                <label for="petName" class="form-label">vaccinationDate</label>
                                <input type="date" class="form-control" id="vaccinationDate" value="2023-06-01">
                            </div>
                            <div class="col-md-6">
                                <label for="petName" class="form-label">expiryDate</label>
                                <input type="date" class="form-control" id="expiryDate" value="2024-06-01">
                            </div>

                            <!-- Row 6: File Upload -->
                            <div class="col-12">
                                <label for="petName" class="form-label">Choose Image of your pets</label>
                                <input type="file" class="form-control" id="petImage" placeholder="Choose Image of your pets">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" form="editPetForm">Save</button>
                </div>
            </div>
        </div>
    </div>
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

