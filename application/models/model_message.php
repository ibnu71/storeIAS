<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_message extends CI_Model
{
    public function get_total_messages()
    {
        $query = $this->db->get('messages');
        return $query->num_rows();
    }

    public function get_message_data()
    {
        return $this->db->get('messages')->result_array();
    }

    public function delete_message($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('messages');
    }
}
