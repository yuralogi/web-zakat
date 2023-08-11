<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailMustahik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		notLogin();
	}
	
	public function index()
	{	
		
		//Total semua mustahik
		$this->db->select('*');
		$this->db->from('tbl_muzzaki');
		$jumlahMustahik = $this->db->count_all_results();
        
		//Mustahik Fakir
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Fakir');
		$mustahikFakir = $this->db->count_all_results();

        //Mustahik Miskin
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Miskin');
		$mustahikMiskin = $this->db->count_all_results();

        //Mustahik Hamba Sahaya
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Hamba Sahaya');
		$mustahikHambaSahaya = $this->db->count_all_results();

        //Mustahik Mualaf
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Mualaf');
		$mustahikMualaf = $this->db->count_all_results();

        //Mustahik Amil
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Amil');
		$mustahikAmil = $this->db->count_all_results();

        //Mustahik Gharimin
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Gharimin');
		$mustahikGharimin = $this->db->count_all_results();

        //Mustahik Fisabillillah
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Fisabilillah');
		$mustahikFisabilillah = $this->db->count_all_results();

        //Mustahik Ibnu Sabil
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
		$this->db->like('ket_mustahik', 'Ibnu Sabil');
		$mustahikIbnuSabil = $this->db->count_all_results();
	
		$data = array (
			'page_title' => 'Detail | Mustahik',
			'mustahikFakir' => $mustahikFakir,
            'mustahikMiskin' => $mustahikMiskin,
            'mustahikHambaSahaya' => $mustahikHambaSahaya,
            'mustahikMualaf' => $mustahikMualaf,
            'mustahikAmil' => $mustahikAmil,
            'mustahikGharimin' => $mustahikGharimin,
            'mustahikFisabilillah' => $mustahikFisabilillah,
            'mustahikIbnuSabil' => $mustahikIbnuSabil,
			'jumlahMustahik' => $this->db->count_all_results('tbl_mustahik')
		);

		$this->load->view('backend/businesslogic/v_detail_data_mustahik', $data);
	}
}