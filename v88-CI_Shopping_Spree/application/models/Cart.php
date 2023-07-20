
<?php
class Cart extends CI_Model
{
    public function view_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function cart_count()
    {
        $this->db->select('product_id');
        $this->db->from('cart');
        $this->db->group_by('product_id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function insert_cart($data)
    {
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        $existing_cart_item = $this->db->get_where('cart', array('product_id' => $product_id))->row();
        if ($existing_cart_item) {
            $updated_quantity = $existing_cart_item->quantity + $quantity;
            $this->db->update('cart', array('quantity' => $updated_quantity), array('product_id' => $product_id));
        } else {
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");
            $this->db->insert('cart', $data);
        }
        return $this->db->insert_id();
    }


    public function view_cart()
    {
        $this->db->select('cart.id, cart.product_id, products.name, SUM(cart.quantity) as quantity, SUM(cart.quantity * products.price) as total, products.price');
        $this->db->from('cart');
        $this->db->join('products', 'cart.product_id = products.id');
        $this->db->group_by(array('cart.id', 'cart.product_id', 'products.name'));
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_cart($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cart');
    }

    public function delete_content()
    {
        $this->db->truncate('cart');
    }
}
