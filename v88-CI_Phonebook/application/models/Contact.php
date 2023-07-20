<?php
class Contact extends CI_Model
{
    public function get_all_contacts()
    {
        return $this->db->query("SELECT * FROM phonebooks")->result_array();
    }

    public function add_contact($data)
    {
        $query = "INSERT INTO phonebooks(name,contact_num, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($data['name'], $data['contact_num'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    public function show_contact($id)
    {
        $query = "SELECT * FROM phonebooks WHERE id = ?";
        $result = $this->db->query($query, array($id));
        return $result->row_array();
    }
    public function update_contact($data)
    {
        $query = "UPDATE phonebooks SET name = ?, contact_num = ?, updated_at = ? WHERE id = ?";
        $values = array($data['name'], $data['contact_num'], date("Y-m-d, H:i:s"), $data['id']);
        return $this->db->query($query, $values);
    }

    public function delete_contact($data)
    {
        $query = "DELETE FROM phonebooks WHERE id = ?";
        return $this->db->query($query, array($data));
    }
}
