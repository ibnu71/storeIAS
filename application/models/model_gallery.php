<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_gallery extends CI_Model
{
    public function get_gallery_data()
    {
        return $this->db->get('gallery')->result_array();
    }


    public function delete_gallery($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('gallery');
    }

    public function add_gallery($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
