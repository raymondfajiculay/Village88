<?php
class Accounts extends CI_Controller
{
    public function index()
    {
        $this->load->view("templates/header");
        $this->load->view("index");
        $this->load->view("templates/footer");
    }

    public function register()
    {
        $input = $this->input->post();
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('contact_num', 'Contact Number', 'required|regex_match[/^09[0-9]{9}$/]|callback_check_record_exists');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // validation failed, show error messages
            $errors = validation_errors();
            $this->session->set_flashdata("errors", $errors);
            redirect("/");
        } else {
            $this->load->model("Account");
            $data = array("first_name" => "{$input['first_name']}", "last_name" => "{$input['last_name']}", "contact_num" => "{$input['contact_num']}", "password" => "{$input['password']}");
            $result = $this->Account->register_account($data);
            if ($result) {
                $this->session->set_flashdata("success", "User Registered");
                redirect("/");
            } else {
                $this->session->set_flashdata("errors", "Error registering account. Please try again.");
                redirect("/");
            }
        }
    }

    public function check_record_exists($value)
    {
        $this->load->model('Account');
        $record = $this->Account->check_contact($value);

        if ($record) {
            $this->form_validation->set_message('check_record_exists', 'Contact number already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function login()
    {
        $input = $this->input->post();
        $this->form_validation->set_rules('contact_num', 'Contact Number', 'required|regex_match[/^09[0-9]{9}$/]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            $this->session->set_flashdata("errors", $errors);
            redirect("/");
        } else {
            $this->load->model("Account");
            $data = array("contact_num" => "{$input['contact_num']}", "password" => "{$input['password']}");
            $result = $this->Account->view_contact($data);

            if (!empty($result)) {
                $session_data = array(
                    'first_name'  => $result['first_name'],
                    'last_name'  => $result['last_name'],
                    'contact_num'  => $result['contact_num'],
                    'last_failed_login'  => $result['last_failed_login'],
                    'logged_in' => TRUE

                );
                $this->session->set_userdata($session_data);
            } else {
                $this->session->set_flashdata("errors", "Invalid login details");
            }
        }

        $this->load->view("templates/header");
        $this->load->view("homepage");
        $this->load->view("templates/footer");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/accounts');
    }
}
