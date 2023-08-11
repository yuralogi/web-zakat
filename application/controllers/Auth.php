<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        isLogin();
        // $this->form_validation->set_rules('inputUsername', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('inputUsername', 'Email', 'required', 'trim', 'valid_email');
        // $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|');
        $this->form_validation->set_rules('inputPassword', 'Password', 'required');


        if ($this->form_validation->run() == false) {
            $data['page_title'] = 'TLJ CARGO | Admin';
            $this->load->view('backend/login/v_login', $data);
        } else {
            //validasi lolos
            $this->_login();
        }
    }
    
    private function _login()
    {

        $username = $this->input->post('inputUsername');
        $password = $this->input->post('inputPassword');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
        if ($user == null) {
            $this->session->set_flashdata('flash', 'gagal-login');
            redirect('auth');
        }else {
            if ($user['role_user']) {
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata($user);
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('flash', 'gagal-login');
                }
                    redirect('auth');
            
            }        
        }

           
    }

    public function logout()
    {
        $this->session->set_flashdata('flash', 'gagal-login');
        $this->session->sess_destroy();

        redirect('auth');
    }

}