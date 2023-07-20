<?php
class Clients extends CI_Controller
{
    public function index($output = '')
    {
        if (!$output) {
            $this->load->model("Client");
            $default_data = [
                'start' => '2011-01-01',
                'end' => '2011-12-31',
            ];
            $results = $this->Client->show_data($default_data);
            $output = array('results' => $results);
        }

        $this->load->view('templates/header', $output);
        $this->load->view('index', $output);
        $this->load->view('templates/footer');
    }

    public function show()
    {
        $data = $this->input->post();
        $this->load->model("Client");

        $results = $this->Client->show_data($data);

        $output = array('results' => $results);

        $this->index($output);
    }
}
