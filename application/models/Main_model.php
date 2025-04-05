<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //  Insert Data Functions
    public function insert_email($data)
    {
        return $this->db->insert('email', $data) ? $this->db->insert_id() : false;
    }

    public function insert_org($data)
    {
        return $this->db->insert('org', $data) ? $this->db->insert_id() : false;
    }

    public function insert_event($data)
    {
        return $this->db->insert('event', $data) ? $this->db->insert_id() : false;
    }

    public function insert_payment($data)
    {
        $this->db->insert("payment", $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            log_message("error", "Payment Insert Error: " . $this->db->last_query());
            return false;
        }
    }


    //  Update Data Functions
    public function update_record($table, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function update_org($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('org', $data);
    }

    // Fetch User by Email (Fix Case Sensitivity)public
    function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('email');
        return $query->row(); // Returns user row or NULL if not found
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('email', ['id' => $id]);
        return $query->row_array(); // Ensure it returns an array
    }




    //  Fetch Organization by ID
    public function get_org_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('org')->row();
    }

    //  Fetch Complete User Details with Joinspublic
    public function get_user_details($id)
    {
        $this->db->select('
            e.id, e.Name, e.Email, e.Phone, e.Country, 
            o.organization_name, o.job, o.experience, o.industry,
            ev.sessions, ev.attendance, ev.diet,
            p.ticket_type, p.coupon_code, p.payment_mode
        ');
        $this->db->from('email e'); 
        $this->db->join('org o', 'e.id = o.id', 'left');
        $this->db->join('event ev', 'e.id = ev.id', 'left');
        $this->db->join('payment p', 'e.id = p.id', 'left');
        $this->db->where('e.id', $id);
        
        $query = $this->db->get();
        log_message('error', 'SQL Query: ' . $this->db->last_query()); //  Log SQL Query
        return $query->row_array();
    }
    
    
    


    public function get_user_data($id) {
        $email_data = $this->db->get_where('email', ['id' => $id])->row_array() ?? [];
        $org_data = $this->db->get_where('org', ['id' => $id])->row_array() ?? [];
        $event_data = $this->db->get_where('event', ['id' => $id])->row_array() ?? [];
        $payment_data = $this->db->get_where('payment', ['id' => $id])->row_array() ?? [];
    
        $user_data = array_merge($email_data, $org_data, $event_data, $payment_data);
    
        log_message('error', 'Fetched User Data: ' . json_encode($user_data)); //  Log the full data
    
        return $user_data;
    }
    public function get_usser_by_id($id) {
        // $this->db->where('id', $id);
        // $query = $this->db->get('email'); // Change table name if needed
        // return $query->row_array();
        $this->db->where(' id' , $id);
        $email_data = $this->db->get('email');
          return $email_data->row_array();

        }
    
}    
