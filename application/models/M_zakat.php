<?php

class M_zakat extends CI_Model
{   
    //Muzzaki Start
    public function getDataMuzzaki()
    {
        return $this->db->get('tbl_muzzaki')->result_array();
    }

    public function inputDataMuzzaki($data)
    {
        $this->db->insert('tbl_muzzaki', $data);
    }

    public function inputNoTransaksi($data)
    {
        $this->db->set('no_transaksi', $data);
        $this->db->where('no_transaksi', 'empty');
        $this->db->update('tbl_muzzaki');
    }
    //Muzzaki End

    //Mustahik Start
    public function getDataMustahik()
    {
        return $this->db->get('tbl_mustahik')->result_array();
    }

    public function inputDataMustahik($data)
    {
        $this->db->insert('tbl_mustahik', $data);
    }


    public function updateMustahik($checked_id){
        $this->db->where_in('id_mustahik', $checked_id);


        $data = array(
            'status_mustahik' => "SUDAH TERIMA ZAKAT",
            'waktu_penerimaan' => date('d F Y H:i:s')
        );

        return $this->db->update('tbl_mustahik', $data);
    }

    public function deleteMuzzaki($checked_id){
        $this->db->where_in('id_muzzaki', $checked_id);

        return $this->db->delete('tbl_muzzaki');
    }

    public function deleteMustahik($id_mustahik){
        $this->db->where_in('id_mustahik', $id_mustahik);

        return $this->db->delete('tbl_mustahik');
    }

    public function rekapDataTahun($data){
        $this->db->insert('tbl_rekap', $data);
    }

    public function getRekapData(){
        $this->db->like('tahun_rekap', $_GET['tahun']);
        return $this->db->get('tbl_rekap')->result_array();
    }

    public function getRekapDataMustahik($dataMustahik){

        $this->db->insert('tbl_rekap_mustahik', $dataMustahik);
        
    }
    
    public function getRekapDataMuzzaki($dataMuzzaki){

        $this->db->insert('tbl_rekap_muzzaki', $dataMuzzaki);
    
    }

    public function getSumBeras(){
		$this->db->select_sum('nominal_zakat');
        $this->db->where('jenis_zakat', 'Beras');
        return $this->db->get('tbl_muzzaki')->result_array();  
    }

    public function getSumUang(){
		$this->db->select_sum('nominal_zakat');
        $this->db->where('jenis_zakat', 'Uang Tunai');
        return $this->db->get('tbl_muzzaki')->result_array();  
    }

}