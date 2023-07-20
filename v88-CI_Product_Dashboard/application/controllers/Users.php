<?php
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->has_userdata('id')) {
            redirect('dashboard');
        } else {
            redirect('login');
        }
    }

    public function go_to_login()
    {
        if ($this->session->has_userdata('id')) {
            redirect('dashboard');
        } else {
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
    }

    public function go_to_dashboard()
    {
        if ($this->session->has_userdata('id')) {
            $this->load->view('templates/header');
            $this->load->view('dashboard');
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }

    public function go_to_profile()
    {
        if ($this->session->has_userdata('id')) {
            $this->load->view('templates/header');
            $this->load->view('profile');
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }

    public function go_to_register()
    {
        if ($this->session->has_userdata('id')) {
            $this->load->view('templates/header');
            $this->load->view('register');
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }

    public function register_account()
    {
        $inputs = $this->input->post(NULL, TRUE);
        $this->load->model("User");

        $result = $this->User->register_user($inputs);
        if (!empty($result)) {
            $this->session->set_flashdata('error', "$result");
            redirect('register');
        } else {
            redirect('login');
        }
    }

    public function login_account()
    {
        $inputs = $this->input->post(NULL, TRUE);
        $this->load->model("User");

        $result = $this->User->login_user($inputs);
        var_dump($result);
        if (!empty($result)) {
            $this->session->set_flashdata('error', "$result");
            redirect('login');
        } else {
            redirect('dashboard');
        }
    }

    public function logout_account()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function edit_profile()
    {
        $inputs = $this->input->post(NULL, TRUE);
        $this->load->model("User");
        $this->User->edit_user_info($inputs);
        redirect('profile');
    }

    public function edit_password()
    {
        $inputs = $this->input->post(NULL, TRUE);
        $this->load->model("User");
        $this->User->edit_user_password($inputs);
        redirect('profile');
    }
}
