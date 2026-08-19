<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
//composer require phpoffice/phpspreadsheet --ignore-platform-reqs
class Index extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Buka_peta');
		$this->load->helper(array('url', 'download'));
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$datacontent['judul'] = 'Dashboard';
		$datacontent['s'] = $this->Buka_peta->side('1');
		
		//$jumlah_jalan = $this->Buka_peta->jumlah('ruas_jalan',null,null);

		$datacontent['s2'] = 1;
		$uptd=null;
	
		$a = 'btn btn-success rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$b,$b,$b,$a,$b];

		
		$dataisi['title'] = "STATISTIK";
        $jml_baiksekali_irigasi = $this->Buka_peta->statistik($uptd,'Baik Sekali','KONDISI','irigasi');
		$jml_baik_irigasi = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','irigasi');
		$jml_sedang_irigasi = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','irigasi');
		$jml_buruk_irigasi = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','irigasi');
		$jml_belum_irigasi = $this->Buka_peta->statistik($uptd,'Belum ada data','KONDISI','irigasi');
		$jml_baik_irigasi = $jml_baik_irigasi + $jml_belum_irigasi;
		$jml_irigasi = array('jumlah baik sekali' => $jml_baiksekali_irigasi,
		'jumlah baik' => $jml_baik_irigasi,
		'jumlah sedang' => $jml_sedang_irigasi,
		'jumlah buruk' =>$jml_buruk_irigasi);

		$jml_baik_pembuang = $this->Buka_peta->statistik($uptd,'Baik','Kondisi','saluran_pembuang');
		$jml_sedang_pembuang = $this->Buka_peta->statistik($uptd,'Sedang','Kondisi','saluran_pembuang');
		$jml_buruk_pembuang = $this->Buka_peta->statistik($uptd,'Buruk','Kondisi','saluran_pembuang');
		$jml_pembuang = array('jumlah baik' => $jml_baik_pembuang,
		'jumlah sedang' => $jml_sedang_pembuang,
		'jumlah buruk' =>$jml_buruk_pembuang);

		$jml_baik_drainase = $this->Buka_peta->statistik($uptd,'Baik','Kondisi','drainase');
		$jml_sedang_drainase = $this->Buka_peta->statistik($uptd,'Sedang','Kondisi','drainase');
		$jml_buruk_drainase = $this->Buka_peta->statistik($uptd,'Buruk','Kondisi','drainase');
		
		$jml_drainase = array('jumlah baik' => $jml_baik_drainase,
		'jumlah sedang' => $jml_sedang_drainase,
		'jumlah buruk' =>$jml_buruk_drainase);

		$pan_baiksekali_irigasi = $this->Buka_peta->statistik_pan($uptd,'Baik Sekali','KONDISI','irigasi','PANJANG');
		$pan_baik_irigasi = $this->Buka_peta->statistik_pan($uptd,'Baik','KONDISI','irigasi','PANJANG');
		$pan_sedang_irigasi = $this->Buka_peta->statistik_pan($uptd,'Sedang','KONDISI','irigasi','PANJANG');
		$pan_buruk_irigasi = $this->Buka_peta->statistik_pan($uptd,'Buruk','KONDISI','irigasi','PANJANG');

		$pan_irigasi = array('panjang baik sekali' => $pan_baiksekali_irigasi[0]->PANJANG,
		'panjang baik' => $pan_baik_irigasi[0]->PANJANG,
		'panjang sedang' => $pan_sedang_irigasi[0]->PANJANG,
		'panjang buruk' => $pan_buruk_irigasi[0]->PANJANG,
		);
	
		$pan_baik_pembuang = $this->Buka_peta->statistik_pan($uptd,'Baik','Kondisi','saluran_pembuang','PANJANG');
		$pan_sedang_pembuang = $this->Buka_peta->statistik_pan($uptd,'Sedang','Kondisi','saluran_pembuang','PANJANG');
		$pan_buruk_pembuang = $this->Buka_peta->statistik_pan($uptd,'Buruk','Kondisi','saluran_pembuang','PANJANG');


		$pan_pembuang = array('panjang baik' => $pan_baik_pembuang[0]->PANJANG,
		'panjang sedang' => $pan_sedang_pembuang[0]->PANJANG,
		'panjang buruk' => $pan_buruk_pembuang[0]->PANJANG,
		);
	
		$pan_baik_drainase = $this->Buka_peta->statistik_pan($uptd,'Baik','Kondisi','drainase','Panjang__m');
		$pan_sedang_drainase = $this->Buka_peta->statistik_pan($uptd,'Sedang','Kondisi','drainase','Panjang__m');
		$pan_buruk_drainase = $this->Buka_peta->statistik_pan($uptd,'Buruk','Kondisi','drainase','Panjang__m');

		if ($pan_sedang_drainase[0]->Panjang__m != null) {
			$dra_sedang = $pan_sedang_drainase[0]->Panjang__m;
		}else{
			$dra_sedang = 0;
		}
		if ($pan_buruk_drainase[0]->Panjang__m != null) {
			$dra_buruk = $pan_buruk_drainase[0]->Panjang__m;
		}else{
			$dra_buruk = 0;
		}
		$pan_drainase = array('panjang baik' => $pan_baik_drainase[0]->Panjang__m,
		'panjang sedang' => $dra_sedang,
		'panjang buruk' => $dra_buruk,
		);

		$jml_baik_bendung = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','bendung');
		$jml_sedang_bendung = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','bendung');
		$jml_buruk_bendung = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','bendung');
		$jml_belum_bendung = $this->Buka_peta->statistik($uptd,'Belum ada data','KONDISI','bendung');
		$jml_baik_bendung = $jml_baik_bendung + $jml_belum_bendung;

		$jml_bendung = array('jumlah baik' => $jml_baik_bendung,
		'jumlah sedang' => $jml_sedang_bendung,
		'jumlah buruk' => $jml_buruk_bendung);

		$jml_baik_pirigasi = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','p_irigasi');
		$jml_sedang_pirigasi = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','p_irigasi');
		$jml_buruk_pirigasi = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','p_irigasi');
		
		$jml_pirigasi = array('jumlah baik' => $jml_baik_pirigasi,
		'jumlah sedang' => $jml_sedang_pirigasi,
		'jumlah buruk' => $jml_buruk_pirigasi);

		$jml_baik_ppembuang = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','pelengkap_pembuang');
		$jml_sedang_ppembuang = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','pelengkap_pembuang');
		$jml_buruk_ppembuang = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','pelengkap_pembuang');
		$jml_Batas_Imajiner_ppembuang = $this->Buka_peta->statistik($uptd,'Batas Imajiner','KONDISI','pelengkap_pembuang');
		$jml_Imajiner_ppembuang = $this->Buka_peta->statistik($uptd,'Imajiner','KONDISI','pelengkap_pembuang');
		$jml_Alami_ppembuang = $this->Buka_peta->statistik($uptd,'Alami','KONDISI','pelengkap_pembuang');
		$jml_rusak_berat_ppembuang = $this->Buka_peta->statistik($uptd,'Rusak Berat','KONDISI','pelengkap_pembuang');
		$jml_hilang_ppembuang = $this->Buka_peta->statistik($uptd,'Hilang','KONDISI','pelengkap_pembuang');
		

		$jml_ppembuang = array('jumlah baik' => $jml_baik_ppembuang,
		'jumlah sedang' => $jml_sedang_ppembuang,
		'jumlah buruk' => $jml_buruk_ppembuang,
		'jumlah batas imajiner' => $jml_Batas_Imajiner_ppembuang,
		'jumlah imajiner' => $jml_Imajiner_ppembuang,
		'jumlah alami' => $jml_Alami_ppembuang,
		'jumlah rusak berat' => $jml_rusak_berat_ppembuang,
		'jumlah hilang' => $jml_hilang_ppembuang,
	);

		$jml_baik_airbaku = $this->Buka_peta->statistik($uptd,'Baik','Kondisi','sumur');
		$jml_sedang_airbaku = $this->Buka_peta->statistik($uptd,'Sedang','Kondisi','sumur');
		$jml_buruk_airbaku = $this->Buka_peta->statistik($uptd,'Buruk','Kondisi','sumur');
		$jml_tidak_operasi = $this->Buka_peta->statistik($uptd,'Tidak Beroperasi','Kondisi','sumur');
		
		$jml_airbaku = array('jumlah baik' => $jml_baik_airbaku,
		'jumlah sedang' => $jml_sedang_airbaku,
		'jumlah buruk' => $jml_buruk_airbaku,
		'jumlah tidak operasi' => $jml_tidak_operasi
		);


        $datacontent['statistik'] = array('jml irigasi'=>$jml_irigasi,
		'jml pembuang'=>$jml_pembuang,
		'jml drainase'=>$jml_drainase,
		'pan irigasi' => $pan_irigasi,								
		'pan pembuang' => $pan_pembuang,
		'pan drainase' => $pan_drainase,
		'jml bendung' => $jml_bendung,
		'jml pirigasi' => $jml_pirigasi,
		'jml ppembuang' => $jml_ppembuang,
		'jml air baku' => $jml_airbaku,
	);
		
		$data['content'] = $this->load->view('Admin/isi', $datacontent, true);
		$this->load->view('Admin/index', $data);
	}
	public function jembatan()
	{
		$datacontent['bahan']  = array(
			"K" => "Kayu",
			"S" => "Pasangan Bata",
			"M" => "Pasangan Batu",
			"G" => "Bronjong dan Sejenisnya",
			"H" => "Pasangan Batu Kosong",
			"D" => "Beton Tak Bertulang",
			"T" => "Beton Bertulang",
			"P" => "Beton Pratekan",
			"B" => "Baja",
			"U" => "Pelat Baja Gelombang",
			"Y" => "Komposit Baja - Beton",
			"J" => "Alumunium",
			"E" => "Neoprene / Karet",
			"F" => "Teflon",
			"V" => "PVC",
			"N" => "Geotextile",
			"O" => "Tanah Biasa/Lempung atau Timbunan",
			"A" => "Aspal",
			"R" => "Kerikil/Pasir",
			"W" => "Macadam",
			"X" => "Bahan Asli",
			"L" => "Lain-Lain",
			"-" => "-",
			"" => "-"
		);

		$datacontent['nilai'] = array(
			"0" => "BAIK",
			"1" => "SEDANG",
			"2" => "RUSAK RINGAN",
			"3" => "RUSAK BERAT",
			"4" => "KRITIS",
			"5" => "RUNTUH",
			"-" => "-",
			"" => "-"
		);
		$user_name = $this->session->userdata('user_id');
		$bidang = $user_name['bidang'];
		if ($bidang == '0') {
			$datacontent['jembatan'] = $this->Buka_peta->jembatan(null, null);
			$datacontent['jalan'] = $this->Buka_peta->peta_jalan(null, null, 'ruas_jalan', 'MultiLineString');
			$datacontent['jembatan1'] = $this->Buka_peta->peta_jalan(null, null, 'jembatan', 'Point');
		} else {
			$datacontent['jalan'] = $this->Buka_peta->peta_jalan($bidang, 'uppu', 'ruas_jalan', 'MultiLineString');
			$datacontent['jembatan1'] = $this->Buka_peta->peta_jalan($bidang, 'upji', 'jembatan', 'Point');
			$datacontent['jembatan'] = $this->Buka_peta->jembatan_upji($bidang);
		}
		$datacontent['kecamatan1'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');

		$datacontent['judul'] = 'Data Jembatan';
		$datacontent['s'] = $this->Buka_peta->side('5');
		$datacontent['tabel'] = $this->Buka_peta->frd('jembatan', null, null);
		$data['content'] = $this->load->view('Admin/jembatan', $datacontent, true);
		$this->load->view('Admin/index', $data);
	}
	public function form_tambah()
	{
		$datacontent['tipe']  = array(
			"B" => "Gorong-Gorong Persegi",
			"Y" => "Gorong-Gorong Pipa",
			"A" => "Gorong-Gorong Pelengkung",
			"T" => "Gantung",
			"C" => "Jembatan Gantungan / Beruji Kabel (Cable Stayed)",
			"G" => "Gelagar",
			"M" => "Gelagar Komposit",
			"O" => "Gelagar Boks",
			"Q" => "Gelagar Tipe U",
			"L" => "Balok Pelengkung",
			"E" => "Pelengkung",
			"D" => "Flat Slab",
			"V" => "Voided Slab",
			"R" => "Rangka",
			"P" => "Pelat",
			"F" => "Ferry",
			"K" => "Lintasan Kereta Api",
			"W" => "Lintasan Basah",
			"U" => "Lain-Lain",
			"-" => "-",
			"" => "-"
		);
		$datacontent['bahan']  = array(
			"K" => "Kayu",
			"S" => "Pasangan Bata",
			"M" => "Pasangan Batu",
			"G" => "Bronjong dan Sejenisnya",
			"H" => "Pasangan Batu Kosong",
			"D" => "Beton Tak Bertulang",
			"T" => "Beton Bertulang",
			"P" => "Beton Pratekan",
			"B" => "Baja",
			"U" => "Pelat Baja Gelombang",
			"Y" => "Komposit Baja - Beton",
			"J" => "Alumunium",
			"E" => "Neoprene / Karet",
			"F" => "Teflon",
			"V" => "PVC",
			"N" => "Geotextile",
			"O" => "Tanah Biasa/Lempung atau Timbunan",
			"A" => "Aspal",
			"R" => "Kerikil/Pasir",
			"W" => "Macadam",
			"X" => "Bahan Asli",
			"L" => "Lain-Lain",
			"-" => "-",
			"" => "-"
		);
		$datacontent['pondasi'] = array(
			"CA" => "Cakar Ayam",
			"LS" => "Langsung",
			"TP" => "Tiang Pancang",
			"PB" => "Tiang Bor",
			"TU" => "Tiang Ulir",
			"SU" => "Sumuran",
			"LL" => "Lain-lain",
			"-" => "-",
			"" => "-"
		);
		$datacontent['nilai'] = array(
			"0" => "BAIK",
			"1" => "SEDANG",
			"2" => "RUSAK RINGAN",
			"3" => "RUSAK BERAT",
			"4" => "KRITIS",
			"5" => "RUNTUH",
			"-" => "-",
			"" => "-"
		);
		$datacontent['s'] = $this->Buka_peta->side('4');
		$datacontent['judul'] = 'Tambah Jembatan';
		$datacontent['kecamatan1'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');

		$datacontent['kecamatan'] = $this->Buka_peta->frd('kecamatan', NULL, NULL);
		$datacontent['ruas'] = $this->Buka_peta->frd('ruas_jalan', NULL, NULL);
		$data['content'] = $this->load->view('Admin/tambah_jembatan', $datacontent, true);
		$this->load->view('Admin/index', $data);
	}
	public function form_upload($id)
	{
		$tri = $_POST['tri'];
		$tahun = $_POST['tahun'];
		$this->db->where(['Triwulan' => $tri, 'Tahun' => $tahun]);
		$query = $this->db->get('triwulan');
		$triwulan = $query->result();
		$datacontent['s'] = $this->Buka_peta->side('5');
		$jembatan = $this->Buka_peta->frd('jembatan', $id, 'id');
		$kode_jembatan = $jembatan[0]->kode;
		$datacontent['judul'] = 'Upload Foto Triwulan ' . $triwulan[0]->Triwulan . ' Tahun ' . $triwulan[0]->Tahun;
		$datacontent['jem'] = $jembatan;
		$datacontent['ruas'] = $this->Buka_peta->frd('ruas_jalan', NULL, NULL);
		$datacontent['foto'] = $this->Buka_peta->frd_kondisi_jembatan($id, $triwulan[0]->id);
		$data['content'] = $this->load->view('Admin/upload_foto', $datacontent, true);
		$this->load->view('Admin/index', $data);
	}
	public function upload_foto()
	{
		$file  = $_FILES['file']['name'];
		$temp_file = $_FILES['file']["tmp_name"];
		$kode = $_POST['kode'];
		$id = $_POST['id'];
		$data = array(
			'id_jem' => $kode,
			"file" => $file,
			"folder" => 'assets/dokumentasi/tambahan',
			"tujuan" => '1'
		);
		$atr = $this->Buka_peta->frd('atribut', $id, 'id');
		if ($atr != null) {
			$args = array('table_name' => 'atribut', 'field' => 'id', 'val' => $id);
			$this->Buka_peta->edit_record($args, $data);
		} else {
			$this->Buka_peta->insert_data('atribut', $data);
		}
		$folder =  $_SERVER['DOCUMENT_ROOT'] . '/sijantan/assets/dokumentasi/tambahan/';
		move_uploaded_file($temp_file, "$folder" . $file);
		echo "Upload Sukses";
	}
	public function upload_pdf()
	{
		$file  = $_FILES['file']['name'];
		$temp_file = $_FILES['file']["tmp_name"];
		$kode = $_POST['kode'];
		$id = $_POST['id'];
		$imageName = $kode . "." . strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$data = array("nama_file" => $imageName, "tujuan1" => "1");
		$args = array('table_name' => 'jembatan', 'field' => 'kode', 'val' => $kode);
		$this->Buka_peta->edit_record($args, $data);
		$folder = $_SERVER['DOCUMENT_ROOT'] . '/assets/pdf/';
		move_uploaded_file($temp_file, "$folder" . $imageName);
		echo "Upload Sukses";
	}
	public function upload_foto_r()
	{
		$file  = $_FILES['file']['name'];
		$temp_file = $_FILES['file']["tmp_name"];
		$kode = $_POST['kode'];
		$data = array("tujuan2" => "1");
		$args = array('table_name' => 'jembatan', 'field' => 'kode', 'val' => $kode);
		$this->Buka_peta->edit_record($args, $data);
		$imageName = $kode . "." . strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$folder = $_SERVER['DOCUMENT_ROOT'] . '/assets/gambar/';
		move_uploaded_file($temp_file, "$folder" . $imageName);
		echo "Upload Sukses";
	}
	public function form_ubah($id)
	{
		$datacontent['tipe']  = array(
			"B" => "Gorong-Gorong Persegi",
			"Y" => "Gorong-Gorong Pipa",
			"A" => "Gorong-Gorong Pelengkung",
			"T" => "Gantung",
			"C" => "Jembatan Gantungan / Beruji Kabel (Cable Stayed)",
			"G" => "Gelagar",
			"M" => "Gelagar Komposit",
			"O" => "Gelagar Boks",
			"Q" => "Gelagar Tipe U",
			"L" => "Balok Pelengkung",
			"E" => "Pelengkung",
			"D" => "Flat Slab",
			"V" => "Voided Slab",
			"R" => "Rangka",
			"P" => "Pelat",
			"F" => "Ferry",
			"K" => "Lintasan Kereta Api",
			"W" => "Lintasan Basah",
			"U" => "Lain-Lain",
			"-" => "-",
			"" => "-"
		);
		$datacontent['bahan']  = array(
			"K" => "Kayu",
			"S" => "Pasangan Bata",
			"M" => "Pasangan Batu",
			"G" => "Bronjong dan Sejenisnya",
			"H" => "Pasangan Batu Kosong",
			"D" => "Beton Tak Bertulang",
			"T" => "Beton Bertulang",
			"P" => "Beton Pratekan",
			"B" => "Baja",
			"U" => "Pelat Baja Gelombang",
			"Y" => "Komposit Baja - Beton",
			"J" => "Alumunium",
			"E" => "Neoprene / Karet",
			"F" => "Teflon",
			"V" => "PVC",
			"N" => "Geotextile",
			"O" => "Tanah Biasa/Lempung atau Timbunan",
			"A" => "Aspal",
			"R" => "Kerikil/Pasir",
			"W" => "Macadam",
			"X" => "Bahan Asli",
			"L" => "Lain-Lain",
			"-" => "-",
			"" => "-"
		);
		$datacontent['pondasi'] = array(
			"CA" => "Cakar Ayam",
			"LS" => "Langsung",
			"TP" => "Tiang Pancang",
			"PB" => "Tiang Bor",
			"TU" => "Tiang Ulir",
			"SU" => "Sumuran",
			"LL" => "Lain-lain",
			"-" => "-",
			"" => "-"
		);
		$datacontent['nilai'] = array(
			"0" => "BAIK",
			"1" => "SEDANG",
			"2" => "RUSAK RINGAN",
			"3" => "RUSAK BERAT",
			"4" => "KRITIS",
			"5" => "RUNTUH",
			"-" => "-",
			"" => "-"
		);
		$datacontent['s'] = $this->Buka_peta->side('4');
		$datacontent['judul'] = 'Ubah Jembatan';
		$datacontent['kecamatan1'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
		$datacontent['kecamatan'] = $this->Buka_peta->frd('kecamatan', NULL, NULL);
		$datacontent['jembatan'] = $this->Buka_peta->frd('jembatan', $id, 'id');
		$datacontent['ruas'] = $this->Buka_peta->frd('ruas_jalan', NULL, NULL);
		$data['content'] = $this->load->view('Admin/ubah_jembatan', $datacontent, true);
		$this->load->view('Admin/index', $data);
	}
	public function cari_jembatan($id)
	{
		$ruas = $this->Buka_peta->frd('jalan', $id, 'id');
		if ($ruas != null) {
			echo $ruas[0]->ruas;
		} else {
			echo "";
		}
	}

	public function simpan()
	{
		$kode = html_escape($this->input->post('kode'));
		$long = html_escape($this->input->post('lng'));
		$lat = html_escape($this->input->post('lat'));
		$nama_jembatan = html_escape($this->input->post('nama'));

		$tipe_jembatan1 = html_escape($this->input->post('tipe_bangunan'));
		$tipe_jembatan2 = html_escape($this->input->post('bahan_bangunan'));
		$tahun_pembangunan = html_escape($this->input->post('tahun'));
		$nilai_kondisi_jembatan = html_escape($this->input->post('nilai'));
		$jumlah_bentang = html_escape($this->input->post('bentang'));
		$panjang = html_escape($this->input->post('panjang'));
		$lebar = html_escape($this->input->post('lebar'));
		$bahan_lantai = html_escape($this->input->post('lantai'));
		$tipe_pilar = html_escape($this->input->post('kepala_tipe'));
		$bahan_pilar = html_escape($this->input->post('kepala_bahan'));
		$tipe_pondasi = html_escape($this->input->post('pondasi'));
		$kecamatan = html_escape($this->input->post('kecamatan'));
		$id_ruas = html_escape($this->input->post('ruas'));
		$koordiat = "[" . $long . "," . $lat . "]";
		$ru = $this->Buka_peta->frd('ruas_jalan', $id_ruas, 'Kd_Inf');
		$nama_ruas = $ru[0]->Nm_Ruas;
		$data  = array(
			"kode" => $kode,
			"Name" => $nama_jembatan,
			"nama_ruas" => $nama_ruas,
			"tipe_jembatan" => $tipe_jembatan1 . ' ' . $tipe_jembatan2,
			"tahun_pembangunan" => $tahun_pembangunan,
			"nilai_kondisi_jembatan" => $nilai_kondisi_jembatan,
			"jumlah_bentang" => $jumlah_bentang,
			"panjang" => $panjang,
			"lebar" => $lebar,
			"tipe_bangunan_atas" => $tipe_jembatan1,
			"bahan_bangunan_atas" => $tipe_jembatan2,
			"bahan_lantai" =>  $bahan_lantai,
			"tipe_pilar" => $tipe_pilar,
			"bahan_pilar" => $bahan_pilar,
			"tipe_pondasi" => $tipe_pondasi,
			"Koordinat" => $koordiat,
			"Kecamatan" => $kecamatan,
			"id_jalan" => $id_ruas,
		);
		$inserdata = $this->Buka_peta->insert_data('jembatan', $data);
		if ($inserdata) {
			$array_msg = array(
				'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Imput',
				'alert' => 'info'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/jembatan');
		} else {
			$array_msg = array(
				'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Imput',
				'alert' => 'danger'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/form_tambah');
		}
	}
	public function edit_simpan($id)
	{
		$kode = html_escape($this->input->post('kode'));
		$long = html_escape($this->input->post('lng'));
		$lat = html_escape($this->input->post('lat'));
		$nama_jembatan = html_escape($this->input->post('nama'));
		$$tipe_jembatan1 = html_escape($this->input->post('tipe_bangunan'));
		$tipe_jembatan2 = html_escape($this->input->post('bahan_bangunan'));
		$tahun_pembangunan = html_escape($this->input->post('tahun'));
		$nilai_kondisi_jembatan = html_escape($this->input->post('nilai'));
		$jumlah_bentang = html_escape($this->input->post('bentang'));
		$panjang = html_escape($this->input->post('panjang'));
		$lebar = html_escape($this->input->post('lebar'));
		$bahan_lantai = html_escape($this->input->post('lantai'));
		$tipe_pilar = html_escape($this->input->post('kepala_tipe'));
		$bahan_pilar = html_escape($this->input->post('kepala_bahan'));
		$tipe_pondasi = html_escape($this->input->post('pondasi'));
		$kecamatan = html_escape($this->input->post('kecamatan'));
		$id_ruas = html_escape($this->input->post('ruas'));
		$koordiat = "[" . $long . "," . $lat . "]";
		$ru = $this->Buka_peta->frd('ruas_jalan', $id_ruas, 'Kd_Inf');
		$nama_ruas = $ru[0]->Nm_Ruas;
		$args = array('table_name' => 'jembatan', 'field' => 'id', 'val' => $id);
		$data  = array(
			"kode" => $kode,
			"Name" => $nama_jembatan,
			"nama_ruas" => $nama_ruas,
			"tipe_jembatan" => $tipe_jembatan1 . ' ' . $tipe_jembatan2,
			"tahun_pembangunan" => $tahun_pembangunan,
			"nilai_kondisi_jembatan" => $nilai_kondisi_jembatan,
			"jumlah_bentang" => $jumlah_bentang,
			"panjang" => $panjang,
			"lebar" => $lebar,
			"tipe_bangunan_atas" => $tipe_jembatan1,
			"bahan_bangunan_atas" => $tipe_jembatan2,
			"bahan_lantai" =>  $bahan_lantai,
			"tipe_pilar" => $tipe_pilar,
			"bahan_pilar" => $bahan_pilar,
			"tipe_pondasi" => $tipe_pondasi,
			"Koordinat" => $koordiat,
			"Kecamatan" => $kecamatan,
			"id_jalan" => $id_ruas,
		);
		$inserdata = $this->Buka_peta->edit_record($args, $data);
		if ($inserdata) {
			$array_msg = array(
				'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
				'alert' => 'info'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/jembatan');
		} else {
			$array_msg = array(
				'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
				'alert' => 'danger'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/form_ubah/' . $id);
		}
	}
	public function sign_out()
	{
		$user_name = $this->session->userdata('user_id');
		$this->session->unset_userdata('user_id');
		redirect(base_url('Welcome/login'));
	}
	public function import_excel()
	{
		$upload_file = $_FILES['upfile']['name'];
		$extension = pathinfo($upload_file, PATHINFO_EXTENSION);
		if ($extension == 'csv') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if ($extension == 'xls') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet = $reader->load($_FILES['upfile']['tmp_name']);
		$sheet_nama_jembatan = $spreadsheet->getSheet(0);
		$nama_jembatan = $sheet_nama_jembatan->getCell('K32')->getValue();
		$nama_ruas = $sheet_nama_jembatan->getCell('J17')->getCalculatedValue();
		$sheet_tahun_pembangunan = $spreadsheet->getSheet(1);
		$tahun_pembangunan = $sheet_tahun_pembangunan->getCell('T15')->getCalculatedValue();


		$sheet_tipe_jembatan = $spreadsheet->getSheet(4);
		$tipe_jembatan1 = $sheet_tipe_jembatan->getCell('J15')->getCalculatedValue();
		$tipe_jembatan2 = $sheet_tipe_jembatan->getCell('K15')->getCalculatedValue();
		$sheet_nilai_kondisi_jembatan = $spreadsheet->getSheet(10);
		$nilai_kondisi_jembatan = $sheet_nilai_kondisi_jembatan->getCell('AV65')->getCalculatedValue();
		$sheet_jumlah_bentang = $spreadsheet->getSheet(4);
		$jumlah_bentang = $sheet_jumlah_bentang->getCell('U10')->getCalculatedValue();
		$panjang = $sheet_jumlah_bentang->getCell('Z10')->getCalculatedValue();
		$lebar = $sheet_jumlah_bentang->getCell('W26')->getCalculatedValue();
		$tipe_bangunan_atas = $sheet_jumlah_bentang->getCell('J15')->getCalculatedValue();
		$bahan_bangunan_atas = $sheet_jumlah_bentang->getCell('K15')->getCalculatedValue();
		$bahan_lantai = $sheet_jumlah_bentang->getCell('Q15')->getCalculatedValue();
		$tipe_pilar = $sheet_jumlah_bentang->getCell('AJ35')->getCalculatedValue();
		$bahan_pilar = $sheet_jumlah_bentang->getCell('AK35')->getCalculatedValue();
		$tipe_pondasi = $sheet_jumlah_bentang->getCell('AH35')->getCalculatedValue();
		$long  = $sheet_tahun_pembangunan->getCell('O12')->getCalculatedValue();
		$lat  = $sheet_tahun_pembangunan->getCell('H12')->getCalculatedValue();
		$koordiat = "[" . $long . "," . $lat . "]";
		$kode = $sheet_nama_jembatan->getCell('K30')->getValue();
		$data  = array(
			"kode" => $kode,
			"Name" => $nama_jembatan,
			"nama_ruas" => $nama_ruas,
			"tipe_jembatan" => $tipe_jembatan1 . ' ' . $tipe_jembatan2,
			"tahun_pembangunan" => $tahun_pembangunan,
			"nilai_kondisi_jembatan" => $nilai_kondisi_jembatan,
			"jumlah_bentang" => $jumlah_bentang,
			"panjang" => $panjang,
			"lebar" => $lebar,
			"tipe_bangunan_atas" => $tipe_jembatan1,
			"bahan_bangunan_atas" => $tipe_jembatan2,
			"bahan_lantai" =>  $bahan_lantai,
			"tipe_pilar" => $tipe_pilar,
			"bahan_pilar" => $bahan_pilar,
			"tipe_pondasi" => $tipe_pondasi,
			"Koordinat" => $koordiat,
			"Kecamatan" => "17",
			"nama_file" => $nama_file,

		);
		$res = $this->Buka_peta->insert_data('jembatan', $data);
		if ($res) {
			$array_msg = array(
				'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Hapus',
				'alert' => 'info'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/jembatan');
		} else {
			$array_msg = array(
				'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Hapus',
				'alert' => 'danger'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/jembatan');
		}
	}
	public function sortir()
	{
		$tipe = array(
			"B" => "Gorong-Gorong Persegi",
			"Y" => "Gorong-Gorong Pipa",
			"A" => "Gorong-Gorong Pelengkung",
			"T" => "Gantung",
			"C" => "Jembatan Gantungan / Beruji Kabel (Cable Stayed)",
			"G" => "Gelagar",
			"M" => "Gelagar Komposit",
			"O" => "Gelagar Boks",
			"Q" => "Gelagar Tipe U",
			"L" => "Balok Pelengkung",
			"E" => "Pelengkung",
			"D" => "Flat Slab",
			"V" => "Voided Slab",
			"R" => "Rangka",
			"P" => "Pelat",
			"F" => "Ferry",
			"K" => "Lintasan Kereta Api",
			"W" => "Lintasan Basah",
			"U" => "Lain-Lain",
			"-" => "-",
			"" => "-"
		);
		$bahan  = array(
			"K" => "Kayu",
			"S" => "Pasangan Bata",
			"M" => "Pasangan Batu",
			"G" => "Bronjong dan Sejenisnya",
			"H" => "Pasangan Batu Kosong",
			"D" => "Beton Tak Bertulang",
			"T" => "Beton Bertulang",
			"P" => "Beton Pratekan",
			"B" => "Baja",
			"U" => "Pelat Baja Gelombang",
			"Y" => "Komposit Baja - Beton",
			"J" => "Alumunium",
			"E" => "Neoprene / Karet",
			"F" => "Teflon",
			"V" => "PVC",
			"N" => "Geotextile",
			"O" => "Tanah Biasa/Lempung atau Timbunan",
			"A" => "Aspal",
			"R" => "Kerikil/Pasir",
			"W" => "Macadam",
			"X" => "Bahan Asli",
			"L" => "Lain-Lain",
			"-" => "-",
			"" => "-"
		);
		$pondasi = array(
			"CA" => "Cakar Ayam",
			"LS" => "Langsung",
			"TP" => "Tiang Pancang",
			"PB" => "Tiang Bor",
			"TU" => "Tiang Ulir",
			"SU" => "Sumuran",
			"LL" => "Lain-lain",
			"-" => "-",
			"" => "-"
		);

		$nilai = array(
			"0" => "BAIK",
			"1" => "SEDANG",
			"2" => "RUSAK RINGAN",
			"3" => "RUSAK BERAT",
			"4" => "KRITIS",
			"5" => "RUNTUH",
			"-" => "-",
			"" => "-"
		);
		$datacontent['bahan'] = $bahan;
		$datacontent['nilai'] = $nilai;
		$datacontent['s'] = $this->Buka_peta->side('4');
		$datacontent['judul'] = 'Data Jembatan';
		$kondisi	= html_escape($this->input->post('kondisi'));
		$wil	= html_escape($this->input->post('wil'));
		$r       = html_escape($this->input->post('r'));
		$o       = html_escape($this->input->post('o'));
		if ($kondisi != "Semua" && $wil != "Semua") {
			$tab = $this->Buka_peta->jembatan_filter($kondisi, $wil);
		} elseif ($kondisi == "Semua" && $wil != "Semua") {
			$tab = $this->Buka_peta->jembatan_filter(null, $wil);
		} elseif ($kondisi != "Semua" && $wil == "Semua") {

			$tab = $this->Buka_peta->jembatan_filter($kondisi, null);
		} else {
			$tab = $this->Buka_peta->jembatan(null, null);
		}
		if ($o == 'o2') {
			$this->excel($tab, $nilai, $bahan, $tipe, $pondasi);
		}

		$datacontent['jembatan'] = $tab;
		$data['content'] = $this->load->view('Admin/jembatan', $datacontent, true);
		$this->load->view('Admin/index', $data);
	}
	public function excel($tabel, $nilai, $bahan, $tipe, $pondasi)
	{
		$inputFileName = 'assets/template_export.xlsx';
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
		$sheet_aktiv = 0;
		$spreadsheet->setActiveSheetIndex($sheet_aktiv);
		$sheet = $spreadsheet->getActiveSheet();
		$sn = 2;
		foreach ($tabel as $t) {
			$sheet->setCellValue('A' . $sn, $sn - 1);
			$sheet->setCellValue('C' . $sn, $t->Name);
			$sheet->setCellValue('B' . $sn, $t->kode);
			$sheet->setCellValue('D' . $sn, $t->nama_ruas);
			$sheet->setCellValue('E' . $sn, $t->tahun_pembangunan);
			$sheet->setCellValue('F' . $sn, $nilai[$t->nilai_kondisi_jembatan]);
			$sheet->setCellValue('G' . $sn, $t->jumlah_bentang);
			$sheet->setCellValue('H' . $sn, $t->panjang);
			$sheet->setCellValue('I' . $sn, $t->lebar);
			if (!in_array($t->tipe_bangunan_atas, $tipe)) {
				$h1 = '-';
			} else {
				$h1 = $tipe[$t->tipe_bangunan_atas];
			}

			$sheet->setCellValue('J' . $sn, $h1);
			if (!in_array($t->bahan_bangunan_atas, $bahan)) {
				$h2 = '-';
			} else {
				$h2 = $bahan[$t->bahan_bangunan_atas];
			}
			$sheet->setCellValue('K' . $sn, $h2);
			if (!in_array($t->bahan_lantai, $bahan)) {
				$h3 = '-';
			} else {
				$h3 = $bahan[$t->bahan_lantai];
			}
			$sheet->setCellValue('L' . $sn, $h3);
			$sheet->setCellValue('M' . $sn, $t->Koordinat);
			$sheet->setCellValue('N' . $sn, $t->KECAMATAN);
			if (!in_array($t->tipe_pilar, $tipe)) {
				$h4 = '-';
			} else {
				$h4 = $tipe[$t->tipe_pilar];
			}
			$sheet->setCellValue('O' . $sn, $h4);
			if (!in_array($t->bahan_pilar, $bahan)) {
				$h5 = '-';
			} else {
				$h5 = $bahan[$t->bahan_pilar];
			}
			$sheet->setCellValue('P' . $sn, $h5);
			if (!in_array($t->tipe_pondasi, $pondasi)) {
				$h5 = '-';
			} else {
				$h5 = $pondasi[$t->tipe_pondasi];
			}
			$sheet->setCellValue('Q' . $sn, $h5);
			$sn++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save('assets/hasil.xlsx');
		force_download('assets/hasil.xlsx', NULL);
		exit();
	}
	public function hapus($id)
	{
		$jem = $this->Buka_peta->frd('jembatan', $id, 'id');
		$res = $this->Buka_peta->delete_record('jembatan', $id, 'id');
		$res = $this->Buka_peta->delete_record('atribut', $jem[0]->kode, 'kode_jembatan');
		if ($res) {
			$array_msg = array(
				'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Hapus',
				'alert' => 'info'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/jembatan');
		} else {
			$array_msg = array(
				'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Hapus',
				'alert' => 'danger'
			);
			$this->session->set_flashdata('status', $array_msg);
			redirect('Admin/Index/jembatan');
		}
	}
}
