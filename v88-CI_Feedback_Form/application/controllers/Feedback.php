<?php
class Feedback extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('feedback/feedback');
        $this->load->view('templates/footer');
    }

    public function result()
    {
        $data =  $this->input->post();
        $this->load->view('templates/header');
        if (!empty($data)) {
            $this->load->view('feedback/result', array('data' => $data));
        }
        $this->load->view('templates/footer');
    }
}
