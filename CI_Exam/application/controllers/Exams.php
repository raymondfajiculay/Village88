<?php
class Exams extends CI_Controller
{
    public function index()
    {
        redirect('assignments');
    }

    public function assignments()
    {
        $inputs = $this->input->post(NULL, TRUE);
        // Make form selected the previously selected
        $this->session->set_flashdata('form_data', $inputs);
        $this->load->model("Exam");
        $output = $this->Exam->show_data($inputs);

        $this->load->view('templates/header');
        $this->load->view('index', $output);
        $this->load->view('templates/footer');
    }
}
