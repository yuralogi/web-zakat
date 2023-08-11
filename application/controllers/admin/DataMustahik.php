<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMustahik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		notLogin();
	}

	public function index()
	{
		$data['page_title'] = 'Data Mustahik';
		$this->load->model('m_zakat');

        $data['db_zakat'] = $this->m_zakat->getDataMustahik();
        $this->load->view('backend/businesslogic/v_data_mustahik', $data);
	}

    public function inputDataMustahik()
	{
			$nama_mustahik = $this->input->post('namaMustahik');
			$alamat_mustahik = $this->input->post('alamatMustahik');
			$waktu_penerimaan = date('d F Y H:i:s');
			$ket_mustahik = $this->input->post('ketMustahik');
			$status_mustahik ='BELUM TERIMA ZAKAT';
			if($nama_mustahik == null){
				redirect('admin/datamustahik');
			}
			$data = array(
				'nama_mustahik' => $nama_mustahik,
				'waktu_penerimaan' => '-',
				'ket_mustahik' => $ket_mustahik,
				'alamat_mustahik' => $alamat_mustahik,
				'status_mustahik' => $status_mustahik
			);

			$this->M_zakat->inputDataMustahik($data, 'tbl_mustahik');

			$this->session->set_flashdata('flash', 'ditambahkan');
			redirect('admin/datamustahik');
	}

	public function konfirmasiMustahik(){
		if (isset($_POST['updateBtn'])) {
			if (!empty($this->input->post('checkbox_value'))) {
				$checkedEmp = $this->input->post('checkbox_value');
				$checked_id = [];

				foreach ($checkedEmp as $row) {
					array_push($checked_id, $row);
				}
				$this->load->model('m_zakat');

				$this->m_zakat->updateMustahik($checked_id);

				$this->session->set_flashdata('flash', 'berhasil-diupdate');
				redirect('admin/datamustahik');
			} else {
				$this->session->set_flashdata('flash', 'gagal-kirim');
				redirect('admin/datamustahik');
			}
		}
	}

	public function hapusMustahik($id_mustahik){
		$this->load->model('m_zakat');
		$this->m_zakat->deleteMustahik($id_mustahik);

		$this->session->set_flashdata('flash', 'dihapus');
		redirect('admin/datamustahik');

		// var_dump($id_mustahik);
	}
}