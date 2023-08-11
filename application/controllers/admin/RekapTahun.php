<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekapTahun extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		notLogin();
	}
	
	public function index()
	{
		if($this->session->flashdata('flash') == 'rekap-data'){
			// echo "berhasil rekap data";
			$this->load->model('m_zakat');
			$this->rekapDataTahunan();
		}else{
			redirect('admin/profile');
		}

	}

	private function rekapDataTahunan(){
		$this->load->model('m_zakat');
		$jumlahMuzzaki = $this->db->count_all_results('tbl_muzzaki');

		foreach ($this->m_zakat->getSumBeras() as $row) {
			foreach ($this->m_zakat->getSumUang() as $value) {
				$data = array (
					'tahun_rekap' => date('Y'), 
					'total_muzzaki' => $this->db->count_all_results('tbl_muzzaki'),
					'total_mustahik' => $this->db->count_all_results('tbl_mustahik'),
					'total_beras' => $row['nominal_zakat'],
					'total_uang' => $value['nominal_zakat']

				);
			}
		}

		$this->db->select('*');
		$this->db->from('tbl_rekap');
		$this->db->like('tahun_rekap', $data['tahun_rekap']);
		$result = $this->db->count_all_results();

		if($result == 1 or $jumlahMuzzaki == 0 ){
			redirect('admin/NotFound');
		}else{
		$this->M_zakat->rekapDataTahun($data);
		
		$this->load->model('m_zakat');
        $dataAllMustahik = $this->m_zakat->getDataMustahik();

		foreach ($dataAllMustahik as $row) {
			
			$dataMustahik = array(
				'tahun_zakat' => date('Y'),
				'nama_mustahik' => $row['nama_mustahik'],
				'alamat_mustahik' => $row['alamat_mustahik'],
				'ket_mustahik' => $row['ket_mustahik'],
				'status_mustahik' => $row['status_mustahik']
			);
			
			$this->M_zakat->getRekapDataMustahik($dataMustahik);

			$id_mustahik = $row['id_mustahik'];
			$this->M_zakat->deleteMustahik($id_mustahik);
		}

		$this->load->model('m_zakat');
        $dataAllMuzzaki = $this->m_zakat->getDataMuzzaki();

		foreach ($dataAllMuzzaki as $row) {
			
			$dataMuzzaki = array(
				'tahun_zakat' => date('Y'),
				'no_transaksi' => $row['no_transaksi'],
				'nama_muzzaki' => $row['nama_muzzaki'],
				'tlp_muzzaki' => $row['tlp_muzzaki'],
				'alamat_muzzaki' => $row['alamat_muzzaki'],
				'jenis_zakat' => $row['jenis_zakat'],
				'nominal_zakat' => $row['nominal_zakat']
			);
			
			$this->M_zakat->getRekapDataMuzzaki($dataMuzzaki);

			$checked_id = $row['id_muzzaki'];
			$this->M_zakat->deleteMuzzaki($checked_id);
		}
			$this->session->set_flashdata('flash', 'dihapus');
			redirect('admin/profile');

	}


	}
}