<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function get_total_users()
    {
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function get_user_data()
    {
        $query = $this->db->get('user');

        return $query->result_array();
    }

    public function get_user_roles()
    {
        $query = $this->db->get('user_role');
        return $query->result_array();
    }

    public function user_update($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function proses_update()
    {
        $data = [
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function getUserById($user_id)
    {
        $query = $this->db->get_where('user', array('id' => $user_id));

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
