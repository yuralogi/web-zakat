<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailMuzzaki extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		notLogin();
	}
	
	public function index()
	{	
		$this->load->model('m_zakat');
		//Muzzaki dengan jenis zakat beras
		$this->db->select('*');
		$this->db->from('tbl_muzzaki');
		$this->db->like('jenis_zakat', 'Beras');
		$muzzakiBeras = $this->db->count_all_results();

		// Muzzaki dengan jenis zakat uang
		$this->db->select('*');
		$this->db->from('tbl_muzzaki');
		$this->db->like('jenis_zakat', 'Uang Tunai');
		$muzzakiUang = $this->db->count_all_results();

		foreach ($this->m_zakat->getSumBeras() as $row) {
			foreach ($this->m_zakat->getSumUang() as $value) {
				if ($value['nominal_zakat'] == null) {
					$valueUang = 0;
				}else{
					$valueUang = $value['nominal_zakat'];
				}

				$data = array (
					'page_title' => 'Detail | Muzzaki',
					'muzzakiUang' => $muzzakiUang,
					'muzzakiBeras' => $muzzakiBeras,
					'jumlahMuzzaki' => $this->db->count_all_results('tbl_muzzaki'),
					'jumlahMustahik' => $this->db->count_all_results('tbl_mustahik'),
					'jumlahBeras' => $row['nominal_zakat'],
					'jumlahUang' => $valueUang,
				);
			}
		}

		$this->load->view('backend/businesslogic/v_detail_data_muzzaki', $data);
	}
}