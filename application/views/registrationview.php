<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .progress-bar {
            width: 0%;
            
        }
        .progress {
             width: 50%; /* Adjust width as needed */
              margin: 0 auto; /* Center align */
     }
       
    </style>
</head>
<body>
    <?php 
echo "<pre>";
print_r($step1Data);
    ?>
<div class="container mt-5">
    <h2 class="text-center mb-5">Event Registration</h2>
    
    <!-- Progress Indicator -->
    <div class="progress mb-5">
        <div class="progress-bar " role="progressbar" id="progressBar" style="width: 0%"></div>
    </div>

    <!-- <form id="registrationForm"> -->
        
        <!-- Step 1: User Personal Information -->
        <form id="step1form">
        <div id="step1" class="step active">
            <h3 class="text-center">Step 1: Personal Information</h3>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required minlength="3">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" class="form-control" id="phone" name="phone" required maxlength="10" pattern="[0-9]{10}">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country" name="country" required>
                    <option value="">Select Country</option>
                    <option value="IN">India</option>
                    <option value="US">USA</option>
                    <option value="AU">Australia</option>
                    <option value="NZ">NewsZealand</option>
                    <option value="CA">Canada</option>
                    <!-- Add other countries as needed -->
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="next1" >Nextu</button><!-- update-->
            <button type="submit" class="btn btn-primary" id="submit1">Nexts</button>
            <!-- //submit -->

        </div>
    </form>
 
        <!-- Step 2: Professional Details -->
        <div id="step2" class="step">
            <?php echo form_open("Registration/save_step2");?>
            <h3 class="text-center">Step 2: Professional Details</h3>
            <div class="form-group">
                <label for="organization_name">Organization Name</label>
                <input type="text" class="form-control" id="organization_name" name="organization_name" required>
            </div>
            <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" required>
            </div>
            <div class="form-group">
                <label for="industry">Industry</label>
                <select class="form-control" id="industry" name="industry" required>
                    <option value="">Select Industry</option>
                    <option value="IT">IT</option>
                    <option value="Finance">Finance</option>
                    <option value="Healthcare">Healthcare</option>
                    <!-- Add other industries as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="years_of_experience">Years of Experience</label>
                <input type="number" class="form-control" id="years_of_experience" name="years_of_experience" required>
            </div>
          <div class="d-flex justify-content-between"> 
             <button type="button" class="btn btn-secondary" id="previous1">Previous</button> 
             <button type="button" class="btn btn-primary" id="next2">Next</button>
          </div>
          <?php echo form_close(); ?>
        </div>

        <!-- Step 3: Event Preferences -->
        <div id="step3" class="step">
        <?php echo form_open("Registration/save_step3");?>
            <h3 class="text-center">Step 3: Event Preferences</h3>
            <div class="form-group">
                <label>Preferred Sessions</label><br>
                <label><input type="checkbox" name="preferred_sessions[]" value="Session 1"> Session 1</label><br>
                <label><input type="checkbox" name="preferred_sessions[]" value="Session 2"> Session 2</label><br>
                <label><input type="checkbox" name="preferred_sessions[]" value="Session 3"> Session 3</label><br>
                <!-- Add more sessions as needed -->
            </div>
            <div class="form-group">
                <label for="mode_of_attendance">Mode of Attendance</label><br>
                <label><input type="radio" name="mode_of_attendance" value="virtual"> Virtual</label>
                <label><input type="radio" name="mode_of_attendance" value="in-person"> In-person</label>
            </div>
            <div class="form-group">
                <label for="dietary_preferences">Dietary Preferences</label>
                <select class="form-control" id="dietary_preferences" name="dietary_preferences">
                    <option value="">Select Dietary Preference</option>
                    <option value="Veg">Veg</option>
                    <option value="Non-Veg">Non-Veg</option>
                </select>
            </div>
           <div class="d-flex justify-content-between">
             <button type="button" class="btn btn-secondary" id="previous2">Previous</button>
             <button type="button" class="btn btn-primary" id="next3">Next</button>
            </div>
          <?php echo form_close(); ?>

        </div>

        <!-- Step 4: Payment & Submission -->
        <div id="step4" class="step">
        <?php echo form_open("Registration/save_step4");?>
            <h3>Step 4: Payment & Submission</h3>
            <div class="form-group">
                <label for="ticket_type">Select Ticket Type</label>
                <select class="form-control" id="ticket_type" name="ticket_type" required>
                    <option value="General">General</option>
                    <option value="VIP">VIP</option>
                    <option value="VVIP">VVIP</option>
                </select>
            </div>
            <div class="form-group">
                <label for="coupon_code">Apply Coupon Code (Optional)</label>
                <input type="text" class="form-control" id="coupon_code" name="coupon_code">
            </div>
            <div class="form-group">
                <label for="payment_mode">Payment Mode</label>
                <select class="form-control" id="payment_mode" name="payment_mode" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Net Banking">Net Banking</option>
                </select>
            </div>

            <div id="payment_summary">
                <h4>Payment Summary</h4>
                <p><strong>Ticket Type:</strong> <span id="ticketSummary">General</span></p>
                <p><strong>Coupon Discount:</strong> <span id="couponSummary">None</span></p>
                <p><strong>Total Amount:</strong> $100</p>
            </div>

          <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" id="previous3">Previous</button>
          <button type="button" class="btn btn-success" id="make_payment">Make Payment</button>
          </div>
          <?php echo form_close(); ?>

        </div>
        
    <!-- </form> -->
