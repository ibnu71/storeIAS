<?php
defined('BASEPATH') or exit('No direct script access allowed');

class member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('model_gallery');
        $data['gallery'] = $this->model_gallery->get_gallery_data();

        $this->load->model('model_product');
        $data['products'] = $this->model_product->get_product_data();

        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_topbar', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/member_footer', $data);
    }

    public function contact()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $data['user']['id'];

            $insert_data = array(
                'user_id' => $user_id,
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'message' => $this->input->post('message')
            );

            $this->db->insert('messages', $insert_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#check-circle-fill"></use></svg><div>The message has been successfully sent.
        </div></div>');
            redirect('member/contact');
        } else {
            $this->load->view('templates/member_header', $data);
            $this->load->view('templates/member_topbar', $data);
            $this->load->view('member/contact', $data);
            $this->load->view('templates/member_footer', $data);
        }
    }

    public function shop()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('model_product');
        $data['products'] = $this->model_product->get_product_data();

        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_topbar', $data);
        $this->load->view('member/shop', $data);
        $this->load->view('templates/member_footer', $data);
    }

    public function orders()
    {
        $oke['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('model_order');
        $data['orders'] = $this->model_order->get_order_data();

        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_topbar', $oke);
        $this->load->view('member/orders', $data);
        $this->load->view('templates/member_footer', $data);
    }

    public function member_update()
    {
        $this->load->model('model_user');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_data = $data['user'];

        if (empty($user_data)) {
            redirect('login');
        }

        $user_id = $user_data['id'];

        $data['user_info'] = $this->model_user->getUserById($user_id);

        if (empty($data['user_info'])) {
            show_error('User not found');
        }

        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_topbar', $user_data);
        $this->load->view('member/member_update', $data);
        $this->load->view('templates/member_footer', $data);
    }



    public function proses_update($id)
    {
        $this->load->model('Model_user');
        $this->Model_user->proses_update($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#check-circle-fill"></use></svg>
        <div>
        The data has been successfully updated.
        </div></div>');
        redirect('member');
    }
}
