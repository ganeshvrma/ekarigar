<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FormController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model'); // Load model
        $this->load->library('session'); // Load session library
    }

    public function index()
    {
        $this->load->view('Form_page');
    }
    public function show_login()
    {
        $this->load->view('login'); // Load the login page
    }




    public function save_step1()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $country = $this->input->post('country');

        if (empty($name) || empty($email) || empty($phone) || empty($country)) {
            echo json_encode(["status" => "error", "message" => "All fields are required"]);
            return;
        }

        // Check if email already exists
        $existingUser = $this->Main_model->get_user_by_email($email);

        if ($existingUser) {
            if ($this->session->userdata('id') == $existingUser->id) {
                // Update user data (except email)
                $data = [
                    'name' => $name,
                    'phone' => $phone,
                    'country' => $country
                ];

                $this->db->where('id', $existingUser->id);
                if ($this->db->update('email', $data)) {
                    echo json_encode(["status" => "success", "message" => "Step 1 updated successfully"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Database update failed"]);
                }
                return;
            }

            echo json_encode(["status" => "error", "message" => "This email already exists. Please login."]);
            return;
        }

        // Generate a random plain text password
        $generatedplainPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*!'), 0, 8); // 8-character random password

        // Store user data
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'password' => $generatedplainPassword // Store the plain text password
        ];

        if ($this->Main_model->insert_email($data)) {
            $user_id = $this->db->insert_id();
            $this->session->set_userdata(['id' => $user_id, 'email' => $email]);
            echo json_encode(["status" => "success", "message" => "Step 1 saved successfully", "password" => $generatedplainPassword]);
             // After successful registration, you can call this to send email
        // Send Email
        $this->load->library('email');
        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'ssl://smtp.gmail.com',
            'smtp_timeout'=> 65,
            'smtp_port'   => 465,
            'smtp_user'   => 'karan.ekarigar@gmail.com', // Replace with your Gmail
            'smtp_pass'   => 'tehk kaft qpvi fbgy',  // Replace with your app password
            'mailtype'    => 'html',
            'charset'     => 'utf-8',
            'wordwrap'    => TRUE,
            'newline'     => "\r\n"
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");

        $email = $this->input->post('email'); // Get email from form
        $message = "
            <p>Hello <b>{$this->input->post('name')}</b>,</p>
            <p>Thank you for registering.</p>
            <p>Your login details:</p>
            <p><b>Username:</b> {$email}</p>
            <p><b>Password:</b> {$generatedplainPassword}</p>
            <p>Please keep this information safe.</p>
            <br>
            <p>Regards,<br> Your Company</p>
        ";

        // $this->email->from('karan.ekarigar@gmail.com', 'GANESH');
        // $this->email->to($email);
        $this->email->subject('Your Registration Details');
        $this->email->message($message);

        if ($this->email->send()) {
            echo json_encode(['status' => 'success', 'message' => 'Email sent successfully!']);
        } else{
            console.warn("error");
        }

        } 
        else {
            echo json_encode(["status" => "error", "message" => "Database error"]);
        }
    }



    public function save_step2()
    {
       
        $user_id = $this->session->userdata('id'); // Get user ID from session
        $organization_name = $this->input->post('organization_name');
        $job = $this->input->post('job');
        $experience = $this->input->post('experience');
        $industry = $this->input->post('industry');

        if (empty($organization_name) || empty($job) || empty($experience) || empty($industry)) {
            echo json_encode(["status" => "error", "message" => "All fields are required"]);
            return;
        }

        // Check if user already has organization details
        $existingOrg = $this->Main_model->get_org_by_id($user_id);

        $data = [
            'id' => $user_id, // Ensure same ID from Step 1
            'organization_name' => $organization_name,
            'job' => $job,
            'experience' => $experience,
            'industry' => $industry
        ];

        if ($existingOrg) {
            // Update existing record
            $this->Main_model->update_org($user_id, $data);
        } else {
            // Insert new record
            $this->Main_model->insert_org($data);
        }

        echo json_encode(["status" => "success", "message" => "Step 2 saved successfully"]);
    }


    public function save_step3()
    {
        $this->load->model('Main_model');

        // Retrieve user ID from session
        $id = $this->session->userdata('id');
        if (!$id) {
            echo json_encode(["status" => "error", "message" => "User not authenticated."]);
            return;
        }

        // Retrieve input data
        // $session1 = $this->input->post('session1') ? 1 : 0; // Convert checkbox to boolean
        // $session2 = $this->input->post('session2') ? 1 : 0;
        // $session1 = $this->input->post('session1') ; // Convert checkbox to boolean
        // $session2 = $this->input->post('session2') ;
        // $sessions = ( $this->input->post('sessions[]'));
          // Retrieve session data - fix the array retrieval
          $sessions = $this->input->post('sessions'); // Remove the square brackets
    
          // Convert array to string for DB storage if it's an array
         $sessions_data = is_array($sessions) ? implode(',', $sessions) : $sessions;
        $attendance = $this->input->post('attendance');
        $diet = $this->input->post('diet');

        // Validate: At least one session must be selected, attendance is required
        // if (!$session1 && !$session2) {
        //     echo json_encode(["status" => "error", "message" => "Please select at least one session."]);
        //     return;
        // }
        if (!$attendance) {
            echo json_encode(["status" => "error", "message" => "Please select a mode of attendance."]);
            return;
        }

        // Prepare data for insertion
        $data = [
            'id' => $id, // Ensure ID is linked
           'sessions' => $sessions_data,
            'attendance' => $attendance,
            'diet' => $diet
        ];

        // Check if event data already exists for this user (update instead of insert)
        $existing_event = $this->db->get_where('event', ['id' => $id])->row();
        if ($existing_event) {
            $this->Main_model->update_record('event', ['id' => $id], $data);
        } else {
            $this->Main_model->insert_event($data);
        }

        echo json_encode(["status" => "success", "message" => "Step 3 data saved successfully."]);
    }



    public function save_step4()
    {
        $this->load->library('form_validation'); 
        $this->load->model("Main_model");

        // Get user ID from session
        $id = $this->session->userdata("id");

        if (!$id) {
            echo json_encode(["status" => "error", "message" => "User session not found. Please log in again."]);
            return ;
        }

        // Validate required fields
        $this->form_validation->set_rules("ticketType", "Ticket Type", "required");
       
        $this->form_validation->set_rules("paymentMode", "Payment Mode", "required");

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(["status" => "error", "message" => validation_errors()]);
            return;
        }

        // Prepare data for insertion
        $data = [
            "id"            => $id,  // Use the same ID for all steps
            "ticket_type"   => $this->input->post("ticketType"),
            "payment_mode"  => $this->input->post("paymentMode"),
            "coupon_code"   => $this->input->post("couponCode") 
         
            
        ];

        // Insert into the `payment` table
        if ($this->Main_model->insert_payment($data)) {
            log_message("error", "Step 4 Success - User ID: " . $id);
            echo json_encode(["status" => "success", "message" => "Step 4 saved successfully."]);
        } else {
            log_message("error", "Step 4 Failure - User ID: " . $id);
            echo json_encode(["status" => "error", "message" => "Failed to save Step 4. Please try again."]);
        }
    }
   



    public function login()
    {
        $email = trim($this->input->post('email'));
        $password = trim($this->input->post('password'));
    
        $this->load->model('Main_model');
        $user = $this->Main_model->get_user_by_email($email);
    
        if (!$user) {
            echo json_encode(["status" => "error", "message" => "No account found with this email."]);
            return;
        }
    
        // Debugging: Print both passwords for comparison
        log_message('debug', "Entered Password: " . $password);
        log_message('debug', "Stored Password: " . $user->password);
    
        // Ensure proper comparison by trimming both
        if (trim($password) === trim($user->password)) {
            $this->session->set_userdata([
                'id' => $user->id,
                'email' => $user->email
            ]);
            
            // Redirect to the form page
            log_message('error', 'User logged in. Session ID Set: ' . $this->session->userdata('id'));  
            echo json_encode(['status' => 'success', 'redirect' => base_url('index.php/FormController/load_form_page')]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password.']);
        }
    }
    
    

    

    public function load_form_page() {
        $id = $this->session->userdata('id');
    
        // Log session status for debugging
        if (!$id) {
            log_message('error', 'Session missing! User not logged in.');
            redirect('FormController/show_login'); // Redirect to login page
            return;
        }
    
        log_message('error', 'Session OK, Loading Form Page. ID: ' . $id);
        
        //  Load the form page view
        $this->load->view('Form_page');
    }
    
    
    

    public function logout() {
        $this->session->unset_userdata('id'); // Remove user session
        $this->session->sess_destroy(); // Destroy session
    
        echo json_encode(["status" => "success"]);
    }


    


public function fetch_user_data()
{
    $this->load->library('session');

    if (!$this->session->userdata('id')) {
        echo json_encode(['status' => 'error', 'message' => 'You need to log in first.']);
        return;
    }

    $user_id = $this->session->userdata('id');
    $this->load->model('Main_model');
    $user_data = $this->Main_model->get_user_data($user_id);

    log_message('error', 'Fetched User Data: ' . json_encode($user_data));

    if ($user_data) {
        echo json_encode(['status' => 'success', 'data' => $user_data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch user data.']);
    }
}

    
    
    public function check_login_status()
    {
        // Check if the 'id' session data exists
        if ($this->session->userdata('id')) {
            // The user is logged in
            echo json_encode(["logged_in" => true]);
        } else {
            // The user is not logged in
            echo json_encode(["logged_in" => false]);
        }
    }
    public function edit($id) {
        $this->load->model('Main_model');
        $data['user'] = $this->Main_model->get_user_details($id);
        if (!$data['user']) {
        show_404();
        }
        $this->session->set_userdata('edit_user_id', $id);
        $this->session->set_userdata('form_data', $data['user']);
        redirect('FormController'); // Redirect to the form's first step
        }
    
}   