</div>

<!-- jQuery, Bootstrap, and AJAX -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
//
$(document).ready(function () {

    $("#step1form").on("submit", function(e) {
        e.preventDefault(); // Prevent default form submission
        // alert("clicked");
        let formDataArray = $("#step1form").serializeArray(); 
        console.log("Serialized Form Data:", formDataArray); // Log data to console

         // AJAX request to save step 1 data
         $.ajax({
            url: "Registration/abc", // Update with your actual URL
            type: "POST",
            data: formDataArray, // Send as JSON
      
            success: function (response) {
                console.log("AJAX Success Response:", response);
                alert("Step 1 data saved successfully!");
                // Proceed to the next step (handle navigation)
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Error saving data. Please try again.");
            }
        });
    });

    function updateProgressBar(step) {
        var percentage = (step / 4) * 100;
        $('#progressBar').css('width', percentage + '%');
    }

    function validateStep(step) {
        var isValid = true;
        $('#step' + step + ' input[required], #step' + step + ' select[required]').each(function () {
            if ($(this).val().trim() === "") {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        return isValid;
    }

    function saveFormData(step, formData) {
        $.ajax({
            url: 'Registration/save_step' + step,  
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log('Step ' + step + ' saved successfully');
                if (step === 1) {
                    sessionStorage.setItem("step1Locked", "true"); // Lock email & phone after first submission
                }
            },
            error: function () {
                alert('Error saving data.');
            }
        });
    }

    function lockEmailPhone() {
        $('#step1 input[type="email"], #step1 input[name="phone"]').prop('readonly', true);
    }

    function unlockFields(step) {
        $('#step' + step + ' input:not([type="email"]):not([name="phone"]), #step' + step + ' select').prop('readonly', false);
    }

    $('#next1').click(function () {
        if (validateStep(1)) {
            var formData = $('#step1 input').serialize() + '&' + $('#step1 select').serialize();
            saveFormData(1, formData);

            $('#step1').removeClass('active');
            $('#step2').addClass('active');
            updateProgressBar(1);
        }
    });

    $('#previous1').click(function () {
        $('#step2').removeClass('active');
        $('#step1').addClass('active');
        updateProgressBar(0);
        
        if (sessionStorage.getItem("step1Locked") === "true") {
            lockEmailPhone(); // Lock email & phone when going back
        }
        unlockFields(1);
    });

    $('#next2').click(function () {
        if (validateStep(2)) {
            var formData = $('#step2 input').serialize() + '&' + $('#step2 select').serialize();
            saveFormData(2, formData);

            $('#step2').removeClass('active');
            $('#step3').addClass('active');
            updateProgressBar(2);
        }
    });

    $('#previous2').click(function () {
        $('#step3').removeClass('active');
        $('#step2').addClass('active');
        updateProgressBar(1);

        if (sessionStorage.getItem("step1Locked") === "true") {
            lockEmailPhone();
        }
        unlockFields(2);
    });

    $('#next3').click(function () {
        if (validateStep(3)) {
            var formData = $('#step3 input').serialize() + '&' + $('#step3 select').serialize();
            saveFormData(3, formData);

            $('#step3').removeClass('active');
            $('#step4').addClass('active');
            updateProgressBar(3);
        }
    });

    $('#previous3').click(function () {
        $('#step4').removeClass('active');
        $('#step3').addClass('active');
        updateProgressBar(2);

        if (sessionStorage.getItem("step1Locked") === "true") {
            lockEmailPhone();
        }
        unlockFields(3);
    });

    $('#make_payment').click(function () {
        if (validateStep(4)) {
            var formData = $('#step4 input').serialize() + '&' + $('#step4 select').serialize();
            saveFormData(4, formData);

            alert('Proceeding to Payment');
            $('#step3').removeClass('active');
            $('#step4').addClass('active');
        }
    });

    // Lock email and phone when user returns if already submitted
    if (sessionStorage.getItem("step1Locked") === "true") {
        lockEmailPhone();
    }
});


</script>
</body>
</html>
