<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TampilRekap extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		notLogin();
	}
    public function index(){
     
        if(isset($_GET["tahun"])){
            $data['page_title'] = 'Rekap | ' . $_GET['tahun'];
            $this->db->select('*');
            $this->db->from('tbl_rekap');
            $this->db->like('tahun_rekap', $_GET["tahun"]);
            $result = $this->db->count_all_results();
            
            if($result == 1){
                $this->load->model('m_zakat');
                $data['rekap_data'] = $this->m_zakat->getRekapData();
                $this->load->view('backend/businesslogic/v_rekap', $data);

            }else{
               redirect("notfound");
            }
            
        }
    }

}

 