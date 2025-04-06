<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block; 
        }
     body
     {
        font-family: Georgia, 'Times New Roman', Times, serif;
     }
       
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-5">AI CONFERENCE PARTICIPATION FORM</h2>
    
    <!-- Progress Indicator -->
    <!-- <div class="progress mb-5">
        <div class="progress-bar " role="progressbar" id="progressBar" style="width: 0%"></div>
    </div> -->

    <form id="multiStepForm" action="welcome" method="post">

        
        <!-- Step 1: User Personal Information -->
        <div class="form1 active" id="step1">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5"> <!-- Adjust width -->
                
                <div class="card shadow p-4"> <!-- Adds shadow & padding -->
                <h1>Personal Information</h1>
                    <div class="progress">
                        <div class="progress-bar  progress-bar-animated" style="width: 0%;" id="progressBar"></div>
                    </div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email address" oninput="this.value = this.value.toLowerCase()" required>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" pattern="\d{10}" required>
                    <label for="countries">Select a country:</label>
                    <select id="countries" name="country" required>
                        <option value="">--Select a country--</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        
                    </select>
                    <button type="button" class="btn btn-primary " id="step1next">Next</button>
            </div>
            </div>
        </div>
    </div>
        </div>
  
        <!-- Step 2: Professional Details -->
        <div class="form1" id="step2" style="display:none;">
        <div class="login">
            <!-- Button to load login page -->
            <!-- <a href="index.php/FormController/show_login" class="btn btn-primary" id="showLogin">Login</a> -->
            <a href="index.php/FormController/logout" class="btn btn-primary logoutBtn" >Logout</a>
            
        </div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5"> <!-- Adjust width -->
                <div class="card shadow p-4"> <!-- Adds shadow & padding -->
                <h1>Organization Details</h1>
                    <div class="progress">
                        <div class="progress-bar progress-bar-animated" style="width: 25%;" id="progressBar"></div>
                    </div>
                    <label for="organization">Organization Name:</label>
                    <input type="text" name="organization_name" id="organization_name" placeholder="Enter Organization Name" required>

                    <label for="job">Job:</label>
                    <input type="text" name="job" id="job" placeholder="Enter Job" required>
                    <label for="industry">Industry:</label>
                    <select id="industry" name="industry" required>
                        <option value="">--Industry--</option>
                        <option value="IT">IT</option>
                        <option value="Software">Finance</option>
                        <option value="Agriculture">Healthcare</option>
                       
                    </select>

                    <label for="experience">Years Of Experience:</label>
                    <input type="number" name="experience" id="experience" placeholder="Enter Years of Experience" inputmode="numeric" required>

                   

                    <div class="d-flex justify-content-between"><button type="button" class="btn btn-primary "   id="step2prev">Prev</button>
                    <button type="button"  class="btn btn-primary " id="step2next">Next</button></div>
          </div>
            </div>
        </div>
    </div>
        </div>

        <!-- Step 3: Event Preferences -->
        <div class="form1" id="step3" style="display:none;">
        <div class="login">
            <!-- Button to load login page -->
            <!-- <a href="index.php/FormController/show_login" class="btn btn-primary" id="showLogin">Login</a> -->
            <a href="index.php/FormController/logout" class="btn btn-primary logoutBtn" >Logout</a>
        </div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5"> <!-- Adjust width -->
                <div class="card shadow p-4"> <!-- Adds shadow & padding -->
                <h1>Event Preferences</h1>
                    <div class="progress">
                        <div class="progress-bar  progress-bar-animated" style="width: 50%;" id="progressBar"></div>
                    </div>
                    <label>Preferred Sessions:</label><br>
                    <div class="checkbox-group">
                        <label for="session1"> <input type="checkbox" name="sessions[]" id="" value="Web 3">   Web 3 </label>
                        <label for="session2"><input type="checkbox" name="sessions[]" id="" value="AI and ML">   AI & ML </label>
                    </div>

                    <label>Mode of Attendance:</label><br>
                    <div class="radio-group">
                    
                        <label for="virtual"> <input type="radio" id="virtual" name="attendance" value="virtual" required>Virtual</label>
                        <label for="in-person"> <input type="radio" id="in-person" name="attendance" value="in-person">In-Person</label>
                    </div>

                    <label for="diet">Dietary Preferences:</label>
                    <select id="diet" name="diet">
                        <option value="">--Select--</option>
                        <option value="veg">Veg</option>
                        <option value="non-veg">Non-Veg</option>
                    </select>

                    <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary " id="step3prev">Prev</button>
                    <button type="button" class="btn btn-primary " id="step3next">Next</button>
                    </div>
          </div>
            </div>
        </div>
    </div>
        </div>

        <!-- Step 4: Payment & Submission -->
        <div class="form1" id="step4" style="display:none;">
        <div class="login">
            <!-- Button to load login page -->
            <!-- <a href="index.php/FormController/show_login" class="btn btn-primary" id="showLogin">Login</a> -->
            <a href="index.php/FormController/logout" class="btn btn-primary  logoutBtn" >Logout</a>
        </div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5"> <!-- Adjust width -->
                <div class="card shadow p-4"> <!-- Adds shadow & padding -->
                <h1>Payment & Submission</h1>
                    <div class="progress">
                        <div class="progress-bar  progress-bar-animated" style="width: 75%;" id="progressBar"></div>
                    </div>


                    <label for="ticketType"><b>Select Ticket Type:</b></label>
                    <select id="ticketType" name="ticketType" required>
                        <option value="">--Select Ticket Type--</option>
                        <option value="general">General</option>
                        <option value="vip">VIP</option>
                        <option value="vvip">VVIP</option>
                    </select><br>

                    <label for="couponCode"><b>Apply Coupon Code:</b></label>
                    <input type="text" id="couponCode" name="couponCode" placeholder="Enter Coupon Code"><br>

                    <label for="paymentMode"><b>Payment Mode:</b></label>
                    <select id="paymentMode" name="paymentMode" required>
                        <option value="">--Select Payment Mode--</option>
                        <option value="creditCard">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="netBanking">Net Banking</option>
                    </select><br>

                    <div class="d-flex justify-content-between"><button type="button" class="btn btn-primary " id="step4prev">Prev</button>
                    <button type="button" class="btn btn-primary " id="step4next">Next</button></div>
                 </div>
              </div>
           </div>
       </div>     
    </div>
   
        
    <div class="form1" id="step5" style="display:none;">
                    <h3>Thank you for submitting the form</h3>
                    <small class="text-center">Soon you will get email for further updates</small>
                </div>

    </form> 
