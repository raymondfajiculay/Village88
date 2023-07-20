<?php
class Contacts extends CI_Controller
{
    public function index()
    {
        $this->load->model("Contact");
        $data['phonebooks'] = $this->Contact->get_all_contacts();

        $this->load->view('templates/header');
        $this->load->view('contacts', $data);
        $this->load->view('templates/footer');
    }

    public function new()
    {
        $this->load->view('templates/header');
        $this->load->view('new');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $input = $this->input->post();
        var_dump($input);
        if (!empty($input['name']) && !empty($input['contact_num'])) {
            $this->load->model("Contact");
            $data = array("name" => "{$input['name']}", "contact_num" => "{$input['contact_num']}");
            $result = $this->Contact->add_contact($data);
        }
        redirect('/contacts');
    }

    public function show($id)
    {
        $this->load->model("Contact");
        $data['phonebook'] = $this->Contact->show_contact($id);

        $this->load->view('templates/header');
        $this->load->view('show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $this->load->model("Contact");
        $data['phonebook'] = $this->Contact->show_contact($id);

        $this->load->view('templates/header');
        $this->load->view('edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $input = $this->input->post();
        $this->load->model("Contact");
        $data = array("id" => "{$input['id']}", "name" => "{$input['name']}", "contact_num" => "{$input['contact_num']}");
        $result = $this->Contact->update_contact($data);

        redirect('/contacts');
    }

    public function delete($id)
    {
        $this->load->model("Contact");
        $delete_bookmark = $this->Contact->delete_contact($id);
        redirect('/contacts');
    }
}
