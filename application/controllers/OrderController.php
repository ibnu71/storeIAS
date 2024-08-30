<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
{
    public function checkout()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $product_id = $this->input->post('product_id');

        $this->load->model('Model_product');
        $selected_product = $this->Model_product->get_product_by_id($product_id);

        if (!$selected_product) {
            $this->session->set_flashdata('error_message', 'Product not found.');
            redirect('member');
        }

        $data['selected_product'] = $selected_product;

        $this->load->model('model_product');
        $data['products'] = $this->model_product->get_product_data();

        $total_products = 1;
        $total_price = $selected_product['price'];

        $data['total_products'] = $total_products;
        $data['total_price'] = $total_price;

        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_topbar', $data);
        $this->load->view('member/checkout', $data);
        $this->load->view('templates/member_footer', $data);
    }

    public function place_order()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id'];

        $name = $this->input->post('name');
        $number = $this->input->post('number');
        $email = $this->input->post('email');
        $method = $this->input->post('method');
        $address = $this->input->post('address');
        $total_products = $this->input->post('total_products');
        $total_price = $this->input->post('total_price');

        $this->load->model('model_order');

        $order_data = array(
            'user_id'        => $user_id,
            'name' => $name,
            'number' => $number,
            'email' => $email,
            'method' => $method,
            'address' => $address,
            'total_products' => $total_products,
            'total_price' => $total_price
        );

        $result = $this->model_order->insert_order($order_data);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="bd-example">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Please Check Your Orders !
            </div>
        </div> ');
            redirect('member/shop');
        } else {
            $this->session->set_flashdata('error_message', 'Failed to place order.');
            redirect('member/checkout');
        }
    }
}
