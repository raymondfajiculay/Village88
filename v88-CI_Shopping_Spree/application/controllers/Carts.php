
<?php
class Carts extends CI_Controller
{
    public function index()
    {
        $this->load->model("Cart");
        $data['products'] = $this->Cart->view_products();
        $data['cart_count'] = $this->Cart->cart_count();

        $this->load->view('templates/header');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }

    public function add_to_cart()
    {
        $data = $this->input->post();
        $this->load->model('Cart');

        $this->Cart->insert_cart($data);
        redirect('/');
    }

    public function view_cart()
    {
        $this->load->model("Cart");
        $data['items'] = $this->Cart->view_cart();

        $this->load->view('templates/header');
        $this->load->view('cart_view', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->load->model('Cart');
        $this->Cart->delete_cart($id);
        redirect('carts/view_cart');
    }

    public function checkout()
    {
        $data = $this->input->post();
        $this->load->model('Cart');
        $items = $this->Cart->view_cart();

        $this->load->view('templates/header');
        $this->load->view('success', array('data' => $data, 'items' => $items));
        $this->load->view('templates/footer');

        $this->Cart->delete_content();
    }
}
