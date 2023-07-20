<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Player extends CI_Model
{
    public function show_data($inputs)
    {
        $sql = "SELECT * FROM athletes";
        $params = array();
        $where = false;

        if (!empty($inputs["name"])) {
            $sql .= " WHERE athlete_name LIKE ?";
            $params[] = "%" . $inputs["name"] . "%";
            $where = true;
        }

        if (!empty($inputs["female"]) && !empty($inputs["male"])) {
            if ($where) {
                $sql .= " AND gender IN (?, ?)";
            } else {
                $sql .= " WHERE gender IN (?, ?)";
                $where = true;
            }
            $params[] = $inputs["female"];
            $params[] = $inputs["male"];
        } else if (!empty($inputs["female"])) {
            if ($where) {
                $sql .= " AND gender = ?";
            } else {
                $sql .= " WHERE gender = ?";
                $where = true;
            }
            $params[] = $inputs["female"];
        } else if (!empty($inputs["male"])) {
            if ($where) {
                $sql .= " AND gender = ?";
            } else {
                $sql .= " WHERE gender = ?";
                $where = true;
            }
            $params[] = $inputs["male"];
        }

        $sports = array("basketball", "volleyball", "baseball", "soccer", "football");
        $sports_selected = array();
        foreach ($sports as $sport) {
            if (!empty($inputs[$sport])) {
                $sports_selected[] = $sport;
            }
        }

        if (!empty($sports_selected)) {
            if ($where) {
                $sql .= " AND (";
            } else {
                $sql .= " WHERE (";
                $where = true;
            }

            $i = 0;
            foreach ($sports_selected as $sport) {
                if ($i > 0) {
                    $sql .= " OR ";
                }
                $sql .= "sport = ?";
                $params[] = $sport;
                $i++;
            }

            $sql .= ")";
        }

        $query = $this->db->query($sql, $params);
        $results = $query->result();
        return array('results' => $results);
    }
}
