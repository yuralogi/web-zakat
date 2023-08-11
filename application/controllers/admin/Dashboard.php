<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		notLogin();
	}

	public function index()
	{
		$this->load->model('m_zakat');
		
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('status_mustahik', 'SUDAH TERIMA ZAKAT');
		$jumlahMustahik = $this->db->count_all_results();

		foreach ($this->m_zakat->getSumBeras() as $row) {
			foreach ($this->m_zakat->getSumUang() as $value) {
				if ($value['nominal_zakat'] == null) {
					$valueUang = 0;
				}else{
					$valueUang = $value['nominal_zakat'];
				}	
				
				$data = array (
					'page_title' => 'Dashboard',
					'jumlahMuzzaki' => $this->db->count_all_results('tbl_muzzaki'),
					'jumlahMustahik' => $jumlahMustahik,
					'jumlahBeras' => $row['nominal_zakat'],
					'jumlahUang' => $valueUang
				);
			}
		}

		$this->load->view('backend/dashboard/index', $data);

	}
}