<?php
class Exam extends CI_Model
{
    public function show_data($inputs)
    {
        $sql = "SELECT * FROM assignments";

        $params = array();

        if (!empty($inputs["level1"]) && !empty($inputs["level2"])) {
            $sql .= " WHERE level IN (?, ?)";
            $params[] = $inputs["level1"];
            $params[] = $inputs["level2"];
        } else if (!empty($inputs["level1"])) {
            $sql .= " WHERE level = ?";
            $params[] = $inputs["level1"];
        } else if (!empty($inputs["level2"])) {
            $sql .= " WHERE level = ?";
            $params[] = $inputs["level2"];
        }

        if (!empty($inputs["track"])) {
            if (strpos($sql, "WHERE") !== false) {
                $sql .= " AND track = ?";
            } else {
                $sql .= " WHERE track = ?";
            }
            $params[] = $inputs["track"];
        }

        $query = $this->db->query($sql, $params);
        $num_rows = $query->num_rows();
        $results = $query->result();
        return array('datas' => $results, 'num_rows' => $num_rows);
    }
}
