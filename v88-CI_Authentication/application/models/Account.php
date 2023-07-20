<?php
class Account extends CI_Model
{
    public function register_account($data)
    {
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($data['password'] . '' . $salt);

        $query = "INSERT INTO users(first_name,last_name,contact_num, password, salt,  created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
        $values = array($data['first_name'], $data['last_name'], $data['contact_num'], $encrypted_password, $salt, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    public function check_contact($value)
    {
        $query = "SELECT * FROM users WHERE contact_num = ?";
        $output = $this->db->query($query, array($value));
        if (!empty($output->row_array())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function view_contact($data)
    {
        $query = "SELECT * FROM users WHERE contact_num = ? ";
        $output = $this->db->query($query, array($data['contact_num']))->row_array();

        $encrypted_password = md5($data['password'] . '' . $output['salt']);

        if ($encrypted_password == $output['password']) {
            return $output;
        } else {
            $query = "UPDATE users SET last_failed_login = ? WHERE id = ?";
            $values = array(date("Y-m-d, H:i:s"), $output['id']);
            $this->db->query($query, $values);
        }
    }
}
