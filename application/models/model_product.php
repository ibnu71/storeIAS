<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_product extends CI_Model
{
    public function get_total_products()
    {
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    public function get_product_data()
    {
        return $this->db->get('products')->result_array();
    }

    public function add_product($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete_product($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products', array('id' => $id));
    }

    public function product_update($id)
    {
        return $this->db->get_where('products', ['id' => $id])->row_array();
    }

    public function update_product()
    {
        $data = [
            "name" => $this->input->post('name'),
            "price" => $this->input->post('price'),
            "details" => $this->input->post('details'),
            "image_01" => $this->input->post('image_01'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('products', $data);
    }


    public function get_product_by_id($product_id)
    {
        $query = $this->db->get_where('products', array('id' => $product_id));
        return $query->row_array();
    }
}
