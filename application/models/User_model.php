<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // public function getpersonaldetails(){
    //     $query = $this->db->get('step1_personal_info'); 
    //     return $query->result();
    // }
    public function get_all_users() {
        $this->db->select('
            p.id, p.full_name, p.email, p.phone, p.country,
            d.organization_name, d.job_title, d.industry, d.years_of_experience,
            e.preferred_sessions, e.mode_of_attendance, e.dietary_preferences,
            py.ticket_type,py.coupon_code, py.payment_mode
        ');
        $this->db->from('step1_personal_info p');
        $this->db->join('step2_professional_details d', 'p.id = d.user_id', 'left');
        $this->db->join('step3_event_preferences e', 'p.id = e.user_id', 'left');
        $this->db->join('step4_payment py', 'p.id = py.user_id', 'left');

        $query = $this->db->get();
        return $query->result_array(); // Returns data as an associative array
      }
      public function getstep1($user_id){
        $this->db->where('id', $user_id);
        // $this->db->select('*');
        $query = $this->db->get('step1_personal_info');
        $data = $query->result_array(); // Get the result as an array of associative arrays
        return $data;
    }

    // Function to save user data at each step
    public function save_personal_info($data)
    {
        // Assuming you have a 'users' table
        $this->db->insert('step1_personal_info', $data);

        return $this->db->insert_id();  // Return the user ID
    }

    // public function save_professional_details($user_id, $data)
    public function save_professional_details($data)
    {
        // Save the professional details with the user_id
        // $data['user_id'] = $user_id;
        $this->db->insert('step2_professional_details', $data);
    }

    public function save_event_preferences($data)
    {
        // Save event preferences with user_id
        // $data['user_id'] = $user_id;
        $this->db->insert('step3_event_preferences', $data);
    }

    public function save_payment_info( $data)
    {
        // Save payment info with user_id
        // $data['user_id'] = $user_id;
        $this->db->insert('step4_payment', $data);
    }

    // Function to check if the coupon code is valid and return the discount
    // public function validate_coupon_code($coupon_code)
    // {
        // $this->db->where('coupon_code', $coupon_code);
        // $query = $this->db->get('coupons');  // Assuming you have a 'coupons' table
        // if ($query->num_rows() > 0) {
            // return $query->row();  // Return coupon data (discount percentage)
        // }
        // return false;  // Invalid coupon code
    // }

    // Function to get event sessions (if required)
    public function get_event_sessions()
    {
        $query = $this->db->get('event_sessions');  // Assuming you have an 'event_sessions' table
        return $query->result();  // Return all sessions
    }

    // You can add more functions as necessary for your application.
}
