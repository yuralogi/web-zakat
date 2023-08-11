<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		notLogin();
	}
	
	public function index()
	{
		$data['page_title'] = 'Profile | ' . $this->session->userdata('name');
		$this->form_validation->set_rules('inputUsername', 'Email', 'required', 'trim', 'valid_email');
		$this->form_validation->set_rules('inputPassword', 'Password', 'required');

		if ($this->form_validation->run() == false) {
            $data['page_title'] = 'Profile';
            $this->load->view('backend/businesslogic/v_profile', $data);
        } else {
            //validasi lolos
            $this->konfirmasiRekap();
        }
	}

	private function konfirmasiRekap(){
		$username = $this->input->post('inputUsername');
        $password = $this->input->post('inputPassword');
        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

            if (password_verify($password, $user['password'])) {
				$this->session->set_flashdata('flash', 'rekap-data');
				redirect('admin/rekaptahun');

            } else {
				$this->session->set_flashdata('flash', 'gagal-login');
				redirect('admin/profile');
            }	
	}
}