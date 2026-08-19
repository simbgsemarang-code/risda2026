<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$dataisi['Judul'] = '';
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$a,$b,$b,$b,$b,$b,$b,$b,$b];
		$data['isi'] = $this->load->view('index.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function ttd()
	{
		
		$this->load->view('ttd');
	}
	public function simpan_ttd()
	{
		
	$nama      = $this->input->post('nama');
    $pekerjaan = $this->input->post('pekerjaan');
    $tanggal   = $this->input->post('tanggal');
    $keperluan = $this->input->post('keperluan');
    
    // Tangkap data gambar
    $img_data  = $this->input->post('signature_data');
    $img_data  = str_replace('data:image/png;base64,', '', $img_data);
    $img_data  = str_replace(' ', '+', $img_data);
    $img_binary = base64_decode($img_data);

    $file_name = 'sig_' . time() . '.png';
    $file_path = './uploads/' . $file_name;

    if (file_put_contents($file_path, $img_binary)) {
        // Data untuk disimpan ke database
        $data_simpan = [
            'nama'      => $nama,
            'pekerjaan' => $pekerjaan,
            'tanggal'   => $tanggal,
            'keperluan' => $keperluan,
            'signature' => $file_name
        ];

        $this->Buka_peta->insert_data('tb_absensi', $data_simpan);
        
        // Set flashdata atau redirect
        $this->session->set_flashdata('success', 'Data berhasil dikirim!');
        redirect('Welcome/ttd');
    }
	}
	public function drainase() {
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$a,$b,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$desa =  $this->Buka_peta->peta('desa_drainase', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$dataisi['desa'] = $desa[0];
		$drainase =  $this->Buka_peta->peta('drainase', null, null, 'MultiLineString');
		$dataisi['drainase'] = $drainase[0];
		$dataisi['drainase1'] = $this->Buka_peta->frd('drainase',null,null);
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$dataisi['temp_view'] = 'desa';
		$this->db->limit(20, 0);
		$query = $this->db->get('desa_drainase');
		if ($query->num_rows() > 0) {
            $di = $query->result();
        } else {
            $di =NULL;
        }
		$dataisi['temp_data'] = $di;
		$dataisi['Judul'] = '';
		$dataisi['jenis'] = 'drainase';
		$jml_drainase = $this->Buka_peta->jml('drainase',null,null);
	
		$dataisi['jml'] =[$jml_drainase];
		$data['isi'] = $this->load->view('drainase.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
		
	}
	public function pembuang() {
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$a,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$desa =  $this->Buka_peta->peta('desa', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$dataisi['desa'] = $desa[0];
		$pembuang =  $this->Buka_peta->peta('saluran_pembuang', null, null, 'MultiLineString');
		$dataisi['pembuang'] = $pembuang[0];
		$dataisi['pembuang1'] = $this->Buka_peta->frd('saluran_pembuang',null,null);
		$p_irigasi = $this->Buka_peta->peta('pelengkap_pembuang', null, null, 'Point');
		$dataisi['p_irigasi'] = $p_irigasi[0];
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$dataisi['temp_view'] = 'desa';
		$this->db->limit(13, 0);
		$query = $this->db->get('desa');
		if ($query->num_rows() > 0) {
            $di = $query->result();
        } else {
            $di =NULL;
        }
		$dataisi['temp_data'] = $di;
		$dataisi['Judul'] = '';
		$dataisi['jenis'] = 'pembuang';
		$jml_pembuang = $this->Buka_peta->jml('saluran_pembuang',null,null);
		$jml_pelengkap = $this->Buka_peta->jml('pelengkap_pembuang',null,null);
		$dataisi['jml'] =[$jml_pembuang,$jml_pelengkap];
		$data['isi'] = $this->load->view('pembuang.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
		
	}
	public function air_baku() {
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$b,$a,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$desa =  $this->Buka_peta->peta('desa', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$dataisi['desa'] = $desa[0];
		
		$p_irigasi = $this->Buka_peta->peta('sumur', null, null, 'Point');
		$dataisi['p_irigasi'] = $p_irigasi[0];
		$dataisi['air_baku1'] = $this->Buka_peta->frd('sumur',null,null);
		$uptd = $this->Buka_peta->peta('uptd', null, null, 'MultiPolygon');
		$dataisi['uptd'] = $uptd[0];
		$dataisi['temp_view'] = 'desa';
		$this->db->limit(13, 0);
		$query = $this->db->get('desa');
		if ($query->num_rows() > 0) {
            $di = $query->result();
        } else {
            $di =NULL;
        }
		$dataisi['temp_data'] = $di;
		$dataisi['Judul'] = '';
		$dataisi['jenis'] = 'pembuang';
		$jml_sumur = $this->Buka_peta->jml('sumur',null,null);
	
		$dataisi['jml'] =[$jml_sumur];
		$data['isi'] = $this->load->view('air_baku.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
		
	}
	public function di()
	{
		ini_set('memory_limit', '8192M');
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$a,$b,$b,$b,$b,$b,$b,$b];
		$kecamatan =  $this->Buka_peta->peta('kecamatan', null, null, 'MultiPolygon');
		$dataisi['kecamatan'] = $kecamatan[0];
		$dataisi['desa'] = '';
		$dataisi['uptd'] = '';
		$bendung = $this->Buka_peta->peta('bendung', null, null, 'Point');
		$dataisi['bendung'] = $bendung[0];
		$dataisi['bendung1'] = $bendung[1];
		$dataisi['irigasi'] = '';
		$dataisi['p_irigasi'] = '';
		$dataisi['sawah'] = '';
		$dataisi['temp_view'] = 'pencari';
		$this->db->select('id_di, NAMA_DI')->distinct()->order_by('NAMA_DI', 'ASC')->limit(13);
		$query = $this->db->get('bendung');
		if ($query->num_rows() > 0) {
            $di = $query->result();
        } else {
            $di =NULL;
        }
		$dataisi['temp_data'] = $di;
		$dataisi['Judul'] = '';
		
		$jml_bendung = $this->Buka_peta->jml('bendung',null,null);
		$jml_irigasi = $this->Buka_peta->jml('irigasi',null,null);
		$jml_pelengkap = $this->Buka_peta->jml('p_irigasi',null,null);
		$jml_sawah = $this->Buka_peta->jml('sawah',null,null);
		$dataisi['jml'] =[$jml_bendung,$jml_irigasi,$jml_pelengkap,$jml_sawah];
		$data['isi'] = $this->load->view('di.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function digital()
	{
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$b,$b,$a,$b,$b,$b];
		$dataisi['Judul'] = '';

		// Dropdown hanya membutuhkan kolom teks. Mengambil geojson di sini membuat
		// halaman awal puluhan MB dan memaksa semua layer digambar sekaligus.
		$dataisi['kecamatan1'] = $this->db->select('id, KECAMATAN')->order_by('KECAMATAN', 'ASC')->get('kecamatan')->result();
		$dataisi['uptd1'] = $this->db->select('id, uptd')->order_by('uptd', 'ASC')->get('uptd')->result();
		$dataisi['bendung1'] = $this->db->select('id_di, NAMA_DI')->distinct()->order_by('NAMA_DI', 'ASC')->get('bendung')->result();
		$dataisi['drainase1'] = $this->db->select('id, NAMAOBJ')->order_by('NAMAOBJ', 'ASC')->get('drainase')->result();
		$dataisi['pembuang1'] = $this->db->select('id, nama_saluran')->order_by('nama_saluran', 'ASC')->get('saluran_pembuang')->result();
		$dataisi['pelengkap'] = $this->db->select('id, NAME')->order_by('NAME', 'ASC')->get('pelengkap_pembuang')->result();
		$dataisi['airbaku1'] = $this->db->select('id, SumberDana')->order_by('SumberDana', 'ASC')->get('sumur')->result();
		$data['isi'] = $this->load->view('digital.php', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}
	public function cari($val) {
		$val = trim(rawurldecode((string) $val));
		$this->db->select('id_di, NAMA_DI')->distinct()->order_by('NAMA_DI', 'ASC')->limit(20);
		if ($val !== '' && $val !== 'semua') {
			// Match words anywhere, e.g. "kebogoran" also finds "DI Kebogoran".
			$this->db->like('NAMA_DI', $val, 'both');
		}
		$query = $this->db->get('bendung');
		$data['temp_data'] = $query->result();
		$this->output->set_header('Cache-Control: private, max-age=30');
		$this->load->view('pencari.php', $data);
	}

	public function layer_di($name = '')
	{
		$layers = array(
			'kecamatan' => array('kecamatan', 'MultiPolygon'),
			'desa' => array('desa', 'MultiPolygon'),
			'uptd' => array('uptd', 'MultiPolygon'),
			'bendung' => array('bendung', 'Point'),
			'irigasi' => array('irigasi', 'MultiLineString'),
			'p_irigasi' => array('p_irigasi', 'Point'),
			'sawah' => array('sawah', 'MultiPolygon'),
			'drainase' => array('drainase', 'MultiLineString'),
			'saluran_pembuang' => array('saluran_pembuang', 'MultiLineString'),
			'pelengkap_pembuang' => array('pelengkap_pembuang', 'Point'),
			'sumur' => array('sumur', 'Point'),
		);
		if (!isset($layers[$name])) show_404();

		$definition = $layers[$name];
		$data = $this->Buka_peta->peta($definition[0], null, null, $definition[1]);
		$this->output
			->set_content_type('application/json')
			->set_header('Cache-Control: public, max-age=300')
			->set_output('[' . $data[0] . ']');
	}
	public function cari_drai($val,$jenis) {
		if ($jenis == 'drainase') {
			$tabel = 'desa_drainase';
		}elseif($jenis=='pembuang') {
			$tabel = 'desa';
		}
		if ($val != 'semua') {
			$this->db->like('DESA', $val);
		}
        $query = $this->db->get($tabel);
		if ($query->num_rows() > 0) {
            $data['temp_data'] = $query->result();
			$this->load->view('desa.php',$data);
        }
    
	}
	public function cari_di($val)
	{
		$data = $this->Buka_peta->peta('bendung', $val, 'id_di', 'Point');
		$this->output
			->set_content_type('application/json')
			->set_header('Cache-Control: private, max-age=120')
			->set_output('[' . $data[0] . ']');
	}

	public function cari_desa($val='',$jenis='')
	{
		if ($jenis == 'drainase') {
			$tabel = 'desa_drainase';
		}elseif($jenis=='pembuang') {
			$tabel = 'desa';
		}
		$kec = $this->Buka_peta->frd($tabel, $val, 'id');
		$o = array();
		$tipe = 'MultiPolygon';
		foreach ($kec as $h) {
			$map_nya = array();
			foreach ($h as $key => $val) {
				if ($key != 'geojson') {
					$map = array($key => $val);
					$map_nya = array_merge($map_nya, $map);
				}
			}

			$geom = array("type" => $tipe, "coordinates" => json_decode($h->geojson));
			$has  = array("type" => "Feature", "properties" => $map_nya, "geometry" => $geom);
			array_push($o, $has);
		}

		echo json_encode($o);
	}
	public function cari_desa1($val)
	{
		$desa = $this->Buka_peta->frd('desa',$val,'id_kecamatan');
		$des = '';
		if ($desa != null) {
			foreach($desa as $d) {
				$dd = "<option value='".$d->id."'>".$d->DESA."</option>";
				$des = $des.$dd;
			}
		}
		
		
		echo $des;
	}
	public function cari_kemantren1($val)
	{
		$desa = $this->Buka_peta->frd('kemantren',$val,'uptd');
		$des = '';
		if ($desa != null) {
			foreach($desa as $d) {
				$dd = "<option value='".$d->id."'>".$d->kemantren."</option>";
				$des = $des.$dd;
			}
		}
		
		
		echo $des;
	}
	public function cari_di_kemantren($val){
		$desa = $this->Buka_peta->frd('bendung',$val,'id_kemantren');
		$des = '';
		if ($desa != null) {
			foreach($desa as $d) {
				$dd = "<option value='".$d->id_di."'>".$d->NAMA_DI ."</option>";
				$des = $des.$dd;
			}
		}
		$des = $des."<option value='SEMAU'>REFRESH</option>";
		echo $des;
	}
	public function cari_di_desa($val){
		$desa = $this->Buka_peta->frd('bendung',$val,'id_desa');
		$des = '';
		if ($desa != null) {
			foreach($desa as $d) {
				$dd = "<option value='".$d->id_di."'>".$d->NAMA_DI ."</option>";
				$des = $des.$dd;
			}
		}
		$des = $des."<option value='SEMAU'>REFRESH</option>";
		echo $des;
	}
	public function cari_irigasi($val){
		$desa = $this->Buka_peta->frd('irigasi',$val,'id_di');
		$des = '';
		if ($desa != null) {
			foreach($desa as $d) {
				$dd = "<option value='".$d->id."'>".$d->NAMA."</option>";
				$des = $des.$dd;
			}
		}
		echo $des;
	}
	public function cari_pirigasi($val){
		$desa = $this->Buka_peta->frd('p_irigasi',$val,'id_di');
		$des = '';
		if ($desa != null) {
			foreach($desa as $d) {
				$dd = "<option value='".$d->id."'>".$d->NAMA."</option>";
				$des = $des.$dd;
			}
		}
		echo $des;
	}
	public function cari_iri($val,$tabel,$jns)
	{
		$allowed = array(
			'irigasi' => 'MultiLineString',
			'saluran_pembuang' => 'MultiLineString',
			'drainase' => 'MultiLineString',
			'p_irigasi' => 'Point',
		);
		if (!isset($allowed[$tabel])) {
			show_error('Layer tidak valid.', 400);
			return;
		}

		$data = $this->Buka_peta->peta($tabel, $val, 'id', $allowed[$tabel]);
		$this->output
			->set_content_type('application/json')
			->set_header('Cache-Control: private, max-age=120')
			->set_output('[' . $data[0] . ']');
	}
	public function configur()
	{
		set_time_limit(300);
		$table = 'kondisi2';
		$file = $table . '.geojson';
		//$table = 'drainase';
		$filename = base_url() . 'assets/' . $file;
		$data = file_get_contents($filename); //data read from json file
		$json1 = json_decode($data, TRUE);
		//echo json_encode($json1['features']);
		$this->konversi($json1, $table);
	}
	public function konversi($json1, $table)
	{

		$f = $json1['features'][0]['properties'];
		$d_sql = "";
		$arr = array();
		foreach ($f as $key => $val) {
			if ($key != 'Id' || $key != 'ID') {
				$d_sql = $d_sql . "," . $key . " VARCHAR(255) NULL";
			}
			$arr1 = array($key);
			$arr = array_merge($arr, $arr1);
		}
		$this->buat_tabel($d_sql, $json1, $table);
	}
	public function buat_tabel($d_sql, $json1, $table)
	{
		$sql = "SELECT count(*) FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'sengketa') AND (TABLE_NAME = '" . $table . "')";
		$this->db->query($sql);
		$query = $this->db->query($sql);
		$result = $query->result();
		$hasil = new stdClass();
		$hasil = $result[0];
		$count = $hasil->{'count(*)'};

		if ($count == 0) {

			//$sql = "CREATE TABLE " . $table . " (
			//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY" . $d_sql . ", Koordinat LONGTEXT NULL,////Kecamatan VARCHAR(255) NULL)";
			$sql = "CREATE TABLE " . $table . " (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY" . $d_sql . ", Koordinat LONGTEXT NULL)";
			$this->db->query($sql);
		}
		$this->impor($json1, $table);
	}

	public function impor($json1, $table)
	{
		set_time_limit(1500);
		foreach ($json1['features'] as $json) {
			$va = $json['properties'];
			$vg = array('Koordinat' => json_encode($json['geometry']['coordinates']));
			//$kc =  $json['properties']['KECAMATAN'];
			//if ($kc == "TUGU") {
			$arr = array();
			foreach ($va as $k => $v) {
				$arr1 = array($k => $v);
				$arr = array_merge($arr, $arr1);
			}
			$arr = array_merge($arr, $vg);
			$this->Buka_peta->insert_data($table, $arr);

			//}

		}
		echo "done";
	}

	public function buat_json()
	{
		
		$peta ='rs';
		$myJson1 = new stdClass();
		$map = $this->Buka_peta->frd('irigasi',null,null,null,null);
		$f = [];
		
		
		foreach ($map as $p) {
			$koor =json_decode($p->geojson, TRUE);;
			$isi_peta = array();
			foreach($p as $key=>$val) {
				if ($key != 'geojson') {
					$p = array($key=>$val) ;
					$isi_peta=array_merge($isi_peta,$p);
					echo $key.'<br>';
				}

			}
			$geo = array("type" => "MultiLineString", "coordinates" => $koor);
			$isi = array("type" => "Feature", "properties" => $isi_peta, "geometry" => $geo);
			$myJson1->type = "Feature";

			array_push($f, $isi);

		}
		$nama_file = $peta ;
		$filename = $_SERVER['DOCUMENT_ROOT'] . '/assets/' . $nama_file . '.geojson';
		$myJson = new stdClass();
		$crs = '{ "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } }';
		//$f = [json_decode($crs)];

		$myJson->type = "FeatureCollection";
		$myJson->name = $peta;
		$myJson->crs = json_decode($crs);
		$myJson->features = $f;

		$myJSONvar = json_encode($myJson);

		//echo $myJSONvar;

		file_put_contents($filename, $myJSONvar);
		
	}
	public function hm($id) {

		$data['hm'] = $this->Buka_peta->frd('kondisi',$id,'id');
		$this->load->view('hm.php',$data);
	}

	public function ubah_json() {
		$tabel = 'saluran_pembuang';
		$data = $this->Buka_peta->frd($tabel,null,null);
		foreach ($data as $dt) {
			$id = $dt->id;
			$json = $dt->geojson;
			$jml = strlen($json);
			$jml = $jml-1;
			$json = substr($json,0,$jml);
			$json = json_decode($json,TRUE);
			$coor = $json['geometry']['coordinates'];
			$arg = array('table_name'=>$tabel,'field'=>'id', 'val'=>$id);
			$args = array('geo'=>json_encode($coor));
			$this->Buka_peta->edit_record($arg,$args);
			echo $id.' '.json_encode($coor).'</br>';
		}
		
	}
	public function popstat($jenis,$id) {
		if ($jenis == 'si') {
			$jns = 'KEMANTREN';
			$tabel = 'irigasi';
		}elseif($jenis == 'sp') {
			$jns  = 'Kemantren';
			$tabel = 'saluran_pembuang';
		}elseif($jenis == 'bd'){
			$jns = 'KEMANTREN';
			$tabel = 'bendung';
		}elseif($jenis == 'bi'){
			$jns = 'KEMANTREN';
			$tabel = 'p_irigasi';
		}elseif($jenis == 'bp'){
			$jns = 'KEMANTREN';
			$tabel = 'pelengkap_pembuang';
		}elseif($jenis == 'ab'){
			$jns = 'KEMANTREN';
			$tabel = 'sumur';
		}
	    $data['jns']  = $jns;
		$data['tabel'] = $tabel;
		$data['data'] = $this->Buka_peta->frd('kemantren',$id,'uptd');
		$this->load->view('sta.php',$data);
	}

	public function popstat1($jenis,$id) {
		if ($jenis == 'si') {
			$jns = 'KEMANTREN';
			$tabel = 'irigasi';
			$pan = 'PANJANG';
			
		}elseif($jenis == 'sp') {
			$jns  = 'Kemantren';
			$tabel = 'saluran_pembuang';
			$pan = 'PANJANG';
		}else{
			
			$jns = 'Drainase Perkotaan';
		}
	    $data['jns']  = $jns;
		$data['tabel'] = $tabel;
		$data['pan'] = $pan;
		$data['jenis'] = $jenis;
		$data['data'] = $this->Buka_peta->frd('kemantren',$id,'uptd');
		$this->load->view('sta1.php',$data);
	}
	public function popstat2($jenis,$id) {
		if ($jenis == 'si') {
			$jns = 'Desa';
			$tabel = 'irigasi';
		}elseif($jenis == 'sp') {
			$jns  = 'Desa';
			$tabel = 'saluran_pembuang';
		}elseif($jenis == 'bd'){
			$jns = 'DESA';
			$tabel = 'bendung';
		}elseif($jenis == 'bi'){
			$jns = 'Desa';
			$tabel = 'p_irigasi';
		}elseif($jenis == 'bp'){
			$jns = 'DESA';
			$tabel = 'pelengkap_pembuang';
		}elseif($jenis == 'ab'){
			$jns = 'Desa';
			$tabel = 'sumur';
		}elseif($jenis == 'd'){
			$jns = 'DESA';
			$tabel = 'drainase';
		}
	    $data['jns']  = $jns;
		$data['tabel'] = $tabel;
		$data['data'] = $this->Buka_peta->frd('desa',$id,'id_kecamatan');
		$this->load->view('sta2.php',$data);
	}
	public function popstat3($jenis,$id) {
		if ($jenis == 'si') {
			$jns = 'Desa';
			$tabel = 'irigasi';
			$pan = 'PANJANG';
			
		}elseif($jenis == 'sp') {
			$jns  = 'Desa';
			$tabel = 'saluran_pembuang';
			$pan = 'PANJANG';
		}else{
			$tabel = 'drainase';
			$pan = 'Panjang__m';
			$jns = 'DESA';
		}
	    $data['jns']  = $jns;
		$data['tabel'] = $tabel;
		$data['pan'] = $pan;
		$data['jenis'] = $jenis;
		$data['data'] = $this->Buka_peta->frd('desa',$id,'id_kecamatan');
		$this->load->view('sta3.php',$data);
	}
	public function ubah_json1() {
		$tabel = 'sumur';
		$data = $this->Buka_peta->frd($tabel,null,null);
		foreach ($data as $dt) {
			$id = $dt->id;
			$json = $dt->Koordinat;
		
			$coor ="[".$json."]";
			$arg = array('table_name'=>$tabel,'field'=>'id', 'val'=>$id);
			$args = array('geo'=>$coor);
			$this->Buka_peta->edit_record($arg,$args);
			echo $id.' '.json_encode($coor).'</br>';
		}
		
	}
	public function cari_sta($uptd,$ajax) {
		if ($uptd == 'all') {
			$uptd = null;
		}
		$jml_baiksekali_irigasi = $this->Buka_peta->statistik($uptd,'Baik Sekali','KONDISI','irigasi');
		$jml_baik_irigasi = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','irigasi');
		$jml_sedang_irigasi = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','irigasi');
		$jml_buruk_irigasi = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','irigasi');
		$jml_belum_irigasi = $this->Buka_peta->statistik($uptd,'Belum ada data','KONDISI','irigasi');
		$jml_baik_irigasi = $jml_baik_irigasi + $jml_belum_irigasi;
		$jml_irigasi = array('jumlah_baik_sekali' => $jml_baiksekali_irigasi,
		'jumlah_baik' => $jml_baik_irigasi,
		'jumlah_sedang' => $jml_sedang_irigasi,
		'jumlah_buruk' =>$jml_buruk_irigasi);

		$jml_baik_pembuang = $this->Buka_peta->statistik($uptd,'Baik','Kondisi','saluran_pembuang');
		$jml_sedang_pembuang = $this->Buka_peta->statistik($uptd,'Sedang','Kondisi','saluran_pembuang');
		$jml_buruk_pembuang = $this->Buka_peta->statistik($uptd,'Buruk','Kondisi','saluran_pembuang');
		$jml_pembuang = array('jumlah_baik' => $jml_baik_pembuang,
		'jumlah_sedang' => $jml_sedang_pembuang,
		'jumlah_buruk' =>$jml_buruk_pembuang);

		$jml_baik_drainase = $this->Buka_peta->statistik($uptd,'Baik','Kondisi','drainase');
		$jml_sedang_drainase = $this->Buka_peta->statistik($uptd,'Sedang','Kondisi','drainase');
		$jml_buruk_drainase = $this->Buka_peta->statistik($uptd,'Buruk','Kondisi','drainase');
		
		$jml_drainase = array('jumlah_baik' => $jml_baik_drainase,
		'jumlah_sedang' => $jml_sedang_drainase,
		'jumlah_buruk' =>$jml_buruk_drainase);

		$pan_baiksekali_irigasi = $this->Buka_peta->statistik_pan($uptd,'Baik Sekali','KONDISI','irigasi','PANJANG');
		$pan_baik_irigasi = $this->Buka_peta->statistik_pan($uptd,'Baik','KONDISI','irigasi','PANJANG');
		$pan_sedang_irigasi = $this->Buka_peta->statistik_pan($uptd,'Sedang','KONDISI','irigasi','PANJANG');
		$pan_buruk_irigasi = $this->Buka_peta->statistik_pan($uptd,'Buruk','KONDISI','irigasi','PANJANG');

		$pan_irigasi = array('panjang_baik_sekali' => $pan_baiksekali_irigasi[0]->PANJANG,
		'panjang_baik' => $pan_baik_irigasi[0]->PANJANG,
		'panjang_sedang' => $pan_sedang_irigasi[0]->PANJANG,
		'panjang_buruk' => $pan_buruk_irigasi[0]->PANJANG,
		);
	
		$pan_baik_pembuang = $this->Buka_peta->statistik_pan($uptd,'Baik','Kondisi','saluran_pembuang','PANJANG');
		$pan_sedang_pembuang = $this->Buka_peta->statistik_pan($uptd,'Sedang','Kondisi','saluran_pembuang','PANJANG');
		$pan_buruk_pembuang = $this->Buka_peta->statistik_pan($uptd,'Buruk','Kondisi','saluran_pembuang','PANJANG');


		$pan_pembuang = array('panjang_baik' => $pan_baik_pembuang[0]->PANJANG,
		'panjang_sedang' => $pan_sedang_pembuang[0]->PANJANG,
		'panjang_buruk' => $pan_buruk_pembuang[0]->PANJANG,
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
		$pan_drainase = array('panjang_baik' => $pan_baik_drainase[0]->Panjang__m,
		'panjang_sedang' => $dra_sedang,
		'panjang_buruk' => $dra_buruk,
		);

		$jml_baik_bendung = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','bendung');
		$jml_sedang_bendung = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','bendung');
		$jml_buruk_bendung = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','bendung');
		$jml_belum_bendung = $this->Buka_peta->statistik($uptd,'Belum ada data','KONDISI','bendung');
		$jml_baik_bendung = $jml_baik_bendung + $jml_belum_bendung;

		$jml_bendung = array('jumlah_baik' => $jml_baik_bendung,
		'jumlah_sedang' => $jml_sedang_bendung,
		'jumlah_buruk' => $jml_buruk_bendung);

		$jml_baik_pirigasi = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','p_irigasi');
		$jml_sedang_pirigasi = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','p_irigasi');
		$jml_buruk_pirigasi = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','p_irigasi');
		
		$jml_pirigasi = array('jumlah_baik' => $jml_baik_pirigasi,
		'jumlah_sedang' => $jml_sedang_pirigasi,
		'jumlah_buruk' => $jml_buruk_pirigasi);

		$jml_baik_ppembuang = $this->Buka_peta->statistik($uptd,'Baik','KONDISI','pelengkap_pembuang');
		$jml_sedang_ppembuang = $this->Buka_peta->statistik($uptd,'Sedang','KONDISI','pelengkap_pembuang');
		$jml_buruk_ppembuang = $this->Buka_peta->statistik($uptd,'Buruk','KONDISI','pelengkap_pembuang');
		$jml_Batas_Imajiner_ppembuang = $this->Buka_peta->statistik($uptd,'Batas Imajiner','KONDISI','pelengkap_pembuang');
		$jml_Imajiner_ppembuang = $this->Buka_peta->statistik($uptd,'Imajiner','KONDISI','pelengkap_pembuang');
		$jml_Alami_ppembuang = $this->Buka_peta->statistik($uptd,'Alami','KONDISI','pelengkap_pembuang');
		$jml_rusak_berat_ppembuang = $this->Buka_peta->statistik($uptd,'Rusak Berat','KONDISI','pelengkap_pembuang');
		$jml_hilang_ppembuang = $this->Buka_peta->statistik($uptd,'Hilang','KONDISI','pelengkap_pembuang');
		
		$jml_ppembuang = array('jumlah_baik' => $jml_baik_ppembuang,
		'jumlah_sedang' => $jml_sedang_ppembuang,
		'jumlah_buruk' => $jml_buruk_ppembuang,
		'jumlah_batas_imajiner' => $jml_Batas_Imajiner_ppembuang,
		'jumlah_imajiner' => $jml_Imajiner_ppembuang,
		'jumlah_alami' => $jml_Alami_ppembuang,
		'jumlah_rusak_berat' => $jml_rusak_berat_ppembuang,
		'jumlah_hilang' => $jml_hilang_ppembuang,
	);
		$jml_baik_airbaku = $this->Buka_peta->statistik($uptd,'Baik','Kondisi','sumur');
		$jml_sedang_airbaku = $this->Buka_peta->statistik($uptd,'Sedang','Kondisi','sumur');
		$jml_buruk_airbaku = $this->Buka_peta->statistik($uptd,'Buruk','Kondisi','sumur');
		$jml_tidak_operasi = $this->Buka_peta->statistik($uptd,'Tidak Beroperasi','Kondisi','sumur');
		if ($jml_tidak_operasi !=null) {
			$jto = $jml_tidak_operasi;
		}else{
			$jto = 0;
		}
		$jml_airbaku = array('jumlah_baik' => $jml_baik_airbaku,
		'jumlah_sedang' => $jml_sedang_airbaku,
		'jumlah_buruk' => $jml_buruk_airbaku,
		'jumlah_tidak_operasi' => $jto
		);


        $statitik = array('jml_irigasi'=>$jml_irigasi,
		'jml_pembuang'=>$jml_pembuang,
		'jml_drainase'=>$jml_drainase,
		'pan_irigasi' => $pan_irigasi,								
		'pan_pembuang' => $pan_pembuang,
		'pan_drainase' => $pan_drainase,
		'jml_bendung' => $jml_bendung,
		'jml_pirigasi' => $jml_pirigasi,
		'jml_ppembuang' => $jml_ppembuang,
		'jml_airbaku' => $jml_airbaku,
	);
		echo json_encode($statitik);
	}
	public function statistik ($uptd,$ajax) {
		if ($uptd == 'all') {
			$uptd = null;
		}
	
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$dataisi['c'] = [$b,$b,$b,$b,$b,$b,$a,$b,$b];

		
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

		$dataisi['kecamatan'] = $this->Buka_peta->frd('kecamatan', NULL, NULL);
        $dataisi['statistik'] = array('jml irigasi'=>$jml_irigasi,
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

		
		
		$dataisi['temp_view'] = 'statistik_template';
		$dataisi['uptd'] = $this->Buka_peta->frd('uptd', NULL, NULL);
		$data['isi'] = $this->load->view('statistik.php', $dataisi, TRUE);
		if ($ajax != 'ajax') {
			$this->load->view('layout/index', $data);
		}else{
			$this->load->view('statistik_template.php',$data);
		}
		
		
	}
	public function buku_petunjuk()
	{
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b = 'nav-item nav-link';
		$now = time();
		$unlockedAt = (int) $this->session->userdata('buku_petunjuk_unlocked_at');
		$unlocked = $unlockedAt > 0 && ($now - $unlockedAt) < 7200;
		$error = '';

		if ($this->input->method(TRUE) === 'POST' && !$unlocked) {
			$token = (string) $this->input->post('buku_token', TRUE);
			$sessionToken = (string) $this->session->userdata('buku_petunjuk_token');
			$blockedUntil = (int) $this->session->userdata('buku_petunjuk_blocked_until');

			if ($blockedUntil > $now) {
				$error = 'Terlalu banyak percobaan. Silakan tunggu sebentar.';
			} elseif ($sessionToken === '' || !hash_equals($sessionToken, $token)) {
				$error = 'Sesi formulir tidak valid. Silakan muat ulang halaman.';
			} else {
				$password = (string) $this->input->post('password', FALSE);
				$passwordHash = '$2y$10$79nTQaTB2pUeUmXl4uAkDO56srlnUusAFb4R3buGjjqTLVx/d1ZLi';

				if (password_verify($password, $passwordHash)) {
					$this->session->sess_regenerate(TRUE);
					$this->session->set_userdata('buku_petunjuk_unlocked_at', $now);
					$this->session->unset_userdata(array(
						'buku_petunjuk_attempts',
						'buku_petunjuk_blocked_until',
						'buku_petunjuk_token'
					));
					redirect('Welcome/buku_petunjuk');
					return;
				}

				$attempts = (int) $this->session->userdata('buku_petunjuk_attempts') + 1;
				if ($attempts >= 5) {
					$this->session->set_userdata('buku_petunjuk_blocked_until', $now + 60);
					$attempts = 0;
				}
				$this->session->set_userdata('buku_petunjuk_attempts', $attempts);
				$error = 'Password yang dimasukkan salah.';
			}
		}

		if (!$unlocked) {
			$token = bin2hex(random_bytes(32));
			$this->session->set_userdata('buku_petunjuk_token', $token);
		} else {
			$token = '';
		}

		$dataisi['c'] = [$b,$b,$b,$b,$b,$b,$b,$a,$b];
		$dataisi['title'] = 'Buku Petunjuk';
		$dataisi['unlocked'] = $unlocked;
		$dataisi['error'] = $error;
		$dataisi['buku_token'] = $token;
		$data['isi'] = $this->load->view('buku_petunjuk', $dataisi, TRUE);
		$this->load->view('layout/index', $data);
	}

	public function manual_book()
	{
		$unlockedAt = (int) $this->session->userdata('buku_petunjuk_unlocked_at');
		if ($unlockedAt < 1 || (time() - $unlockedAt) >= 7200) {
			$this->session->unset_userdata('buku_petunjuk_unlocked_at');
			redirect('Welcome/buku_petunjuk');
			return;
		}

		$file = APPPATH . 'private/Manual-Book.pdf';
		if (!is_file($file) || !is_readable($file)) {
			show_error('Buku petunjuk tidak tersedia.', 404);
			return;
		}

		while (ob_get_level() > 0) {
			ob_end_clean();
		}
		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename="Manual-Book-RISDA.pdf"');
		header('Content-Length: ' . filesize($file));
		header('Cache-Control: private, no-store, max-age=0');
		header('Pragma: no-cache');
		header('X-Content-Type-Options: nosniff');
		header('X-Frame-Options: SAMEORIGIN');
		readfile($file);
		exit;
	}

	public function login()
	{
		
		$a = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
		$b= 'nav-item nav-link';
		$login_error = $this->session->flashdata('login_error');
		if (!$login_error) {
			$login_error = (string) $this->input->get('al', true);
		}
		$datacontent['alert'] = $login_error;

		$dataisi['c'] = [$b,$b,$b,$b,$b,$b,$b,$b,$a];
		$dataisi['alert'] = $login_error;

		$dataisi['bar'] = ['0', '0', '0', '0', '0', '0', '1'];
		$dataisi['title'] = "Masuk Admin";
		$c = rand(0, 600);
		$dataisi['captcha'] = $this->create_captcha($c);;
		$data['isi'] = $this->load->view('Admin/login2', $dataisi, TRUE);
		$this->load->view('layout/login', $data);
	}
	function create_captcha($c)
	{
		$ruas = $this->Buka_peta->frd('bendung', null, null);
		$rr = [];
		$i = 0;
		foreach ($ruas as $r) {
			$rr[$i] = str_replace(' ', '', $r->NAMA_DI);
			$i++;
		}
		$cap = empty($rr) ? strtoupper(bin2hex(random_bytes(3))) : $rr[array_rand($rr)];
		$this->session->set_userdata('login_captcha', $cap);
		return $cap;
	}
	public function update_kondisi($id, $field)
	{
		$this->require_admin();
		if (!preg_match('/^[A-Za-z][A-Za-z0-9_]{0,63}$/', $field)) {
			show_error('Kolom tidak valid.', 400);
		}
		$val = (string) $this->input->get('val', true);
		$val = str_replace('%20', ' ', $val);
		$data  = array($field => $val);
		$arg = array('table_name' => 'kondisi', 'field' => 'id', 'val' => $id);
		$this->Buka_peta->edit_record($arg, $data);
	}
	public function upload_foto($id = '', $kode = '', $tid = '', $tri = '')
	{
		$this->require_admin();

		$foto1  = $_FILES['foto1']['name'];
		$folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/' . $kode  . '/';
		if (!file_exists($folder)) {
			mkdir("assets/foto/" . $kode, 0755);
		}
		move_uploaded_file($_FILES["foto1"]["tmp_name"], "$folder" . $_FILES["foto1"]["name"]);
		$data  = array('foto' => $foto1, 'folder' => $kode);
		$arg = array('table_name' => 'kondisi', 'field' => 'id', 'val' => $tid);
		$this->Buka_peta->edit_record($arg, $data);

		
		echo $kode;
	}

	private function require_admin()
	{
		$user = $this->session->userdata('user_id');
		if (!is_array($user) || empty($user['id'])) {
			show_error('Akses ditolak.', 403);
		}
	}
}
