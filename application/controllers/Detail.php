<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
	private function first_coordinate_pair($coordinates)
	{
		if (!is_array($coordinates) || $coordinates === array()) {
			return null;
		}

		if (count($coordinates) >= 2 && is_numeric($coordinates[0]) && is_numeric($coordinates[1])) {
			return array((float) $coordinates[0], (float) $coordinates[1]);
		}

		foreach ($coordinates as $nested) {
			$pair = $this->first_coordinate_pair($nested);
			if ($pair !== null) {
				return $pair;
			}
		}

		return null;
	}

	private function feature_properties($mapData)
	{
		if (empty($mapData[1]) || empty($mapData[1][0])) {
			show_404();
			exit;
		}
		$properties = (array) $mapData[1][0];
		unset($properties['geojson']);
		return $properties;
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Buka_peta');
		$this->load->helper(array('url', 'download'));
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$dataisi['Judul'] = '';
		$data['isi'] = $this->load->view('index.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function drainase($id){
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$a,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$be = $this->Buka_peta->peta('drainase', $id, 'id', 'MultiLineString');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$dataisi['bendung1'] = $this->feature_properties($be);
		$data['isi'] = $this->load->view('detail_drainase.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function pembuang($id){
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$a,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$be = $this->Buka_peta->peta('saluran_pembuang', $id, 'id', 'MultiLineString');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$dataisi['bendung1'] = $this->feature_properties($be);
		$data['isi'] = $this->load->view('detail_pembuang.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function p_pembuang($id){
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$a,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$be = $this->Buka_peta->peta('pelengkap_pembuang', $id, 'id', 'Point');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$dataisi['bendung1'] = $this->feature_properties($be);
		$data['isi'] = $this->load->view('detail_b_pembuang.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function air_baku($id){
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$b,$a,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$be = $this->Buka_peta->peta('sumur', $id, 'id', 'Point');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$dataisi['bendung1'] = $this->feature_properties($be);
		$data['isi'] = $this->load->view('detail_air_baku.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function p_irigasi($id){
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$a,$b,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$be = $this->Buka_peta->peta('p_irigasi', $id, 'id', 'Point');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$dataisi['bendung1'] = $this->feature_properties($be);
		$data['isi'] = $this->load->view('detail_p_irigasi.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function sawah($id){
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$a,$b,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$be = $this->Buka_peta->peta('sawah', $id, 'id', 'MultiPolygon');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$dataisi['bendung1'] = $this->feature_properties($be);
		$data['isi'] = $this->load->view('detail_sawah.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function irigasi($id){
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$a,$b,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$ir = $this->Buka_peta->peta('irigasi', $id, 'id', 'MultiLineString');
		$iri = $ir[0];
		$dataisi['irigasi'] = $iri;
		$dataisi['irigasi1'] = $this->feature_properties($ir);
		$dataisi['irigasi2'] = $ir[1];
		$be = $this->Buka_peta->peta('bendung', $ir[1][0]->id_di, 'id_di', 'Point');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$kondisi = $this->Buka_peta->peta('kondisi',  $ir[1][0]->id, 'Id_Saluran', 'MultiLineString');
		$dataisi['kondisi'] = $kondisi[0];
		$seratus = $kondisi[1];
		$array_koor = array();
		if (is_iterable($seratus)) {
			foreach ($seratus as $j) {
				$koor = json_decode($j->geojson, TRUE);
				$pair = $this->first_coordinate_pair($koor);
				if ($pair !== null) {
					$array_koor[] = json_encode($pair[1]) . ',' . json_encode($pair[0]);
				}
			}
		}
		$p_irigasi= $this->Buka_peta->peta('p_irigasi', $ir[1][0]->id_di, 'id_di', 'Point');
		$dataisi['p_irigasi'] = $p_irigasi[0];
		$dataisi['array_koor'] = $array_koor;
		$data['isi'] = $this->load->view('detail_irigasi.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
		
	}
	public function bendung($id)
	{
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$a,$b,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$be = $this->Buka_peta->peta('bendung', $id, 'id', 'Point');
		$ben = $be[0];
		$dataisi['bendung'] = $ben;
		$dataisi['bendung1'] = $this->feature_properties($be);
		$id_di = $dataisi['bendung1']['id_di'];
		$irigasi = $this->Buka_peta->peta('irigasi',  $id_di, 'id_di', 'MultiLineString');
		$dataisi['irigasi'] = $irigasi[0];
		$dataisi['irigasi1'] = $irigasi[1];
		
		$kondisi = $this->Buka_peta->peta('kondisi',  $id_di, 'NO_DI', 'MultiLineString');
		
		$dataisi['kondisi'] = $kondisi[0];
		$p_irigasi= $this->Buka_peta->peta('p_irigasi', $id_di, 'id_di', 'Point');
		$dataisi['p_irigasi'] = $this->Buka_peta->peta3('p_irigasi', $id_di, 'id_di', 'Point');
		
		$dataisi['p_irigasi1'] = $p_irigasi[1];
		$sawah = $this->Buka_peta->peta('sawah', $id_di, 'id_di','MultiPolygon');
		$dataisi['sawah'] = $sawah[0];
		$dataisi['sawah1'] = $sawah[1];
		$seratus = $kondisi[1];
		$array_koor = array();
		if (is_iterable($seratus)) {
			foreach ($seratus as $j) {
				$koor = json_decode($j->geojson, TRUE);
				$pair = $this->first_coordinate_pair($koor);
				if ($pair !== null) {
					$array_koor[] = json_encode($pair[1]) . ',' . json_encode($pair[0]);
				}
			}
		}
	
		$dataisi['array_koor'] = $array_koor;
		$dataisi['Judul'] = '';
		$data['isi'] = $this->load->view('detail_bendung.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	
}
