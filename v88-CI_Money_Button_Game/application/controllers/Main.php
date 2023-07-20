<?php

class Main extends CI_Controller
{
    public function index()
    {
        $money = $this->session->userdata('money');
        $chance = $this->session->userdata('chance');


        if (!isset($money)) {
            $this->session->set_userdata('money', 500);
        }
        if (!isset($chance)) {
            $this->session->set_userdata('chance', 10);
        }

        $data = array();
        $data['money'] = $this->session->userdata('money');
        $data['chance'] = $this->session->userdata('chance');
        $data['logs'] = $this->session->userdata('logs');

        $this->load->view('templates/header');
        $this->load->view('money_button', $data);
        $this->load->view('templates/footer');
    }

    public function bet()
    {


        $loss = $this->input->post('loss');
        $gain = $this->input->post('gain');
        $random = rand($loss, $gain);

        $chance = $this->session->userdata('chance');
        $money = $this->session->userdata('money');


        if ($money + $loss < 0) {
        } else if ($chance >= 1) {
            $chance--;
            $this->session->set_userdata('chance', $chance);

            $money += $random;
            $this->session->set_userdata('money', $money);


            $this->log($random, $money, $chance);
        }
        redirect('/');
    }

    public function log($random, $money, $chance)
    {
        $logs = $this->session->userdata('logs');

        $risk = $this->input->post('risk');
        $datetime = date('m-d-y h:i a');

        if (!isset($logs)) {
            $logs = array();
        }

        if ($random >= 0) {
            $color = "success";
        } else {
            $color = "danger";
        }

        $new_log = array("log" => "[ $datetime ] You pushed {$risk}. Value is {$random}. Your current money now is {$money} with {$chance} chance(s) left.", "color" => $color);
        array_push($logs, $new_log);
        if ($chance < 1) {
            $new_log = array("log" => "Game Over!!! Please Restart the Game.........", "color" => "dark");
            array_push($logs, $new_log);
        }


        // $new_log = array("log" => "Game Over", "color" => "dark");


        $this->session->set_userdata('logs', $logs);

        redirect('/');
    }

    public function reset()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
