<!-- Login Section -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="registerModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="login.php" method="POST">
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <!-- Added name="email" -->
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                    </div>
                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="passwordone" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <!-- Added name="password" -->
                            <input type="password" class="form-control" id="passwordone" name="password" placeholder="Password" required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleSignupPassword">
                                <i class="bi bi-eye"></i>
                            </button>
                            <div class="invalid-feedback">Password is required.</div>
                        </div>
                    </div>
                    <!-- Remember Me and Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="#" class="text-decoration-none">Forgot Password?</a>
                    </div>
                    <!-- Login Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">LOGIN</button>
                    </div>
                    <!-- Create Account -->
                    <div class="text-center mt-3">
                        <span>Don’t have an account? </span>
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#createAccountModal">Create account</a>
                    </div>
                    <div class="text-center mt-3">
                        <span>Are you a admin? </span>
                        <a href="/code/admin/panel.php" class="text-decoration-none">Admin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- create account -->
<div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="createAccountModalLabel">Create an Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <form id="createAccountForm" action="createaccount.php" method="POST" novalidate>
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" id="Thirdpassword" name="Thirdpassword" placeholder="Password" required>
                        <button class="btn btn-outline-secondary" type="button" id="toggleCreatePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                        <div class="invalid-feedback">Password is required.</div>
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                            <i class="bi bi-eye"></i>
                        </button>
                        <div class="invalid-feedback">Please confirm your password.</div>
                    </div>
                </div>
                <hr class="my-4 bold-hr">
                <!-- Name Fields -->
                <div class="row g-2 mt-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
                        <div class="invalid-feedback">Surname is required.</div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>
                        <div class="invalid-feedback">Firstname is required.</div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename" required>
                        <div class="invalid-feedback">Middlename is required.</div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <input type="text" class="form-control" id="nameExtension" name="nameExtension" placeholder="Name Extension (e.g., Jr., Sr.)">
                    </div>
                </div>
                <!-- Address Fields -->
                <div class="row g-2 mt-3">
                    <div class="col-md-6">
                        <select id="region" name="region" class="form-select" required>
                            <option value="" selected>Select Region</option>
                        </select>
                        <div class="invalid-feedback">Region is required.</div>
                    </div>
                    <div class="col-md-6">
                        <select id="province" name="province" class="form-select" required>
                            <option value="" selected>Select Province</option>
                        </select>
                        <div class="invalid-feedback">Province is required.</div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <select id="city" name="city" class="form-select" required>
                            <option value="" selected>Select City</option>
                        </select>
                        <div class="invalid-feedback">City is required.</div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <select id="barangay" name="barangay" class="form-select" required>
                            <option value="" selected>Select Barangay</option>
                        </select>
                        <div class="invalid-feedback">Barangay is required.</div>
                    </div>
                </div>
                <div class="row g-2 mt-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipality">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="buildingNumber" name="buildingNumber" placeholder="Building Number">
                    </div>
                </div>
                <div class="row g-2 mt-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="block" name="block" placeholder="Block">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="lotNumber" name="lotNumber" placeholder="Lot Number">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="sitio" name="sitio" placeholder="Sitio">
                    </div>
                </div>
                <div class="row g-2 mt-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="subdivision" name="subdivision" placeholder="Subdivision">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="village" name="village" placeholder="Village">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number" required>
                        <div class="invalid-feedback">Mobile number is required.</div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-success">Create Account</button>
                </div>
                <!-- Login Redirect -->
                <div class="text-center mt-3">
                    Already have an account? <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#registerModal">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

