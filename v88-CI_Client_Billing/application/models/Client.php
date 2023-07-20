<?php
class Client extends CI_Model
{
    public function show_data($data)
    {
        $start_date  = $data['start'];
        $end_date = $data['end'];
        // GET MONTH, DATE, AND TOTAL_AMOUNT
        $this->db->select('MONTH(charged_datetime) as month, YEAR(charged_datetime) as year, SUM(amount) as total_amount');
        $this->db->from('billing');
        $this->db->where('charged_datetime >=', $start_date);
        $this->db->where('charged_datetime <=', $end_date);
        $this->db->group_by('MONTH(charged_datetime), YEAR(charged_datetime)');

        $query = $this->db->get();
        $results =  $query->result();

        // CONVERT MONTH TO STRING
        foreach ($results as $result) {
            $result->month = $this->convert_month($result->month);
        }
        return $results;
    }

    public function convert_month($month_num)
    {
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        return $months[$month_num];
    }
}
