<?php
class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function register_user($inputs)
    {
        $result = $this->validate_register($inputs);
        if ($result === true) {
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = md5($inputs['password'] . '' . $salt);
            $user_level = 1;

            // Make 1st User Admin(User Level 9)
            $query = $this->db->get('users');
            $num_users = $query->num_rows();
            if ($num_users == 0) {
                $user_level = 9;
            }

            $data = array(
                "user_level" => $user_level,
                "email_address" => $inputs['email_address'],
                "first_name" => $inputs['first_name'],
                "last_name" => $inputs['last_name'],
                "password" =>  $encrypted_password,
                "salt" => $salt,
                "created_at" => date("Y-m-d, H:i:s"),
                "updated_at" => date("Y-m-d, H:i:s")
            );
            $this->db->insert('users', $data);
        } else {
            return $result; // Return the validation error message
        }
    }

    public function login_user($inputs)
    {
        $result = $this->validate_login($inputs);
        if ($result === true) {
            $query = $this->db->get_where('users', array('email_address' => $inputs['email_address']));
            $user = $query->row();

            if ($user !== null) {
                $encrypted_password = md5($inputs['password'] . '' . $user->salt);

                if ($inputs['email_address'] === $user->email_address && $encrypted_password === $user->password) {
                    $data = array(
                        "id" => $user->id,
                        "user_level" => $user->user_level,
                        "first_name" => $user->first_name,
                        "last_name" => $user->last_name,
                        "email_address" => $user->email_address
                    );
                    return $this->session->set_userdata($data);
                } else {
                    return "Wrong Credential";
                }
            } else {
                return "The email address is not registered.";
            }
        } else {
            return $result; // Return the validation error message
        }
    }

    public function edit_user_info($inputs)
    {
        $result = $this->validate_edit($inputs);
        if ($result === true) {
            $data = array(
                'id' => $inputs['id'],
            );

            // Check if session email is different from updated email
            $session_email = $this->session->userdata('email_address');
            if ($inputs['email_address'] != $session_email) {
                $data['email_address'] = $inputs['email_address'];
            }

            // Check if session first name is different from updated first name
            $session_first_name = $this->session->userdata('first_name');
            if ($inputs['first_name'] != $session_first_name) {
                $data['first_name'] = $inputs['first_name'];
            }

            // Check if session last name is different from updated last name
            $session_last_name = $this->session->userdata('last_name');
            if ($inputs['last_name'] != $session_last_name) {
                $data['last_name'] = $inputs['last_name'];
            }

            $this->db->where('id', $data['id']);
            $update_result = $this->db->update('users', $data);

            if (!$update_result) {
                return 'Failed to update user'; // Return error message
            }

            // Update session data if fields were updated
            if (isset($data['email_address'])) {
                $this->session->set_userdata('email_address', $data['email_address']);
            }
            if (isset($data['first_name'])) {
                $this->session->set_userdata('first_name', $data['first_name']);
            }
            if (isset($data['last_name'])) {
                $this->session->set_userdata('last_name', $data['last_name']);
            }
        } else {
            return $result; // Return the validation error message
        }
    }

    public function edit_user_password($inputs)
    {
        $id = $inputs['id'];
        $old_password = $inputs['old_password'];
        $new_password = $inputs['new_password'];
        $confirm_password = $inputs['confirm_password'];

        // Get the current password for the user
        $this->db->select('password, salt');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();

        $user = $query->row();

        // Check if the old password is correct
        $old_password_hash = md5($old_password . $user->salt);
        if ($old_password_hash !== $user->password) {
            return 'Old password is incorrect';
        }

        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        // Run validation
        if ($this->form_validation->run() == false) {
            return validation_errors();
        }

        // Generate a new salt and encrypt the new password
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($new_password . '' . $salt);

        // Update the user's password in the database
        $data = array(
            'password' => $encrypted_password,
            'salt' => $salt
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }


    public function validate_login()
    {
        // Set the validation rules for each form field
        $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // Run the validation
        if ($this->form_validation->run() == false) {
            return validation_errors(); // Return the validation errors
        } else {
            return true;
        }
    }

    public function validate_register()
    {
        // Set the validation rules for each form field
        $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email|is_unique[users.email_address]');
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        // Run the validation
        if ($this->form_validation->run() == false) {
            return validation_errors(); // Return the validation errors
        } else {
            return true;
        }
    }

    public function validate_edit()
    {
        // Set the validation rules for each form field
        $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');

        // Run the validation
        if ($this->form_validation->run() == false) {
            return validation_errors(); // Return the validation errors
        } else {
            return true;
        }
    }
}