</div>

<!-- jQuery, Bootstrap, and AJAX -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
//
document.getElementById('phone').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 10); // Remove non-numeric characters 
        });

        $(document).ready(function() {
            $("#step1next").click(function() {
                var email = $("#email").val();

                $.ajax({
                    url: "<?php echo base_url('index.php/FormController/save_step1'); ?>",
                    type: "POST",
                    data: {
                        name: $("#name").val(),
                        email: email,
                        phone: $("#phone").val(),
                        country: $("#countries").val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            // Store email in sessionStorage to prevent changes on prev button click
                            sessionStorage.setItem("user_email", email);

                            // Move to Step 2
                            $("#step1").hide();
                            $("#step2").fadeIn();

                            // Disable email input when going back
                            $("#email").prop("disabled", true);
                        } else {
                           console.log("Error: " + response.message);

                            // alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                       console.log("An error occurred: " + xhr.responseText);

                        // alert("An error occurred: " + xhr.responseText);
                    }
                });
            });

            // Prevent changing email when going back to Step 1
            if (sessionStorage.getItem("user_email")) {
                $("#email").val(sessionStorage.getItem("user_email")).prop("disabled", true);
            }
        });


        $("#step2next").click(function() {
            var formData = {
                organization_name: $("input[name='organization_name']").val(),
                job: $("input[name='job']").val(),
                experience: $("input[name='experience']").val(),
                industry: $("#industry").val()
            };

            $.ajax({
                url: "<?php echo base_url('index.php/FormController/save_step2'); ?>",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        $("#step2").hide();
                        $("#step3").fadeIn();
                    } else {
                       console.log("Error: " + response.message);

                        // alert("Error: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                   console.error("An error occurred: " + xhr.responseText);

                    // alert("An error occurred: " + xhr.responseText);
                }
            });

        });
        $("#step2prev").click(function() {
            $("#step2").hide();
            $("#step1").fadeIn();
        });

        $(document).ready(function() {
            $("#step3next").click(function(e) {
                e.preventDefault();

                let formData = {
                    // session1: $("#session1").prop("checked") ? "session1" : "no",
                    // session2: $("#session2").prop("checked") ? "session2" : "no",
                    // session1: $("input[name='session1']:checked").val(),
                    // session2: $("input[name='session2']:checked") .val(),
                    sessions: $("input[name='sessions[]']:checked").map(function() {
                      return $(this).val();}).get(),  // .get() converts jQuery object to array
                    attendance: $("input[name='attendance']:checked").val(),
                    diet: $("#diet").val(),
                };

                $.ajax({
                    url: "<?php echo base_url('index.php/FormController/save_step3'); ?>",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            $("#step3").hide();
                            $("#step4").fadeIn(); // Move to Step 4
                        } else {
                            console.log("Some errors",response.message);
                            // alert(response.message); // Show error messages
                        }
                    },
                    error: function() {
                        console.error("Something went wrong. Please try again.");

                        // alert("Something went wrong. Please try again.");
                    }
                });
            });

            $("#step3prev").click(function() {
                $("#step3").hide();
                $("#step2").fadeIn();
            });
        });


        $(document).ready(function() {
            $("#step4next").click(function() {
                var formData = {
                    ticketType: $("#ticketType").val(),
                    couponCode: $("#couponCode").val(),
                    paymentMode: $("#paymentMode").val()
                };

                // Debugging - Check if formData is correct
                console.log("Submitting Step 4 Data:", formData);

                $.ajax({
                    url: "<?php echo base_url('index.php/FormController/save_step4'); ?>",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        console.log("AJAX Response:", response); // Debugging

                        if (response.status === "success") {
                            console.log("Step 4 saved successfully. Moving to Step 5...");

                            $("#step4").hide();
                            $("#step5").fadeIn(); // Move to final step
                        } else {
                            console.error("Error saving Step 4:", response.message);
                            //    alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", xhr.responseText);
                        // alert("An error occurred: " + xhr.responseText);
                    }
                });
            });

            $("#step4prev").click(function() {
                console.log("Going back to Step 3...");
                $("#step4").hide();
                $("#step3").fadeIn();
            });
        });



        $(document).ready(function() {
            checkLoginStatus(); // Check login before fetching data
        });

        function checkLoginStatus() {
            $.ajax({
                url: "<?= base_url('index.php/FormController/check_login_status'); ?>",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.logged_in) {
                        fetchUserData(); // Only fetch user data if logged in
                    } else {
                        console.warn("User not logged in. Data won't be fetched.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error checking login status:", xhr.responseText);
                }
            });
        }

        function fetchUserData() {
            $.ajax({
                url: "<?= base_url('index.php/FormController/fetch_user_data') ?>",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log("Fetched Data:", response); // ✅ Debugging

                    if (response.status === "success") {
                        let userData = response.data;

                        // ✅ Only update fields if data exists, prevent overwriting with empty values
                        if (userData.name) $("#name").val(userData.name);
                        if (userData.email) $("#email").val(userData.email).prop("readonly", true);
                        if (userData.phone) $("#phone").val(userData.phone);

                        if (userData.country) {
                            let countryValue = userData.country.toLowerCase();
                            $("#countries").val(countryValue);
                        }
                    } else {
                        console.error("Error fetching user data:", response.message);
                    }
                    $("#organization_name").val(response.data.organization_name);
                    $("#job").val(response.data.job);
                    $("#experience").val(response.data.experience);
                    $("#industry").val(response.data.industry);

                    if (response.data.session1 == 1) $("#session1").prop("checked", true);
                    if (response.data.session2 == 1) $("#session2").prop("checked", true);
                    if (response.data.attendance !== null && response.data.attendance !== undefined) {
                 $("input[name='attendance']").prop("checked", false); // Uncheck all first
                  $("input[name='attendance'][value='" + response.data.attendance + "']").prop("checked", true);
                 } else {
                    console.warn("Attendance data is missing or null.");
                    }
                    $("#diet").val(response.data.diet);

                    $("#ticketType").val(response.data.ticket_type);
                    $("#couponCode").val(response.data.coupon_code);
                    $("#paymentMode").val(response.data.payment_mode);
                },
                error: function() {
                    alert("Failed to load user data.");
                }
            });
        }

        $(document).ready(function() {
            $(".logoutBtn").click(function(event) {
                event.preventDefault(); // Prevent default link behavior

                $.ajax({
                    url: "<?php echo base_url('index.php/FormController/logout'); ?>",
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            clearForm(); // Clear form fields
                            alert("Logged out successfully!");
                            window.location.href = "<?php echo base_url('index.php/FormController/show_login'); ?>"; // Redirect to login page
                        } else {
                            alert("Logout failed. Please try again.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Logout Error:", xhr.responseText);
                    }
                });
            });
        });

        function clearForm() {
            $("#multiStepForm").find("input, select").val(""); // Clear all input fields
            $("input[type='checkbox'], input[type='radio']").prop("checked", false); // Uncheck all checkboxes and radio buttons
        }


</script>
</body>
</html>
