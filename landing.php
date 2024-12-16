<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Health Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex align-items-center">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="image/logo.png" alt="Logo" width="40">
        </a>
        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ms-0"><a class="nav-link fw-bold" href="#">Home</a></li>
                    <li class="nav-item dropdown ms-0">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="#">Check up and Medical Test</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Deworming</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Vaccines</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Grooming</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Pet accessories</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Emergencies</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Home Service</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Advice on Responsible Pet Ownership</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ms-0">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="branchesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Branches</a>
                        <ul class="dropdown-menu" aria-labelledby="branchesDropdown">
                            <li><a class="dropdown-item" href="#">Mintal</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Toril</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Deca Tugbok</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Baliok</a></li>
                        </ul>
                    </li>
    </li>
    <li class="nav-item ms-0"><a class="nav-link fw-bold" href="#">About us</a></li>
</ul>
            <!-- Register Now Button -->
            <a href="#" class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#registerModal">Register Now</a>
        </div>
    </div>
</nav>

    <header class="hero-section text-center text-md-start py-5">
        <div class="container d-flex flex-column flex-md-row align-items-center">
            <div class="hero-text text-center text-md-start">
                <h1 class="fw-bold">Quality and Reliable Animal Health Care Service within your reach</h1>
            </div>
            <div class="hero-image ms-md-auto mt-4 mt-md-0">
                <img src="image/dogcat.png" alt="Dog and Cat" class="img-fluid">
            </div>
        </div>
    </header>

<!-- sevices section -->

    <section class="services py-5">
    <div class="container text-center">
        <h2 class="fw-bold text-success mb-3">SERVICES WE PROVIDE</h2>
        <p class="text-muted mb-5">
            We offer a complete range of veterinary services to support the health and well-being of your pets, providing compassionate and reliable care.
        </p>
        <div class="row g-4">
            <!-- Service Item 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/medical.png" alt="Check Up" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Check Up and Medical Test</h5>
                    <p>If your pets are behaving unwell such as medical issues, please bring them to the clinic.</p>
                </div>
            </div>
            <!-- Service Item 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/deworm.png" alt="Deworming" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Deworming</h5>
                    <p>Regular deworming is needed for your pets to stay healthy and rid of the intestinal parasites.</p>
                </div>
            </div>
            <!-- Service Item 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/vaccine.png" alt="Vaccines" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Vaccines</h5>
                    <p>Vaccinate your pets to protect them from unwanted yet preventive diseases such as parvovirus and distemper.</p>
                </div>
            </div>
            <!-- Service Item 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/gromming.png" alt="Grooming" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Grooming</h5>
                    <p>Cut-off time is at 2pm. Bring your pets for their much-needed grooming and cleaning. Call for an appointment.</p>
                </div>
            </div>
            <!-- Service Item 5 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/toys.png" alt="Pet accessories" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Pet accessories</h5>
                    <p>We have many sorts of pet accessories from toys to bowls, leashes to clothes.</p>
                </div>
            </div>
            <!-- Service Item 6 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/emergency.png" alt="Emergencies" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Emergencies</h5>
                    <p>We cater to emergencies after regular clinic hours. No need to call or send a PM. We have an in-house vet.</p>
                </div>
            </div>
            <!-- Service Item 7 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/home.png" alt="Home Service" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Home Service</h5>
                    <p>Depending on the availability of the vet, they can visit your house for deworm and vaccinations.</p>
                </div>
            </div>
            <!-- Service Item 8 -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card p-3">
                    <div class="service-icon mb-3">
                        <img src="image/advice.png" alt="Advice" class="img-fluid" style="height: 60px;">
                    </div>
                    <h5 class="fw-bold">Advice on Responsible Pet Ownership</h5>
                    <p>Learn how to be a good and informed owner. Get advice on how to keep your pets healthy.</p>
                </div>
            </div>
        </div>
        <p class="text-muted mt-4">* Please contact your preferred branch for the availability of these services.</p>
    </div>
</section>
<!--testomonial section -->
<section class="testimonials py-5">
    <div class="container text-center">
        <h2 class="fw-bold text-success mb-3">“There is nothing that comes close to the unconditional love of a pet.”</h2>
        <p class="text-muted mb-5">- From our dearest Customers</p>

        <div id="customerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Carousel Item 1 -->
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <img src="image/1.jpg" class="img-fluid rounded" alt="Customer 1">
                        </div>
                        <div class="col-md-3">
                            <img src="image/2.jpg" class="img-fluid rounded" alt="Customer 2">
                        </div>
                        <div class="col-md-3">
                            <img src="image/3.jpg" class="img-fluid rounded" alt="Customer 3">
                        </div>
                        <div class="col-md-3">
                            <img src="image/4.jpg" class="img-fluid rounded" alt="Customer 4">
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 2 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <img src="image/5.jpg" class="img-fluid rounded" alt="Customer 5">
                        </div>
                        <div class="col-md-3">
                            <img src="image/6.png" class="img-fluid rounded" alt="Customer 6">
                        </div>
                        <div class="col-md-3">
                            <img src="image/7.png" class="img-fluid rounded" alt="Customer 7">
                        </div>
                        <div class="col-md-3">
                            <img src="image/8.png" class="img-fluid rounded" alt="Customer 8">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#customerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-success rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#customerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-success rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!--Branches section -->
