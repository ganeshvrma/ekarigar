<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('download');
    }

    // Load login view
    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin_login');
    }

    // Validate login
    public function authenticate() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->check_admin($email, $password);

        if ($admin) {
            // Set session
            $this->session->set_userdata('admin_logged_in', true);
            $this->session->set_userdata('admin_email', $admin->email);

            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid Email or Password');
            redirect('Admin/login');
        }
    }

    // Admin Dashboard
    public function dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin/login');
        }
        // $this->load->view('admin_dashboard');
        $this->load->model('Admin_model');
        $data['users'] = $this->Admin_model->get_all_users();
         $this->load->view('admin_dashboard', $data); // Load view and pass the data
    }

    // Logout
    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_email');
        $this->session->sess_destroy(); // Destroy session

        redirect('Admin/login');
    }
    
       public function export_csv() {
    $users = $this->Admin_model->get_users(); // Fetch all users

    // Define CSV headers
    $filename = "user_data_" . date('Ymd') . ".csv";
   
    $csvData = "ID, Full Name, Email, Phone, Country, Company\n";

    // Append user data
    foreach ($users as $user) {
       
        $csvData .= "{$user['id']},{$user['full_name']},{$user['email']},{$user['phone']},{$user['country']}\n";

    }

    // Force download CSV
    force_download($filename, $csvData);
}
//delete
public function delete($id) {
    $this->load->model('Admin_model');
    $this->Admin_model->delete_user($id);
    $this->session->set_flashdata('success', 'User deleted successfully.');
    redirect('admin/dashboard');
}
//del ends

}
?>


