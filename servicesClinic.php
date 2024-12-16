

<div class="col-12">
    <div class="my-services-section p-4 rounded shadow" style="background-color: #f1faf1;">
        <h4 class="section-title text-center text-success fw-bold">OFFERED SERVICES</h4>
        <div id="servicesCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php if (!empty($chunkedServices)): ?>
                    <?php foreach ($chunkedServices as $index => $serviceGroup): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="row justify-content-center g-3">
                                <?php foreach ($serviceGroup as $service): ?>
                                    <div class="col-md-3">
                                        <div class="card h-100 shadow-sm border-0">
                                            <div class="card-body">
                                                <h5 class="card-title text-success fw-bold">
                                                    <?php echo htmlspecialchars($service['service_type']); ?>
                                                </h5>
                                                <p class="card-text">
                                                    <?php echo htmlspecialchars($service['description']); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carousel-item active">
                        <div class="row justify-content-center g-3">
                            <div class="col-md-12 text-center">
                                <p class="text-muted">No services available at the moment.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<!-- Available Clinics Section -->
<div class="col-12 mt-4">
    <div class="my-clinics-section p-4 rounded shadow" style="background-color: #f1faf1;">
        <h4 class="section-title text-center text-success fw-bold">AVAILABLE CLINICS</h4>
        <div class="row justify-content-center g-3 mt-4">
            <!-- Clinic Card 1 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="image/clinic.jpg" class="card-img-top" alt="Paw's Doctor Toril Branch">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold">Paw's Doctor Toril Branch</h5>
                        <p class="card-text">Address: 3QG4+6M6, Beside Mercury Drugstore, Mintal, Tugbok, Davao City, Davao del Sur</p>
                        <div class="d-flex justify-content-around mt-3">
                            <a href="#" class="text-success"><i class="bi bi-telephone-fill"></i> Call</a>
                            <a href="#" class="text-success"><i class="bi bi-geo-alt-fill"></i> Directions</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Clinic Card 2 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="clinic_image.png" class="card-img-top" alt="Paw's Doctor Toril Branch">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold">Paw's Doctor Toril Branch</h5>
                        <p class="card-text">Address: 3QG4+6M6, Beside Mercury Drugstore, Mintal, Tugbok, Davao City, Davao del Sur</p>
                        <div class="d-flex justify-content-around mt-3">
                            <a href="#" class="text-success"><i class="bi bi-telephone-fill"></i> Inquiries</a>
                            <a href="#" class="text-success"><i class="bi bi-geo-alt-fill"></i> Directions</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Clinic Card 3 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="clinic_image.png" class="card-img-top" alt="Paw's Doctor Toril Branch">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold">Paw's Doctor Toril Branch</h5>
                        <p class="card-text">Address: 3QG4+6M6, Beside Mercury Drugstore, Mintal, Tugbok, Davao City, Davao del Sur</p>
                        <div class="d-flex justify-content-around mt-3">
                            <a href="#" class="text-success"><i class="bi bi-telephone-fill"></i> Inquiries</a>
                            <a href="#" class="text-success"><i class="bi bi-geo-alt-fill"></i> Directions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>