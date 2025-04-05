<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            background: url('<?php echo base_url("assets/images/bg.svg"); ?>') no-repeat center center fixed;
            background-size: cover;
            text-align: center;
            color: black;
            font-family:Georgia, 'Times New Roman', Times, serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .welcome-container {
            /* background: rgba(166, 221, 247, 0.86); */
            /* opacity: 0.5; */
            padding: 30px;
            border-radius: 10px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 36px;
        }
        .btn {
            padding: 10px 20px;
            margin: 10px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-register {
            background-color: #28a745;
            color: white;
        }
        .btn-login {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to AI Conference Bootcamp</h1>
        <p>Register to attend the event </p>
        <a href="<?php echo base_url('FormController'); ?>" class="btn btn-register">New User</a>
        <a href="<?php echo base_url('FormController/show_login'); ?>" class="btn btn-login">User login</a>
    </div>
</body>
</html>
