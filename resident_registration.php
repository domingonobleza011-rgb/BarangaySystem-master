<?php 
     require('classes/resident.class.php');
    $residentbmis->create_resident();
     //$data = $bms->get_userdata();

     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Barangay San Pedro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .password-wrapper {
            position: relative;
        }
        .field-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 10;
            color: #666;
        }
        .mtop { margin-top: 10px; }
        .mbottom { margin-bottom: 3em; }
    </style>
</head>

<body>

    <div class="container-fluid" style="margin-top: 2em;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Registration Form</h1>
                <br>
            </div>
        </div>

        <div class="row justify-content-center"> 
            <div class="col-md-10 col-lg-8">   
                <div class="card mbottom shadow">
                    <div class="card-body">
                        <form method="post" enctype='multipart/form-data' class="was-validated">

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Middle Name:</label>
                                    <input type="text" class="form-control" name="mi" placeholder="Enter Middle Name" required>
                                </div>
                            </div>

                            <div class="row g-3 mtop">
                                <div class="col-md-4">
                                    <label class="form-label">Contact Number:</label>
                                    <input type="tel" class="form-control" name="contact" maxlength="11" pattern="[0-9]{11}" placeholder="09123456789" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Password:</label>
                                    <div class="password-wrapper">
                                        <input type="password" class="form-control" id="password-field" name="password" placeholder="Enter Password" required style="padding-right: 40px;">
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mtop">
                                <div class="col-md-3">
                                    <label class="form-label">House No:</label>
                                    <input type="text" class="form-control" name="houseno" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Street:</label>
                                    <input type="text" class="form-control" name="street" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Barangay:</label>
                                    <input type="text" class="form-control" name="brgy" value="San Pedro" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Municipality:</label>
                                    <input type="text" class="form-control" name="municipal" required>
                                </div>
                            </div>

                            <div class="row g-3 mtop">
                                <div class="col-md-4">
                                    <label class="form-label">Birth Date:</label>
                                    <input type="date" class="form-control" name="bdate" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Birth Place:</label>
                                    <input type="text" class="form-control" name="bplace" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nationality:</label>
                                    <input type="text" class="form-control" name="nationality" required>
                                </div>
                            </div>

                            <div class="row g-3 mtop">
                                <div class="col-md-4">
                                    <label class="form-label">Status:</label>
                                    <select class="form-select" name="status" required>
                                        <option value="">Choose...</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Age:</label>
                                    <input type="number" class="form-control" name="age" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sex:</label>
                                    <select class="form-select" name="sex" required>
                                        <option value="">Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mtop mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Are you a registered voter?</label>
                                    <select class="form-select" name="voter" required>
                                        <option value="">...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Are you head of the family?</label>
                                    <select class="form-select" name="family_role" required>
                                        <option value="">...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="row mtop">
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="termsCheck" required>
            <label class="form-check-label" for="termsCheck">
                I agree to the 
                <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal" style="text-decoration: none;">
                    Terms and Conditions
                </a>
            </label>
            <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
    </div>
</div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <input type="hidden" name="role" value="resident">
                                    <a class="btn btn-danger me-2" href="index.php">Back to Login</a>
                                    <button class="btn btn-primary" type="submit" name="add_resident">Submit Registration</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6><strong>1. Data Privacy Act of 2012</strong></h6>
                <p>By registering, you allow Barangay San Pedro to collect and process your personal information in accordance with the Data Privacy Act. Your data will be used solely for barangay management and emergency services.</p>
                
                <h6><strong>2. Accuracy of Information</strong></h6>
                <p>You certify that all information provided is true and correct. Providing false information may lead to the cancellation of your registration or legal action.</p>
                
                <h6><strong>3. Usage Policy</strong></h6>
                <p>This account is for the exclusive use of the registered resident. Any unauthorized use of this system may result in suspension of access.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="document.getElementById('termsCheck').checked = true;">I Understand</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Password Toggle Script
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>
</html>