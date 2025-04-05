<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
       $this->load->database();
    //    $this->load->model('Admin_model');

    }


    public function register_user($email, $password) {
        $data = [
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT) // Encrypt password
        ];
        return $this->db->insert('users', $data);
    }
    public function check_admin($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row(); // Return admin details
        } else {
            return false;
        }
    }

    public function validate_user($email, $password) {
        $this->db->where('email', $email);
        $user = $this->db->get('users')->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function hash_existing_passwords() {
        $this->db->select('id, password');
        $query = $this->db->get('users');
    
        foreach ($query->result() as $row) {
            // Check if the password is already hashed (Avoid re-hashing)
            if (!password_get_info($row->password)['algo']) {
                $hashed_password = password_hash($row->password, PASSWORD_BCRYPT);
                $this->db->where('id', $row->id);
                $this->db->update('users', ['password' => $hashed_password]);
            }
        }
    
        echo " Passwords updated successfully!";
    }
    //dashboard data start
    public function get_all_users() {
        $this->db->select('
          p.id, p.name, p.email, p.phone, p.country,
          d.organization_name, d.job, d.industry, d.experience,e.sessions,  e.attendance, e.diet,
          py.ticket_type,py.coupon_code, py.payment_mode
         ');
         $this->db->from('email p');
         $this->db->join('org  d', 'p.id = d.id', 'left');
         $this->db->join('event e', 'p.id = e.id', 'left');
        $this->db->join('payment py', 'p.id = py.id', 'left');
  
        $query = $this->db->get();
        return $query->result_array(); // Returns data as an associative array
       }
       public function getstep1($user_id){
        $this->db->where('id', $user_id);
      // $this->db->select('*');
        $query = $this->db->get('email');
        $data = $query->result_array(); // Get the result as an array of associative arrays
        return $data;
        }
  
  //dashboard data
    //csv
    public function get_users() {
      $query = $this->db->get('email'); // Replace 'users' with your actual table name
      return $query->result_array();
  }

  //delete
  public function delete_user($id) {
    $this->db->where('id', $id);
    return $this->db->delete('email'); // Change to your table name
    
  }
  
  //delete end 
    
}
