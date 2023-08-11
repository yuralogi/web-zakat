<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakLaporan extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
		notLogin();
	}
    
    
    public function index()
    {
        $this->load->library('fpdf');
        $this->load->model('m_zakat');
        $pdf = new FPDF();

        $jumlahMuzzaki = $this->db->count_all_results('tbl_muzzaki');
		$jumlahMustahik = $this->db->count_all_results('tbl_mustahik');

        $pdf->addPage('P','A4');
        $pdf->setFont("times", "", 25);
        $pdf->setMargins(4,3,3);
        $pdf->Image('assets/sbadmin2-templating/img/logoMasjid.png',10, 5, -220);
        $pdf->Text(40, 15, 'MASJID JAMI NUR MUHAMMAD');

        $pdf->setFont("times", "", 12);
        $pdf->Text(45, 25, 'Jl. Prepedan Raya Rt 001/007 Kel. Kamal Kec. Kalideres Jakarta Barat');
        $pdf->Line(15,35,190,35);

        $pdf->setFont("times", "B", 16);
        $pdf->Text(40, 45, 'LAPORAN PENERIMAAN ZAKAT FITRAH 2023');

        $pdf->setFont("times", "", 12);
        $pdf->Text(15, 60, '1. REKAP DATA KESELURUHAN ');
        $pdf->Text(20, 70, 'Total Muzzaki : ' . $jumlahMuzzaki . ' Orang');
        $pdf->Text(20, 76, 'Total Mustahik : ' . $jumlahMustahik . ' Orang');


        foreach ($this->m_zakat->getSumBeras() as $row) {
			foreach ($this->m_zakat->getSumUang() as $value) {
                if ($value['nominal_zakat'] == null) {
					$valueUang = 0;
				}else{
					$valueUang = $value['nominal_zakat'];
				}

				$pdf->Text(20, 86, 'Total Beras : ' . $row['nominal_zakat'] . ' Liter');
                $pdf->Text(20, 92, 'Total Uang : ' . 'Rp. '. number_format($valueUang, 2,',','.') );
			}
		}
        

        //Total semua mustahik
		$this->db->select('*');
		$this->db->from('tbl_mustahik');
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

        //Muzzaki dengan jenis zakat beras
		$this->db->select('*');
		$this->db->from('tbl_muzzaki');
		$this->db->like('jenis_zakat', 'Beras');
		$muzzakiBeras = $this->db->count_all_results();
	

		//Muzzaki dengan jenis zakat uang
		$this->db->select('*');
		$this->db->from('tbl_muzzaki');
		$this->db->like('jenis_zakat', 'Uang Tunai');
		$muzzakiUang = $this->db->count_all_results();

        $pdf->Text(15, 102, '2. RINCIAN MUSTAHIK ');
        $pdf->Text(20, 112, 'Fakir '.'.............................. : '. $mustahikFakir.' Orang');
        $pdf->Text(20, 118, 'Miskin '.'............................ : '. $mustahikMiskin.' Orang');
        $pdf->Text(20, 124, 'Hamba Sahaya'.'................. : '. $mustahikHambaSahaya.' Orang');
        $pdf->Text(20, 130, 'Mualaf '.'............................ : '. $mustahikMualaf .' Orang');
        $pdf->Text(20, 136, 'Amil '.'................................ : '. $mustahikAmil .' Orang');
        $pdf->Text(20, 142, 'Gharimin '.'......................... : '. $mustahikGharimin .' Orang');
        $pdf->Text(20, 148, 'Fisabilillah '.'...................... : '. $mustahikFisabilillah .' Orang');
        $pdf->Text(20, 154, 'Ibnu Sabil '.'......................... : '. $mustahikIbnuSabil .' Orang');

        $pdf->Text(15, 164, '3. RINCIAN MUZZAKI ');
        // $pdf->Text(20, 174, 'Total Uang ' . $jumlahUang .' dari ' . $muzzakiUang.' Orang Muzzaki');
        // $pdf->Text(20, 180, 'Total Beras '. $jumlahBeras .' Liter dari '. $muzzakiBeras .' Orang Muzzaki');

        foreach ($this->m_zakat->getSumBeras() as $row) {
			foreach ($this->m_zakat->getSumUang() as $value) {
                if ($value['nominal_zakat'] == null) {
					$valueUang = 0;
				}else{
					$valueUang = $value['nominal_zakat'];
				}
				$pdf->Text(20, 174, 'Total Uang ' . 'Rp. '. number_format($valueUang, 2,',','.') .' dari ' . $muzzakiUang.' Orang Muzzaki');
                $pdf->Text(20, 180, 'Total Beras '. $row['nominal_zakat'] .' Liter dari '. $muzzakiBeras .' Orang Muzzaki');
			}
		}
       
       
        $pdf->Text(15, 220, 'Ketua Amil Zakat');

        $pdf->Text(15, 250, 'Ahmad Anda');

        $pdf->Text(120, 220, 'Ketua DKM Masjid Jami Nur Muhammad');

        $pdf->Text(140, 250, 'Hadiman Anthomi');

        $pdf->setFont("times", "I", 8);
        $pdf->Text(15, 280, 'Dokumen di cetak pada tanggal : '. date('d F Y H:i:s'));
       
        
        $pdf->output('','LaporanMuzzaki.pdf');

    }

    public function cetakDataMustahik(){
        
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Rekap Data Pengumpulan Zakat Tahun ' . date('Y') . '</h1>');
        $mpdf->WriteHTML('<h4>1. Table Mustahik</h4>');
        
        $data_mustahik = $this->db->get('tbl_mustahik')->result_array();
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Data Mustahik</title>
        </head>
        <body>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Waktu Penerimaan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>';

                $i = 1;
                foreach($data_mustahik as $row){
                    $html .= '<tr>
                        <td>'. $i++ .'</td>
                        <td>'. $row['nama_mustahik'] .'</td>
                        <td>'. $row['alamat_mustahik'] .'</td>
                        <td>'. $row['waktu_penerimaan'] .'</td>
                        <td>'. $row['ket_mustahik'] .'</td>
                        <td>'. $row['status_mustahik'] .'</td>
                    </tr>';
                }
        $html .= '</table>
        </body>
        </html>';
        
        $time = 'Dokumen di cetak pada tanggal : '. date('d F Y H:i:s');
    
       $mpdf->WriteHTML($html);
       $mpdf->WriteHTML($time);
       $mpdf->Output();
    }

    public function cetakDataMuzzaki(){
        
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Rekap Data Pengumpulan Zakat Tahun ' . date('Y') . '</h1>');
        $mpdf->WriteHTML('<h4>1. Table Muzzaki</h4>');
        
        $data_muzzaki = $this->db->get('tbl_muzzaki')->result_array();
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Data Muzzaki</title>
        </head>
        <body>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Nama</th>
                    <th>No Tlp</th>
                    <th>Alamat</th>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Waktu Penyerahan</th>
                </tr>';

                $i = 1;
                foreach($data_muzzaki as $row){
                    $html .= '<tr>
                        <td>'. $i++ .'</td>
                        <td>'. $row['no_transaksi'] .'</td>
                        <td>'. $row['nama_muzzaki'] .'</td>
                        <td>'. $row['tlp_muzzaki'] .'</td>
                        <td>'. $row['alamat_muzzaki'] .'</td>
                        <td>'. $row['jenis_zakat'] .'</td>';
                        
                        if ($row['jenis_zakat'] == "Beras") {
                            $html .= '<td>'. $row['nominal_zakat'] .' Liter' .'</td>';
                        } else {
                            $html .= '<td>' . 'Rp. '. number_format($row['nominal_zakat'], 2,',','.') .'</td>';
                        }
                        $html .= '<td>'. $row['waktu_penyerahan'] .'</td>
                    </tr>';
            }
        $html .= '</table>
        </body>
        </html>';
        
        $time = 'Dokumen di cetak pada tanggal : '. date('d F Y H:i:s');
    
       $mpdf->WriteHTML($html);
       $mpdf->WriteHTML($time);
       $mpdf->Output();
    }

    public function cetakDataAllRekap() {
        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Rekap Data Pengumpulan Zakat Tahun ' . $_GET['tahun'] . '</h1>');
        $mpdf->WriteHTML('<h4>1. Table Muzzaki</h4>');
        
        $this->db->like('tahun_zakat', $_GET['tahun']);
        $data_muzzaki = $this->db->get('tbl_rekap_muzzaki')->result_array();
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <title></title>
        </head>
        <body>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Nama</th>
                    <th>No Tlp</th>
                    <th>Alamat</th>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Tahun Periode</th>
                </tr>';

                $i = 1;
                foreach($data_muzzaki as $row){
                    $html .= '<tr>
                        <td>'. $i++ .'</td>
                        <td>'. $row['no_transaksi'] .'</td>
                        <td>'. $row['nama_muzzaki'] .'</td>
                        <td>'. $row['tlp_muzzaki'] .'</td>
                        <td>'. $row['alamat_muzzaki'] .'</td>
                        <td>'. $row['jenis_zakat'] .'</td>';
                        
                        if ($row['jenis_zakat'] == "Beras") {
                            $html .= '<td>'. $row['nominal_zakat'] .' Liter' .'</td>';
                        } else {
                            $html .= '<td>' . 'Rp. '. number_format($row['nominal_zakat'], 2,',','.') .'</td>';
                        }
                        $html .= '<td>'. $row['tahun_zakat'] .'</td>
                    </tr>';
            }
        $html .= '</table>
        </body>
        </html>';

        $mpdf->WriteHTML($html);
        $mpdf->addPage();

        $mpdf->WriteHTML('<h4>1. Table Mustahik</h4>');
        
        $this->db->like('tahun_zakat', $_GET['tahun']);
        $data_mustahik = $this->db->get('tbl_rekap_mustahik')->result_array();
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <title>DataZakat'.$_GET['tahun'] .'</title>
        </head>
        <body>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Tahun Periode</th>
                </tr>';

                $i = 1;
                foreach($data_mustahik as $row){
                    $html .= '<tr>
                        <td>'. $i++ .'</td>
                        <td>'. $row['nama_mustahik'] .'</td>
                        <td>'. $row['alamat_mustahik'] .'</td>
                        <td>'. $row['ket_mustahik'] .'</td>
                        <td>'. $row['status_mustahik'] .'</td>
                        <td>'. $row['tahun_zakat'] .'</td>
                    </tr>';
                }
        $html .= '</table>
        </body>
        </html>';
        
        $time = 'Dokumen di cetak pada tanggal : '. date('d F Y H:i:s');
    
       $mpdf->WriteHTML($html);
       $mpdf->WriteHTML($time);
       $mpdf->Output();
    }
    
    
}