<section class="locations py-5">
    <div class="container text-center">
        <h2 class="fw-bold text-success mb-3">WHERE TO FIND US</h2>
        <p class="text-muted mb-5">
            We currently have four branches conveniently located all over Davao, each one equipped and ready to provide you with the highest quality in pet health care.
        </p>
        <div class="row g-4">
            <!-- Branch 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="location-card p-3 text-start h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="location-icon">
                            <img src="image/location.png" alt="Location Icon" style="height: 40px; width: 40px;">
                        </div>
                        <h5 class="fw-bold ms-2 mb-0">PAW'S DOCTOR ANIMAL CLINIC</h5>
                    </div>
                    <p><strong>Mintal</strong></p>
                    <p><strong>Address:</strong>3GC4+6M6, Beside Mercury Drugstore, Mintal, Tugbok, Davao City, Davao del Sur</p>
                    <p><strong>Appointments and Inquiries:</strong> 09033860250</p>
                    <p><strong>Clinic Hours:</strong> 8:00 AM to 6:00 PM, Monday to Friday; 8:00 AM to 5:00 PM, Saturday to Sunday</p>
                    <p><strong>Emergency:</strong> Open 24/7</p>
                </div>
            </div>
            <!-- Branch 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="location-card p-3 text-start h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="location-icon">
                            <img src="image/location.png" alt="Location Icon" style="height: 40px; width: 40px;">
                        </div>
                        <h5 class="fw-bold ms-2 mb-0">PAW'S DOCTOR ANIMAL CLINIC</h5>
                    </div>
                    <p><strong>Toril</strong></p>
                    <p><strong>Address:</strong>2F8X+F6Q, De Guzman St, Toril, Davao City, Davao del Sur</p>
                    <p><strong>Appointments and Inquiries:</strong> (09562339009) / (09558327256)</p>
                    <p><strong>Clinic Hours:</strong> 8:00 AM to 6:00 PM, Monday to Friday; 8:00 AM to 5:00 PM, Saturday to Sunday</p>
                </div>
            </div>
            <!-- Branch 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="location-card p-3 text-start h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="location-icon">
                            <img src="image/location.png" alt="Location Icon" style="height: 40px; width: 40px;">
                        </div>
                        <h5 class="fw-bold ms-2 mb-0">PAW'S DOCTOR ANIMAL CLINIC</h5>
                    </div>
                    <p><strong>Deca Tugbok</strong></p>
                    <p><strong>Address:</strong>Tugbok, Davao City, Davao del Sur</p>
                    <p><strong>Appointments and Inquiries:</strong> 09033860250</p>
                    <p><strong>Clinic Hours:</strong> 8:00 AM to 6:00 PM, Monday to Friday; 8:00 AM to 5:00 PM, Saturday to Sunday</p>
                </div>
            </div>
            <!-- Branch 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="location-card p-3 text-start h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="location-icon">
                            <img src="image/location.png" alt="Location Icon" style="height: 40px; width: 40px;">
                        </div>
                        <h5 class="fw-bold ms-2 mb-0">PAW'S DOCTOR ANIMAL CLINIC</h5>
                    </div>
                    <p><strong>Baliok</strong></p>
                    <p><strong>Address:</strong>3GC4+6M6, Beside Mercury Drugstore, Mintal, Tugbok, Davao City, Davao del Sur</p>
                    <p><strong>Appointments and Inquiries:</strong> 09033860250</p>
                    <p><strong>Clinic Hours:</strong> 8:00 AM to 6:00 PM, Monday to Friday; 8:00 AM to 5:00 PM, Saturday to Sunday</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer section-->
<footer class="footer bg-success text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo and Slogan -->
            <div class="col-lg-3 col-md-6 d-flex align-items-center mb-4 mb-lg-0">
                <img src="image/logos.png" alt="Logo" class="img-fluid me-3" style="width: 80px;">
                <p class="mb-0">Quality and Reliable Animal Health Care Service within your reach</p>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h6 class="fw-bold text-uppercase">Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Services</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Branches</a></li>
                    <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
                </ul>
            </div>

            <!-- Branches -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h6 class="fw-bold text-uppercase">Branches</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Mintal</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Toril</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Deca Tugbok</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Baliok</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-uppercase">Services</h6>
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled me-3">
                        <li><a href="#" class="text-white text-decoration-none">Check Up and Medical Test</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Deworming</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Grooming</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Pet accessories</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Home Service</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Emergencies</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Advice on Responsible Pet Ownership</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="border-white opacity-50 my-4">

        <!-- Social Media Icons -->
        <div class="text-center">
            <a href="https://www.facebook.com/PAWSDOCTORANIMALCLINIC" class="text-white me-3">
                <i class="bi bi-facebook fs-4"></i>
            </a>
            <a href="#" class="text-white">
                <i class="bi bi-twitter fs-4"></i>
            </a>
        </div>
    </div>
</footer>
 <!-- Modal -->
<?php include 'register.php'; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="js/philippines.js"></script>
    <script src="js/createaccount.js"></script>
    <script>
    </script>
</body>
</html>
