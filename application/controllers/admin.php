<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_product');
        $this->load->model('model_gallery');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('model_order');
        $data['total_orders'] = $this->model_order->get_total_orders();

        $this->load->model('model_product');
        $data['total_products'] = $this->model_product->get_total_products();

        $this->load->model('model_message');
        $data['total_messages'] = $this->model_message->get_total_messages();

        $this->load->model('model_user');
        $data['total_users'] = $this->model_user->get_total_users();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function add_admin()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/add_admin');
            $this->load->view('templates/admin_footer', $data);
        } else {
            $password = $this->input->post('password1');

            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill"></use></svg>
            <div>
            The data has been successfully added.
            </div></div>');
            redirect('admin/user_list');
        }
    }

    public function user_list()
    {
        $oke['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $user_role = $this->session->userdata('id');
        $data['user_role'] = $user_role;

        $this->load->model('model_user');
        $data['users'] = $this->model_user->get_user_data();
        $data['user_role'] = $this->model_user->get_user_roles();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $oke);
        $this->load->view('admin/user_list', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function user_update($id)
    {
        $data['user'] = $this->model_user->user_update($id);
        redirect('user_list');

        $this->load->view('admin/user_list', $data);
    }

    public function delete_user($id)
    {
        $this->load->model('Model_user');
        $this->Model_user->delete_user($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill"></use></svg>
            <div>
            The data has been successfully deleted.
            </div></div>');
        redirect('admin/user_list');
    }

    public function proses_update($id)
    {
        $this->load->model('Model_user');
        $this->Model_user->proses_update($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#check-circle-fill"></use></svg>
        <div>
        The data has been successfully added.
        </div></div>');
        redirect('admin/user_list');
    }

    public function order_list()
    {
        $oke['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('model_order');
        $data['orders'] = $this->model_order->get_order_data();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $oke);
        $this->load->view('admin/order_list', $data);
        $this->load->view('templates/admin_footer', $data);
    }


    public function delete_order($id)
    {
        $this->load->model('model_order');
        $this->Model_user->delete_order($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#check-circle-fill"></use></svg>
        <div>
        The data has been successfully deleted.
        </div></div>');
        redirect('admin/user_list');
    }

    public function update_payment_status($order_id)
    {
        $payment_status = $this->input->post('payment_status');
        $this->load->model('model_order');
        $this->model_order->update_payment_status($order_id, $payment_status);
        redirect('admin/order_list');
    }

    public function product_list()
    {
        $oke['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['products'] = $this->model_product->get_product_data();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $oke);
        $this->load->view('admin/product_list', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function add_product()
    {
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $details = $this->input->post('details');
        $image_01 = $_FILES['image_01']['name'];
        if ($image_01 == '') {
        } else {
            $config['upload_path'] = './images';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_01')) {
                echo "upload unsuccess!";
            } else {
                $image_01 = $this->upload->data('file_name');
            }
        }

        $data = array(
            'name'  => $name,
            'price' => $price,
            'details' => $details,
            'image_01' => $image_01
        );

        $this->model_product->add_product($data, 'products');
        redirect('admin/product_list');
    }

    public function product_update($id)
    {
        $data['product'] = $this->model_product->product_update($id);
        redirect('product_list');

        $this->load->view('admin/product_list', $data);
    }

    public function update_product($id)
    {
        $this->load->model('Model_product');
        $this->Model_product->update_product($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#check-circle-fill"></use></svg>
        <div>
        The data has been successfully added.
        </div></div>');
        redirect('admin/product_list');
    }

    public function delete_product($id)
    {
        $this->load->model('Model_product');
        $this->Model_product->delete_product($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill"></use></svg>
            <div>
            The data has been successfully deleted.
            </div></div>');
        redirect('admin/product_list');
    }

    public function message()
    {
        $oke['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('model_message');
        $data['messages'] = $this->model_message->get_message_data();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $oke);
        $this->load->view('admin/message', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function delete_message($id)
    {
        $this->load->model('model_message');
        $this->model_message->delete_message($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill"></use></svg>
            <div>
            The data has been successfully deleted.
            </div></div>');
        redirect('admin/message');
    }

    public function gallery()
    {
        $oke['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('model_gallery');
        $data['gallery'] = $this->model_gallery->get_gallery_data();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $oke);
        $this->load->view('admin/gallery', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function delete_gallery($id)
    {
        $this->load->model('model_gallery');
        $this->model_gallery->delete_gallery($id);
        $this->session->set_flashdata('gallery', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill"></use></svg>
            <div>
            The data has been successfully deleted.
            </div></div>');
        redirect('admin/gallery');
    }

    public function add_gallery()
    {
        $image = $_FILES['image']['name'];
        if ($image == '') {
        } else {
            $config['upload_path'] = './gallery';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "upload unsuccess!";
            } else {
                $image = $this->upload->data('file_name');
            }
        }

        $data = array(
            'image' => $image
        );

        $this->model_gallery->add_gallery($data, 'gallery');
        redirect('admin/gallery');
    }
}
