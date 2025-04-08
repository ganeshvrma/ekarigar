<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body {
    background: url("<?php echo base_url('assets/images/bg.svg'); ?>");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
        }
     </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
     <div class="card p-4" style="width: 400px;">
            <div id="loginPage" class="login-page">
                <h3 class="text-center"> User Login</h3>
                <div class="form-group">
                <label for="email">User Name</label>
                <input type="text" id="loginEmail" placeholder="Enter your registered email address" class="form-control">
                 </div>
                 <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="loginPassword" placeholder=" Enter your password" class="form-control">
                 </div>
                <div class="d-flex justify-content-between ">
                    <a href="#" class="btn btn-primary " id="loginBtn">Login</a>
                    <a href="<?php echo base_url('FormController'); ?>" class="btn btn-secondary " >Sign in </a>
               </div>
            </div>
        </div>
  
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
$(document).ready(function() {
    $("#loginBtn").click(function(e) {
        e.preventDefault();

        let email = $("#loginEmail").val();
        let password = $("#loginPassword").val();

        $.ajax({
            url: "<?php echo base_url('FormController/login'); ?>",
            type: "POST",
            data: { email: email, password: password },
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    // Redirect to form page after successful login
                    window.location.href = response.redirect;
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Login Error:", error);
            }
        });
    });
});


</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>