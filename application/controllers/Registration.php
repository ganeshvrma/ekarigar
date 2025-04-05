<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form','url');

    }

    // Load the registration view
    public function index()
    {
         $this->load->view('registration_view');
         //email part starts
//          $this->load->library('email');
//          $config = array(    
//               'protocol'    => 'smtp',
//               'smtp_host'   => 'ssl://smtp.gmail.com',
//               'smtp_timeout'=> 65,
//               'smtp_port'   => 465,
//               'smtp_user'   => 'karan.ekarigar@gmail.com', // Replace with your Gmail
//               'smtp_pass'   => 'tehk kaft qpvi fbgy',  // Replace with your app password
//               'mailtype'    => 'html',
//               'charset'     => 'utf-8',
//               'wordwrap'    => TRUE,
//               'newline'     => "\r\n"
//      );


//    $this->email->initialize($config);
//    $this->email->set_newline("\r\n");
//    $this->email->set_crlf("\r\n");
//    $this->email->from('karan.ekarigar@gmail.com', 'karan');
//    $this->email->to('vgs170811@gmail.com');
//    $this->email->subject('Test Email from CodeIgniter ');
//    $this->email->message('This is a test email sent from CodeIgniter 3  and this is username: vfd & this is your password:sdffssef');

//    if ($this->email->send()) 
//    {
//        echo 'Email sent successfully!';
//    }
//     else {
//        echo $this->email->print_debugger();
//    }
   //EMAIL PART END




          // $data['users'] = $this->User_model->get_all_users();

          // echo "<pre>";
          // print_r($data['users']);
          // echo "</pre>";

          // die(); 
         //khush mam ex start
        // $data['userid']= "3";
        // $data['step1Data']= $this->User_model->getstep1($data['userid']);
        // echo "<pre>";
        // print_r($data);
        // exit();
        //end
       
        // $this->load->view('registrationview',$data);
    }
      public function addmin(){
        $this->load->model('User_model');
    //   $data['personaldetails']= $this->User_model->getpersonaldetails();
    //     $this->load->view('admin',$data);
        $data['users'] = $this->User_model->get_all_users();
         $this->load->view('admmin', $data); // Load view and pass the data
       }
    //kh start
    // public function abc(){
    //     echo "<pre>";
    //     print_r($_POST);
    // }
    //end
    
    // Save Step 1: User Personal Information
    public function save_step1()
    {
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[3]');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[step1_personal_info.email]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('country', 'Country', 'required');

        if ($this->form_validation->run() == TRUE) {
            // Save to session
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'country' => $this->input->post('country')
            );
            $this->User_model->save_personal_info($data);
            // $this->session->set_userdata('step1_data', $data);
            echo json_encode(['status' => 'success']);
        //     //email part starts
        //    $this->load->library('email');
        //       $config = array(    
        //            'protocol'    => 'smtp',
        //            'smtp_host'   => 'ssl://smtp.gmail.com',
        //            'smtp_timeout'=> 65,
        //            'smtp_port'   => 465,
        //            'smtp_user'   => 'karan.ekarigar@gmail.com', // Replace with your Gmail
        //            'smtp_pass'   => 'tehk kaft qpvi fbgy',  // Replace with your app password
        //            'mailtype'    => 'html',
        //            'charset'     => 'utf-8',
        //            'wordwrap'    => TRUE,
        //            'newline'     => "\r\n"
        //   );
    

        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");
        // $this->email->set_crlf("\r\n");
        // $this->email->from('karan.ekarigar@gmail.com', 'karan');
        // $this->email->to('vgs170811@gmail.com');
        // $this->email->subject('Test Email from CodeIgniter ');
        // $this->email->message(`This is a test email sent from CodeIgniter 3  and this is username: $email & this is your password:$password`);

        // if ($this->email->send()) 
        // {
        //     echo 'Email sent successfully!';
        // }
        //  else {
        //     echo $this->email->print_debugger();
        // }
        // //EMAIL PART END
        } else {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        }
    }
    public function login(){
        $this->load->view('login');

    }

    // Save Step 2: Professional Details
    public function save_step2()
    {
        $this->form_validation->set_rules('organization_name', 'Organization Name', 'required');
        $this->form_validation->set_rules('job_title', 'Job Title', 'required');
        $this->form_validation->set_rules('industry', 'Industry', 'required');
        $this->form_validation->set_rules('years_of_experience', 'Years of Experience', 'required|numeric');

        if ($this->form_validation->run() == TRUE) {
            // Save to session
            $data = array(
                'organization_name' => $this->input->post('organization_name'),
                'job_title' => $this->input->post('job_title'),
                'industry' => $this->input->post('industry'),
                'years_of_experience' => $this->input->post('years_of_experience')
            );
            $this->User_model->save_professional_details($data);
            // $this->session->set_userdata('step2_data', $data);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        }
    }

    // Save Step 3: Event Preferences
    public function save_step3()
    {
        $this->form_validation->set_rules('preferred_sessions[]', 'Preferred Sessions', 'required');
        $this->form_validation->set_rules('mode_of_attendance', 'Mode of Attendance', 'required');

        if ($this->form_validation->run() == TRUE) {
            // Save to session
            $data = array(
               'preferred_sessions' => implode(',', $this->input->post('preferred_sessions[]')),

                'mode_of_attendance' => $this->input->post('mode_of_attendance'),
                'dietary_preferences' => $this->input->post('dietary_preferences')
            );
            $this->User_model->save_event_preferences($data);
            // $this->session->set_userdata('step3_data', $data);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        }
    }

    // Save Step 4: Payment Information
    public function save_step4()
    {
        $this->form_validation->set_rules('ticket_type', 'Ticket Type', 'required');
        $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');

        if ($this->form_validation->run() == TRUE) {
            // Save to session
            $data = array(
                'ticket_type' => $this->input->post('ticket_type'),
                'coupon_code' => $this->input->post('coupon_code'),
                'payment_mode' => $this->input->post('payment_mode')
            );
            // $this->session->set_userdata('step4_data', $data);
            $this->User_model->save_payment_info($data); 
            
                         // After payment, generate a payment ID, and process email
            $payment_id = uniqid('PAY-');
            $this->session->set_userdata('payment_id', $payment_id);
            echo json_encode(['status' => 'success', 'payment_id' => $payment_id]);
        } else {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        }
    }
    public function success(){
        $this->load->view('thank_you');
    }
    // After successful registration, you can call this to send email
    public function send_email()
    {
        // Logic for sending an email with registration details and payment info
    }

}
