<?php
class Raffle extends CI_Controller
{

    public function index()
    {
        $count = $this->session->userdata("count");

        if (!isset($count)) {
            $rand = "Who will be the winners!!!!!";
            $this->session->set_userdata('count', 0);
        } else if (isset($count) && $count < 10) {
            $count++;
            $rand = rand(1111111, 9999999);
            $this->session->set_userdata('count', $count);
        } else {
            $rand = "Max winner been reach";
            $data = array('rand' => $rand, "count" => $this->session->userdata('count'));
        }

        $data = array('rand' => $rand, "count" => $this->session->userdata('count'));

        $this->load->view('templates/header');
        $this->load->view('random', $data);
        $this->load->view('templates/footer');
    }

    public function reset()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
