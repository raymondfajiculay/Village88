<?php
class Bookmarks extends CI_Controller
{
    public function index()
    {
        $this->load->model("Bookmark");
        $data['bookmarks'] = $this->Bookmark->get_all_bookmarks();
        // $this->index($data);

        $this->load->view('templates/header');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $input = $this->input->post();

        if (!empty($input['name']) && !empty($input['url'])) {
            $this->load->model("Bookmark");
            $data = array("folder" => "{$input['folder']}", "name" => "{$input['name']}", "url" => "{$input['url']}");
            $add_bookmark = $this->Bookmark->add_bookmark($data);
        }
        if ($add_bookmark === TRUE) {
            echo "Added";
        }
        redirect('/');
    }

    public function destroy($id)
    {
        $this->load->model("Bookmark");
        $data['bookmark'] = $this->Bookmark->view_bookmark($id);
        $this->load->view('templates/header');
        $this->load->view('destroy', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->load->model("Bookmark");
        $delete_bookmark = $this->Bookmark->delete_bookmark($id);
        if ($delete_bookmark === TRUE) {
            echo "Deleted";
        }
        redirect('/');
    }
}
