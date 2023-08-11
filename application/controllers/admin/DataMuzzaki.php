<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMuzzaki extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		notLogin();
	}

	public function index()
	{
		$data['page_title'] = 'Data Muzzaki';
		$this->load->model('m_zakat');

        $data['db_zakat'] = $this->m_zakat->getDataMuzzaki();
        $this->load->view('backend/businesslogic/v_data_muzzaki', $data);
	}

    public function inputDataMuzzaki()
	{
			$no_transaksi = "empty";
			$nama_muzzaki = $this->input->post('namaMuzzaki');
			$tlp_muzzaki = $this->input->post('tlpMuzzaki');
			$alamat_muzzaki = $this->input->post('alamatMuzzaki');
			$waktu_penyerahan = date('d F Y H:i:s');
			$jenis_zakat = $this->input->post('jenisZakat');
			$nominal = $this->input->post('nominal');
			if($nama_muzzaki == null){
				redirect('admin/datamuzzaki');
			}
			$data = array(
				'nama_muzzaki' => $nama_muzzaki,
				'no_transaksi' => $no_transaksi,
				'tlp_muzzaki' => $tlp_muzzaki,
				'waktu_penyerahan' => $waktu_penyerahan,
				'jenis_zakat' => $jenis_zakat,
				'alamat_muzzaki' => $alamat_muzzaki,
				'nominal_zakat' => $nominal
			);

			// var_dump($data);

			$this->M_zakat->inputDataMuzzaki($data, 'tbl_muzzaki');
			
			$row = $this->db->select("*")->limit(1)->order_by('id_muzzaki', "DESC")->get("tbl_muzzaki")->row();
			$formatingDate =  date('YmdHis');
			$resultNoTransaksi = $formatingDate . $row->id_muzzaki;
			$data = $resultNoTransaksi;
			$this->M_zakat->inputNoTransaksi($data);

			$this->session->set_flashdata('flash', 'ditambahkan');
			redirect('admin/datamuzzaki');

			
	}

	public function hapusDataMuzzaki(){
		if (isset($_POST['deleteBtn'])) {
			if (!empty($this->input->post('checkbox_value'))) {
				$checkedEmp = $this->input->post('checkbox_value');
				$checked_id = [];

				foreach ($checkedEmp as $row) {
					array_push($checked_id, $row);
				}
				$this->load->model('m_zakat');

				$this->m_zakat->deleteMuzzaki($checked_id);

				$this->session->set_flashdata('flash', 'dihapus');
				redirect('admin/datamuzzaki');
			} else {
				$this->session->set_flashdata('flash', 'gagal-kirim');
				redirect('admin/datamuzzaki');
			}
		}
	}
}