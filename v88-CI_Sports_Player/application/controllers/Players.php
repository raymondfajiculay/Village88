<?php
class Players extends CI_Controller
{
    public function index()
    {
        redirect('search');
    }

    public function search()
    {
        $inputs = $this->input->post(NULL, TRUE);

        $this->load->model("Player");
        $results = $this->Player->show_data($inputs);
        $this->load->view('templates/header');
        $this->load->view('search', $results);
        $this->load->view('templates/footer');
    }
}
