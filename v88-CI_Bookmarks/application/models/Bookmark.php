<?php
class Bookmark extends CI_Model
{
    public function add_bookmark($data)
    {
        $query = "INSERT INTO bookmarks(folder,name, url, created_at, updated_at) VALUES (?,?,?,?,?)";
        $values = array($data['folder'], $data['name'], $data['url'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    public function get_all_bookmarks()
    {
        return $this->db->query("SELECT * FROM bookmarks")->result_array();
    }

    public function delete_bookmark($data)
    {
        $query = "DELETE FROM bookmarks WHERE id = ?";
        return $this->db->query($query, array($data));
    }

    public function view_bookmark($id)
    {
        $query = "SELECT * FROM bookmarks WHERE id = ?";
        $result = $this->db->query($query, array($id));
        return $result->row_array();
    }
}
