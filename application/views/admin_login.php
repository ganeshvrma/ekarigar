<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
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
        <h3 class="text-center">Admin Login</h3>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo site_url('admin/authenticate'); ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="email" name="email" class="form-control" placeholder="enter your email address" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="enter your password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</body>
</html>
