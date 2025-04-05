<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>
<body>


<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                     <h4 class="text-center"> Admin page </h4>
                     <div class="d-flex justify-content-between">
                        <a href="<?php echo site_url('admin/export_csv'); ?>" class="btn btn-primary mb-3">Export to CSV</a>
                      <a href="<?php echo site_url('admin/logout'); ?>" class="btn btn-danger mb-3">Logout</a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                              
                             
                               <th>ID</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th>Country</th>
                               <th>Company</th>
                               <th>Job profile</th>
                               <th>Dept.</th>
                                 <th>Exp</th>
                                 <th> Session </th>
                                 <th>Att. Mode</th>
                                 <th>Diet Pref</th>
                                 <th>Ticket type</th>
                                 <th>Coupon Code</th>
                                 <th>Payment mode</th>
                               
                                 
                               <th>Edit </th>
                               <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            
                                
                            <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                     <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['country'] ?></td>
                        <td><?= $user['organization_name'] ?></td>
                        <td><?= $user['job'] ?></td>
                        <td><?= $user['industry'] ?></td>
                        <td><?= $user['experience'] ?></td>
                        <td><?= $user['sessions'] ?></td>
                        <td><?= $user['attendance'] ?></td>
                        <td><?= $user['diet'] ?></td>
                        <td><?= $user['ticket_type'] ?></td>
                        <td><?= $user['coupon_code'] ?></td>
                        <td><?= $user['payment_mode'] ?></td>
                        <!-- <td><a href="" class="btn btn-success btn-sm">Edit</a></td> -->
                        <td><a href="<?= site_url('FormController/edit/'.$user['id']) ?>" class="btn btn-success btn-sm">Edit</a></td>

                        <td><a href="javascript:void(0);" onclick="confirmDelete(<?= $user['id'] ?>)" class="btn btn-danger btn-sm">Delete</a></td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="15" class="text-center">No records found.</td></tr>
            <?php endif; ?>
                        </tbody>




                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = "<?= site_url('Admin/delete/') ?>" + id;
    }
}
$(document).ready(function() {
            $("#logoutBtn").click(function(event) {
                event.preventDefault(); // Prevent default link behavior

                $.ajax({
                    url: "<?php echo base_url('index.php/Admin/logout'); ?>",
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            clearForm(); // Clear form fields
                            alert("Logged out successfully!");
                            window.location.href = "<?php echo base_url('index.php/Admin/login'); ?>"; // Redirect to login page
                        } else {
                            alert("Logout failed. Please try again.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Logout Error:", xhr.responseText);
                    }
                });
            });
            history.pushState(null, null, location.href);
         window.onpopstate = function () {
        history.pushState(null, null, location.href);
    };
        });
     
</script>
</body>
</html> 
