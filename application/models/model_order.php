<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_order extends CI_Model
{

    public function get_total_orders()
    {
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    public function get_order_data()
    {
        return $this->db->get('orders')->result_array();
    }

    public function delete_order($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('orders');
    }

    public function update_payment_status($order_id, $payment_status)
    {
        $data = array('payment_status' => $payment_status);
        $this->db->where('id', $order_id);
        $this->db->update('orders', $data);
    }

    public function insert_order($order_data)
    {
        // Masukkan data ke dalam tabel 'orders'
        $this->db->insert('orders', $order_data);

        // Kembalikan ID yang baru saja dimasukkan (jika ada)
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;
    }
}
