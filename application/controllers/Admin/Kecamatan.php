<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Kecamatan extends MY_Controller
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
        $datacontent['judul'] = 'Data Kecamatan';
        $datacontent['s'] = $this->Buka_peta->side('2');
        $datacontent['tabel'] = $this->Buka_peta->frd('kecamatan', null, null);
        $data['content'] = $this->load->view('Admin/kecamatan', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    public function ruas()
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];

        $datacontent['judul'] = 'Bendung';
        $datacontent['s'] = $this->Buka_peta->side('4');
       
        $datacontent['tabel'] = $this->Buka_peta->frd('bendung', null, null);
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan(null, null, 'bendung', 'Point');
        $data['content'] = $this->load->view('Admin/bendung', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
     public function airbaku()
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];

        $datacontent['judul'] = 'Bendung';
        $datacontent['s'] = $this->Buka_peta->side('7');
       
        $datacontent['tabel'] = $this->Buka_peta->frd('sumur', null, null);
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan(null, null, 'sumur', 'Point');
        $data['content'] = $this->load->view('Admin/air_baku', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
     public function p_irigasi()
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];

        $datacontent['judul'] = 'Bangunan Pelengkap Irigasi';
        $datacontent['s'] = $this->Buka_peta->side('8');
       
        $datacontent['tabel'] = $this->Buka_peta->frd('p_irigasi', null, null);
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan(null, null, 'p_irigasi', 'Point');
        $data['content'] = $this->load->view('Admin/p_irigasi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    public function p_pembuang()
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];

        $datacontent['judul'] = 'Bangunan Pelengkap Pembuang';
        $datacontent['s'] = $this->Buka_peta->side('9');
       
        $datacontent['tabel'] = $this->Buka_peta->frd('pelengkap_pembuang', null, null);
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan(null, null, 'pelengkap_pembuang', 'Point');
        $data['content'] = $this->load->view('Admin/p_pembuang', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
      public function drainase()
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];

        $datacontent['judul'] = 'Drainase';
        $datacontent['s'] = $this->Buka_peta->side('5');
       
        $datacontent['tabel'] = $this->Buka_peta->frd('drainase', null, null);
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan(null, null, 'drainase', 'MultiLineString');
        $data['content'] = $this->load->view('Admin/drainase', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }

     public function pembuang()
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];

        $datacontent['judul'] = 'Saluran Pembuang';
        $datacontent['s'] = $this->Buka_peta->side('6');
       
        $datacontent['tabel'] = $this->Buka_peta->frd('saluran_pembuang', null, null);
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan(null, null, 'saluran_pembuang', 'MultiLineString');
        $data['content'] = $this->load->view('Admin/pembuang', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    
    public function irigasi($id)
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];
        $tabel = $this->Buka_peta->frd('irigasi', $id, 'id_di');
        if ($tabel != null ) {
            $datacontent['tabel'] =$tabel;
            $datacontent['judul'] = 'Saluran Irigasi ' .  $tabel[0]->DI;
         }else{
             $datacontent['tabel'] =null;
            $datacontent['judul'] = 'Saluran Irigasi ';
         }
       
        $datacontent['s'] = $this->Buka_peta->side('4');
       
        
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['irigasi'] = $this->Buka_peta->peta_jalan($id, 'id_di', 'irigasi', 'MultiLineString');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan($id, 'id_di', 'bendung', 'Point');
        $data['content'] = $this->load->view('Admin/irigasi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    public function saluran($id)
    {
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];
        $datacontent['s'] = $this->Buka_peta->side('4');
        $saluran = $this->Buka_peta->frd('irigasi',$id,'id');
        $datacontent['saluran'] = $saluran;
        $datacontent['tw'] =$this->Buka_peta->frd('triwulan',null, null);
        $datacontent['judul'] = 'Saluran Irigasi '.$saluran[0]->NAMA .' '.$saluran[0]->DI;
        $datacontent['tabel'] = $this->Buka_peta->frd('master', $id, 'Id_Saluran');
        $data['content'] = $this->load->view('Admin/saluran', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
   
    public function kondisi($id)
    {
        $jalan = $this->Buka_peta->frd('ruas_jalan', $id, 'Kd_Inf');
        $triwulan  = $this->Buka_peta->frd('triwulan', '1', 'publis');
        if ($jalan != null) {
            $datacontent['judul'] = 'Kondisi Ruas ' . $jalan[0]->Nm_Ruas . ' Triwulan ' . $triwulan[0]->Triwulan . ' - ' . $triwulan[0]->Tahun;
        } else {
            $datacontent['judul'] = 'Kondisi Ruas ';
        }

        $datacontent['s'] = $this->Buka_peta->side('4');


        $kondisi = $this->Buka_peta->frd_kondisi($id, $triwulan[0]->id);
        if ($kondisi != null) {
            $datacontent['tabel'] = $kondisi;
        } else {
            $datacontent['tabel'] = null;
        }
        $datacontent['id'] = $id;
        $datacontent['triwulan'] = $triwulan;
        $data['content'] = $this->load->view('Admin/kondisi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    public function kondisi_admin($id)
    {
        $jalan = $this->Buka_peta->frd('irigasi', $id, 'id');
        if (isset( $_POST['tahun'])) {
            $tahun = $_POST['tahun'];
            $this->db->where(['Tahun' => $tahun]);
            $query = $this->db->get('triwulan');
            $triwulan = $query->result();
        }else{
            $tahun = $_GET['tahun'];
            $this->db->where(['id' => $tahun]);
            $query = $this->db->get('triwulan');
            $triwulan = $query->result();
        }
        
       


        if ($triwulan != null) {
            if ($jalan != null) {
                $datacontent['judul'] = 'Kondisi  Saluran' . $jalan[0]->NAMA . ' Tahun ' . $triwulan[0]->Tahun;
                $kondisi = $this->Buka_peta->frd_kondisi($id,$triwulan[0]->id);
            } else {
                $datacontent['judul'] = 'Kondisi Saluran ';
                $kondisi = null;
            }
        }else {
            $datacontent['judul'] = 'Kondisi Saluran ';
            $kondisi = null;
        }

        $datacontent['s'] = $this->Buka_peta->side('4');


       
        if ($kondisi != null) {
            $datacontent['tabel'] = $kondisi;
             $datacontent['triwulan'] = $triwulan[0]->id;
        } else {
            $datacontent['tabel'] = null;
            $datacontent['triwulan'] = null;
        }
        $datacontent['id'] = $id;
      
        $data['content'] = $this->load->view('Admin/kondisi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    
    public function street($id)
    {
        $jalan = $this->Buka_peta->frd('ruas_jalan', $id, 'Kd_Inf');
        $triwulan  = $this->Buka_peta->frd('triwulan', '1', 'publis');
        $datacontent['judul'] = "Detail Ruas " . $jalan[0]->Nm_Ruas . ' Triwulan ' . $triwulan[0]->Triwulan . ' - ' . $triwulan[0]->Tahun;;
        $datacontent['s'] = $this->Buka_peta->side('4');
        $jalan  = $this->Buka_peta->frd('ruas_jalan', $id, 'Kd_Inf');
        $id_jalan = $jalan[0]->Id_Jalan;

        if ($id_jalan != null) {
            $datacontent['jembatan'] = $this->Buka_peta->peta_jalan($id_jalan, 'id_jalan', 'jembatan', 'Point');
            $datacontent['tb_jembatan'] = $this->Buka_peta->frd('jembatan', $id_jalan, 'id_jalan');
        } else {
            $datacontent['jembatan'] = null;
            $datacontent['tb_jembatan'] = null;
        }


        $datacontent['jalan'] = $jalan;

        $datacontent['jalan1'] = $this->Buka_peta->peta_jalan($id, 'id', 'ruas_jalan', 'MultiLineString');
        $datacontent['kepemilikan'] = $this->Buka_peta->frd('kepemilikan', $id, 'id_jalan');
        $datacontent['kondisi_jalan'] = $this->Buka_peta->frd_kondisi($id, $triwulan[0]->id);
        $data['content'] = $this->load->view('Admin/street', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    
    public function form_tambah_kondisi($id, $triwulan)
    {

        $jalan = $this->Buka_peta->frd('irigasi', $id, 'id_di');
        $datacontent['jalan'] = $jalan;
        $datacontent['id'] = $id;
        $datacontent['tw'] = $triwulan;
        $datacontent['s'] = $this->Buka_peta->side('3');
        $datacontent['judul'] = 'Tambah Kondisi Jalan ' . $jalan[0]->NAMA;
        $datacontent['tabel'] = $this->Buka_peta->frd('kondisi_jalan', null, null);
        $data['content'] = $this->load->view('Admin/tambah_kondisi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
   function form_edit_drainase($id)
    {
        $datacontent['judul'] = 'Edit Drainase Perkotaan';
        $datacontent['s'] = $this->Buka_peta->side('5');
        $datacontent['tabel'] = $this->Buka_peta->frd('drainase', $id, 'id');
        $data['content'] = $this->load->view('Admin/edit_drainase', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_edit_pembuang($id)
    {
        $datacontent['judul'] = 'Edit Saluran Pembuang';
        $datacontent['s'] = $this->Buka_peta->side('6');
        $datacontent['tabel'] = $this->Buka_peta->frd('saluran_pembuang', $id, 'id');
        $data['content'] = $this->load->view('Admin/edit_pembuang', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_edit_airbaku($id)
    {
        $datacontent['judul'] = 'Edit Air Baku';
        $datacontent['s'] = $this->Buka_peta->side('7');
        $datacontent['tabel'] = $this->Buka_peta->frd('sumur', $id, 'id');
        $data['content'] = $this->load->view('Admin/edit_airbaku', $datacontent, true);
        $this->load->view('Admin/index', $data);
    } 
    function form_edit_pirigasi($id)
    {
        $datacontent['judul'] = 'Edit Bangunan Pelengkap Irigasi';
        $datacontent['s'] = $this->Buka_peta->side('8');
        $datacontent['tabel'] = $this->Buka_peta->frd('p_irigasi', $id, 'id');
        $data['content'] = $this->load->view('Admin/edit_pirigasi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_edit_ppembuang($id)
    {
        $datacontent['judul'] = 'Edit Bangunan Pelengkap Pembuang';
        $datacontent['s'] = $this->Buka_peta->side('9');
        $datacontent['tabel'] = $this->Buka_peta->frd('pelengkap_pembuang', $id, 'id');
        $data['content'] = $this->load->view('Admin/edit_ppembuang', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function popup_tambah()
    {
        $datacontent['judul'] = 'Tambah Kategori';
        $this->load->view('modal/tambah_kategori.php', $datacontent);
    }
    function form_edit($id)
    {
        $datacontent['judul'] = 'Edit Bendung';
        $datacontent['s'] = $this->Buka_peta->side('4');
        $datacontent['tabel'] = $this->Buka_peta->frd('bendung', $id, 'id');
        $data['content'] = $this->load->view('Admin/edit_bendung', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_edit_irigasi($id,$id_di)
    {
        $datacontent['judul'] = 'Edit Saluran Irigasi';
        $datacontent['s'] = $this->Buka_peta->side('4');
        $datacontent['tabel'] = $this->Buka_peta->frd('irigasi', $id, 'id');
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['irigasi'] = $this->Buka_peta->peta_jalan($id, 'id', 'irigasi', 'MultiLineString');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan($id_di, 'id_di', 'bendung', 'Point');
        $data['content'] = $this->load->view('Admin/edit_irigasi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
     function form_edit_saluran($id)
    {
        $master = $this->Buka_peta->frd('master',$id,'id');
        $id_sal = $master[0]->Id_Saluran;
        $saluran = $this->Buka_peta->frd('irigasi',$id_sal,'id');
        $datacontent['saluran'] = $saluran;
        $id_di = $saluran[0]->id_di;
        $datacontent['di'] = $this->Buka_peta->frd('bendung', $id_di, 'id_di');
        $datacontent['judul'] = 'Edit Saluran Irigasi '.  $datacontent['di'][0]->NAMA_DI;
        $datacontent['s'] = $this->Buka_peta->side('4');
        $datacontent['tabel'] = $master;
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];
        $tabel = $this->Buka_peta->frd('irigasi', $id_di, 'id_di');
       
        $datacontent['s'] = $this->Buka_peta->side('4');
       
        
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['irigasi'] = $this->Buka_peta->peta_jalan($id, 'id', 'master', 'MultiLineString');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan($id_di, 'id_di', 'bendung', 'Point');
    
        $data['content'] = $this->load->view('Admin/edit_saluran', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_tambah_irigasi($id_di)
    {
        $datacontent['di'] = $this->Buka_peta->frd('bendung', $id_di, 'id_di');
        $datacontent['judul'] = 'Tambah Saluran Irigasi '.  $datacontent['di'][0]->NAMA_DI;
        $datacontent['s'] = $this->Buka_peta->side('4');
        $datacontent['tabel'] = $this->Buka_peta->frd('irigasi', null, null);
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];
        $tabel = $this->Buka_peta->frd('irigasi', $id_di, 'id_di');
       
        $datacontent['s'] = $this->Buka_peta->side('4');
       
        
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['irigasi'] = $this->Buka_peta->peta_jalan($id_di, 'id_di', 'irigasi', 'MultiLineString');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan($id_di, 'id_di', 'bendung', 'Point');
    
        $data['content'] = $this->load->view('Admin/tambah_irigasi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
     function form_tambah_saluran($id)
    {
        $saluran = $this->Buka_peta->frd('irigasi',$id,'id');
        $datacontent['saluran'] = $saluran;
        $id_di = $saluran[0]->id_di;
        $datacontent['di'] = $this->Buka_peta->frd('bendung', $id_di, 'id_di');
        $datacontent['judul'] = 'Tambah Saluran Irigasi '.  $datacontent['di'][0]->NAMA_DI;
        $datacontent['s'] = $this->Buka_peta->side('4');
        $datacontent['tabel'] = $this->Buka_peta->frd('master', null, null);
        $user_name = $this->session->userdata('user_id');
        $bidang = $user_name['bidang'];
        $tabel = $this->Buka_peta->frd('irigasi', $id_di, 'id_di');
       
        $datacontent['s'] = $this->Buka_peta->side('4');
       
        
        $datacontent['kecamatan'] = $this->Buka_peta->peta_jalan(null, null, 'kecamatan', 'MultiPolygon');
        $datacontent['irigasi'] = $this->Buka_peta->peta_jalan($id, 'id', 'irigasi', 'MultiLineString');
        $datacontent['bendung'] = $this->Buka_peta->peta_jalan($id_di, 'id_di', 'bendung', 'Point');
    
        $data['content'] = $this->load->view('Admin/tambah_saluran', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_edit_kondisi($id = '', $id_kondisi = '')
    {
        $datacontent['id'] = $id;
        $datacontent['judul'] = 'Edit Kondisi Jalan';
        $datacontent['s'] = $this->Buka_peta->side('2');
        $datacontent['tabel'] = $this->Buka_peta->frd('kondisi_jalan', $id_kondisi, 'id');
        $data['content'] = $this->load->view('Admin/edit_kondisi', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }

    function edit_simpan($id)
    {
        $tabel = $this->Buka_peta->frd('bendung', $id, 'id');
        $tab = $tabel[0];
        $file1  = $_FILES['Photo1']['name'];
        $file2  = $_FILES['Photo2']['name'];
        $file3  = $_FILES['Photo3']['name'];
        $temp_file = $_FILES['Photo1']["tmp_name"];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'geojson' && $key != 'Photo1' && $key != 'Photo2') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
         
        if (isset($file1)) {
            if ($file1 != '') {
                $d1 =   array('Photo1' => $file1);
                $data = array_merge($data, $d1);
              
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/bendung/foto/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/bendung/foto/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo1"]["tmp_name"], "$folder" . $_FILES["Photo1"]["name"]);
            }
        }
        if (isset($file2)) {
            if ($file2 != '') {
                $d1 =   array('Photo2' => $file2);
                $data = array_merge($data, $d1);
              
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/bendung/skema/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/bendung/skema/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo2"]["tmp_name"], "$folder" . $_FILES["Photo2"]["name"]);
            }
        }
        if (isset($file3)) {
            if ($file3 != '') {
                $d1 =   array('Photo3' => $file3);
                $data = array_merge($data, $d1);
              
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/bendung/jaringan/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/bendung/jaringan/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo3"]["tmp_name"], "$folder" . $_FILES["Photo3"]["name"]);
            }
        }
        $arg = array('table_name' => 'bendung', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/ruas');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/ruas');
        }
    }
    
    function edit_simpan_kondisi($id = '', $id_kondisi = '')
    {
        $tabel = $this->Buka_peta->frd('kondisi_jalan', $id_kondisi, 'id');
        $file  = $_FILES['upfile1']['name'];
        $temp_file = $_FILES['upfile1']["tmp_name"];
        $tab = $tabel[0];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'Kd_Inf' && $key != 'Nm_Ruas' && $key != 'Foto' && $key != 'Folder') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }


        if (isset($file)) {
            if ($file != '') {
                $d1 =   array('Foto' => $file, 'Folder' => 'tambahan');
                $data = array_merge($data, $d1);
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/assets/dokumentasi_jalan/tambahan/';
                move_uploaded_file($temp_file, "$folder" . $file);
            }
        }

        $arg = array('table_name' => 'kondisi_jalan', 'val' => $id_kondisi, 'field' => 'id');
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Input',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/kondisi/' . $id);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Input',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/ruas/kondisi/' . $id);
        }
    }
    
    function simpan_kondisi($id = '')
    {

        $tabel = $this->Buka_peta->frd('kondisi_jalan', $id_kondisi, 'id');
        $file  = $_FILES['upfile1']['name'];

        $temp_file = $_FILES['upfile1']["tmp_name"];
        $tab = $tabel[0];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'Foto' && $key != 'Folder' && $key != 'Triwulan') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }

        $d0 = array('Triwulan' => $_POST['tw']);
        $data = array_merge($data, $d0);
        if (isset($file)) {
            if ($file != '') {
                $d1 =   array('Foto' => $file, 'Folder' => 'tambahan');
                $data = array_merge($data, $d1);

                $folder = $_SERVER['DOCUMENT_ROOT'] . '/assets/dokumentasi_jalan/tambahan/';
                move_uploaded_file($temp_file, "$folder" . $file);
            }
        }

        //$arg = array('table_name'=>'kondisi_jalan','val'=>$id_kondisi,'field'=>'id');
        $res = $this->Buka_peta->insert_data('kondisi_jalan', $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Input',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/kondisi/' . $id);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Input',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/ruas/kondisi/' . $id);
        }
    }
    
    public function hapus_kondisi($kd_inf = '', $id = '')
    {

        $res = $this->Buka_peta->delete_record('kondisi_jalan', $id, 'id');
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Input',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/kondisi/' . $kd_inf);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Input',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/kondisi/' . $kd_inf);
        }
    }

    function edit_simpan_irigasi($id='',$id_di='')
    {
        $tabel = $this->Buka_peta->frd('irigasi', $id, 'id');
        $tab = $tabel[0];
        $file1  = $_FILES['Photo_Awal']['name'];
        $file2  = $_FILES['Photo_Ujun']['name'];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id'  && $key != 'foto') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;

                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        if (isset($file1)) {
            if ($file1 != '') {
                $d1 =   array('Photo_Awal' => $file1);
                $data = array_merge($data, $d1);
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/irigasi/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/irigasi/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo_Awal"]["tmp_name"], "$folder" . $_FILES["Photo_Awal"]["name"]);
            }
        }
        if (isset($file2)) {
            if ($file2 != '') {
                $d1 =   array('Photo_Ujun' => $file2);
                $data = array_merge($data, $d1);
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/irigasi/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/irigasi/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo_Ujun"]["tmp_name"], "$folder" . $_FILES["Photo_Ujun"]["name"]);
            }
        }
        $arg = array('table_name' => 'irigasi', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/irigasi/'.$id_di);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
             redirect('Admin/Kecamatan/irigasi/'.$id_di);
        }
    }
    function edit_simpan_saluran($id='',$id_di='')
    {
        $tabel = $this->Buka_peta->frd('master', $id, 'id');
        $tab = $tabel[0];
       
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id'  && $key != 'foto') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;

                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        
        $arg = array('table_name' => 'master', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/saluran/'.$id_di);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
             redirect('Admin/Kecamatan/saluran/'.$id_di);
        }
    }
     public function hapus_irigasi($id = '',$id_di='')
    {

        $res = $this->Buka_peta->delete_record('irigasi', $id, 'id');
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Hapus',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
             redirect('Admin/Kecamatan/irigasi/'.$id_di);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Hapus',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
              redirect('Admin/Kecamatan/irigasi/'.$id_di);
        }
    }
     public function hapus_saluran($id = '',$id_di='')
    {

        $res = $this->Buka_peta->delete_record('master', $id, 'id');
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Hapus',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
             redirect('Admin/Kecamatan/saluran/'.$id_di);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Hapus',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
              redirect('Admin/Kecamatan/saluran/'.$id_di);
        }
    }
    function tambah_simpan_irigasi($id='',$id_di='')
    {
        $tabel = $this->Buka_peta->frd('irigasi', $id, 'id');
        $tab = $tabel[0];
        $file1  = $_FILES['Photo_Awal']['name'];
        $file2  = $_FILES['Photo_Ujun']['name'];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'Photo_Awal' && $key != 'Photo_Ujun') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                if ($key != 'geojson') {
                     $d  = array($field_nya[$i] => $form_nya[$i]);
                }else{
                     $d  = array($field_nya[$i] => '['. $form_nya[$i].']');
                }
               
                $data = array_merge($data, $d);
                $i++;
            }
        }
        if (isset($file1)) {
            if ($file1 != '') {
                $d1 =   array('Photo_Awal' => $file1);
                $data = array_merge($data, $d1);
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/irigasi/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/irigasi/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo_Awal"]["tmp_name"], "$folder" . $_FILES["Photo_Awal"]["name"]);
            }
        }
        if (isset($file2)) {
            if ($file2 != '') {
                $d2 =   array('Photo_Ujun' => $file2);
                $data = array_merge($data, $d2);
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/irigasi/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/irigasi/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo_Ujun"]["tmp_name"], "$folder" . $_FILES["Photo_Ujun"]["name"]);
            }
        }
      
        $res = $this->Buka_peta->insert_data('irigasi', $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/irigasi/'.$id);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
             redirect('Admin/Kecamatan/irigasi/'.$id);
        }
    }
    function tambah_simpan_saluran($id='')
    {
        $tabel = $this->Buka_peta->frd('master', $id, 'id');
        $tab = $tabel[0];
       
       
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'Photo_Awal' && $key != 'Photo_Ujun') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                if ($key != 'geojson') {
                     $d  = array($field_nya[$i] => $form_nya[$i]);
                }else{
                     $d  = array($field_nya[$i] => '['. $form_nya[$i].']');
                }
               
                $data = array_merge($data, $d);
                $i++;
            }
        }
        
      
        $res = $this->Buka_peta->insert_data('master', $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/saluran/'.$id);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
             redirect('Admin/Kecamatan/saluran/'.$id);
        }
    }
    public function tri($id)
	{

		$data['id'] = $id;
		$data['judul'] = 'Pilih Triwulan';
		$this->load->view('Admin/s_triwulan.php', $data);
	}

    function edit_simpan_drainase($id)
    {
        $tabel = $this->Buka_peta->frd('drainase', $id, 'id');
        $tab = $tabel[0];
        $file  = $_FILES['upfile1']['name'];

        $temp_file = $_FILES['upfile1']["tmp_name"];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'geojson' && $key != 'foto_awal' && $key != 'foto_ujung') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        if (isset($file)) {
            if ($file != '') {
                $d1 =   array('foto' => $file);
                $data = array_merge($data, $d1);
                //$folder = $_SERVER['DOCUMENT_ROOT'] . '/sijantan/assets/dokumentasi_jalan/tambahan/' . $id . '/';
                $folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/dokumentasi_jalan/tambahan/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["upfile1"]["tmp_name"], "$folder" . $_FILES["upfile1"]["name"]);
            }
        }
        $arg = array('table_name' => 'drainase', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/drainase');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/drainase');
        }
    }
    function edit_simpan_pembuang($id)
    {
        $tabel = $this->Buka_peta->frd('saluran_pembuang', $id, 'id');
        $tab = $tabel[0];
        $file  = $_FILES['upfile1']['name'];

        $temp_file = $_FILES['upfile1']["tmp_name"];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'geojson' && $key != 'foto_awal' && $key != 'foto_ujung') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        if (isset($file)) {
            if ($file != '') {
                $d1 =   array('foto' => $file);
                $data = array_merge($data, $d1);
                //$folder = $_SERVER['DOCUMENT_ROOT'] . '/sijantan/assets/dokumentasi_jalan/tambahan/' . $id . '/';
                $folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/dokumentasi_jalan/tambahan/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["upfile1"]["tmp_name"], "$folder" . $_FILES["upfile1"]["name"]);
            }
        }
        $arg = array('table_name' => 'saluran_pembuang', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/pembuang');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/pembuang');
        }
    }
    function edit_simpan_airbaku($id)
    {
        $tabel = $this->Buka_peta->frd('sumur', $id, 'id');
        $tab = $tabel[0];
        $file  = $_FILES['upfile1']['name'];

        $temp_file = $_FILES['upfile1']["tmp_name"];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'geojson' && $key != 'Photo1' && $key != 'Photo2' && $key != 'Photo3') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        if (isset($file)) {
            if ($file != '') {
                $d1 =   array('foto' => $file);
                $data = array_merge($data, $d1);
                //$folder = $_SERVER['DOCUMENT_ROOT'] . '/sijantan/assets/dokumentasi_jalan/tambahan/' . $id . '/';
                $folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/dokumentasi_jalan/tambahan/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["upfile1"]["tmp_name"], "$folder" . $_FILES["upfile1"]["name"]);
            }
        }
        $arg = array('table_name' => 'sumur', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/airbaku');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/airbaku');
        }
    }
    function edit_simpan_pirigasi($id)
    {
        $tabel = $this->Buka_peta->frd('p_irigasi', $id, 'id');
        $tab = $tabel[0];
        $file1  = $_FILES['Photo1']['name'];
        $file2  = $_FILES['Photo2']['name'];
       
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'geojson' && $key != 'Photo1' && $key != 'Photo2' && $key != 'Photo3') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
       if (isset($file1)) {
            if ($file1 != '') {
                $d1 =   array('Photo1' => $file1);
                $data = array_merge($data, $d1);
              
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/pirigasi/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/pirigasi/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo1"]["tmp_name"], "$folder" . $_FILES["Photo1"]["name"]);
            }
        }
        if (isset($file2)) {
            if ($file2 != '') {
                $d1 =   array('Photo2' => $file2);
                $data = array_merge($data, $d1);
              
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/risda2026/assets/foto/pirigasi/' . $id . '/';
                //$folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/foto/pirigasi/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["Photo2"]["tmp_name"], "$folder" . $_FILES["Photo2"]["name"]);
            }
        }
        $arg = array('table_name' => 'p_irigasi', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/p_irigasi');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/p_irigasi');
        }
    }
    function edit_simpan_ppembuang($id)
    {
        $tabel = $this->Buka_peta->frd('saluran_pembuang', $id, 'id');
        $tab = $tabel[0];
        $file  = $_FILES['upfile1']['name'];

        $temp_file = $_FILES['upfile1']["tmp_name"];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id' && $key != 'geojson' && $key != 'Photo1' && $key != 'Photo2' && $key != 'Photo3') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        if (isset($file)) {
            if ($file != '') {
                $d1 =   array('foto' => $file);
                $data = array_merge($data, $d1);
                //$folder = $_SERVER['DOCUMENT_ROOT'] . '/sijantan/assets/dokumentasi_jalan/tambahan/' . $id . '/';
                $folder =  '/var/www/html/sijantan/assets/dokumentasi_jalan/tambahan' . $id . '/';
                if (!file_exists($folder)) {
                    mkdir("assets/dokumentasi_jalan/tambahan/" . $id, 0755);
                }
                //move_uploaded_file($temp_file, "$folder" . $file);
                move_uploaded_file($_FILES["upfile1"]["tmp_name"], "$folder" . $_FILES["upfile1"]["name"]);
            }
        }
        $arg = array('table_name' => 'saluran_pembuang', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/p_pembuang');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/p_pembuang');
        }
    }
	 public function import_excel($id='',$tahun='') {
        ini_set('max_execution_time', 3000);
        $upload_file = $_FILES['upfile']['name'];
         $extension = pathinfo($upload_file, PATHINFO_EXTENSION);
        if ($extension == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if ($extension == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $o       = html_escape($this->input->post('o'));
        if ($o == 'o1') {
            $this->Buka_peta->trunc('krk');
        }
        $spreadsheet = $reader->load($_FILES['upfile']['tmp_name']);
        $sheet1 = $spreadsheet->getSheetByName('Worksheet');
       
        for($i=2;$i<=500;$i++){
            $kondisi =  $sheet1->getCell('B'.$i)->getCalculatedValue();
            $hm =  $sheet1->getCell('C'.$i)->getCalculatedValue();
            $tinggikiri = $sheet1->getCell('E'.$i)->getCalculatedValue();
            $tebalkiri = $sheet1->getCell('F'.$i)->getCalculatedValue();
            $tinggikanan = $sheet1->getCell('G'.$i)->getCalculatedValue();
            $tebalkanan = $sheet1->getCell('H'.$i)->getCalculatedValue();
            $konstruksikiri = $sheet1->getCell('I'.$i)->getCalculatedValue();
            $konstruksikanan = $sheet1->getCell('J'.$i)->getCalculatedValue();
            $lebaratas = $sheet1->getCell('K'.$i)->getCalculatedValue();
            $lebarbawah = $sheet1->getCell('L'.$i)->getCalculatedValue();
            $data = array('tinggikiri'=> $tinggikiri,
            'tebalkiri'=>$tebalkiri,
            'tinggikanan'=>$tinggikanan,
            'tebalkanan'=>$tebalkanan,
            'konstruksikiri'=>$konstruksikiri,
            'konstruksikanan'=>$konstruksikanan,
            'lebaratas'=>$lebaratas,
            'lebarbawah'=>$lebarbawah,
            'KONDISI'=>$kondisi
            );
            $this->db->where('Id_Saluran', $id);
            $this->db->where('tahun', $tahun);
            $this->db->where('HM', $hm);
            $this->db->update('kondisi', $data);
        }
        

        redirect('Admin/Kecamatan/kondisi_admin/'.$id.'?tahun='.$tahun);
    }
	public function export_excel($id='',$thn='') {
        $tabel = $this->Buka_peta->frd_kondisi($id,$thn);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'DI');
        $sheet->setCellValue('B1', 'KONDISI');
        $sheet->setCellValue('C1', 'HM');
        $sheet->setCellValue('D1', 'Id Saluran');
        $sheet->setCellValue('E1', 'Tinggi Kiri');
        $sheet->setCellValue('F1', 'Tebal Kiri');
        $sheet->setCellValue('G1', 'Tinggi Kanan');
        $sheet->setCellValue('H1', 'Tebal Kanan');
        $sheet->setCellValue('I1', 'Konstruksi Kiri');
        $sheet->setCellValue('J1', 'Konstruksi Kanan');
        $sheet->setCellValue('K1', 'Lebar Atas');
        $sheet->setCellValue('L1', 'Lebar Bawah');
        $sheet->setCellValue('M1', 'Tahun');
        $this->garis($sheet, 1);
        $this->set_kolom($sheet);
        $sheet->getStyle('A1:M1')->getFont()->setBold(true);
        $sheet->getStyle('A1:M1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sn = 2;
        foreach ($tabel as $t) {
            $this->garis($sheet, $sn);
            $sheet->setCellValue('A' . $sn, $t->DI);
            $sheet->setCellValue('B' . $sn, '');
            $sheet->setCellValue('C' . $sn, $t->HM);
            $sheet->setCellValue('D' . $sn, $t->Id_Saluran);
            $sheet->setCellValue('E' . $sn, '');
            $sheet->setCellValue('F' . $sn, '');
            $sheet->setCellValue('G' . $sn, '');
            $sheet->setCellValue('H' . $sn, '');
            $sheet->setCellValue('I' . $sn, '');
            $sheet->setCellValue('J' . $sn, '');
            $sheet->setCellValue('K' . $sn, '');
            $sheet->setCellValue('L' . $sn, '');
            $sheet->setCellValue('M' . $sn, $thn);
            $sn++;
        }
        $fileName = $_SERVER['DOCUMENT_ROOT'] . "/assets/template.xlsx";
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($fileName);
        force_download($fileName, NULL);
        exit();
      
    }
    function garis($sheet, $ba)
    {
        $border = array('borders' => array('outline' => array('borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => array('argb' => 'black'),),),);
        $sheet->getStyle('A' . $ba)->applyFromArray($border);
        $sheet->getStyle('B' . $ba)->applyFromArray($border);
        $sheet->getStyle('C' . $ba)->applyFromArray($border);
        $sheet->getStyle('D' . $ba)->applyFromArray($border);
        $sheet->getStyle('E' . $ba)->applyFromArray($border);
        $sheet->getStyle('F' . $ba)->applyFromArray($border);
        $sheet->getStyle('G' . $ba)->applyFromArray($border);
        $sheet->getStyle('H' . $ba)->applyFromArray($border);
        $sheet->getStyle('I' . $ba)->applyFromArray($border);
        $sheet->getStyle('J' . $ba)->applyFromArray($border);
        $sheet->getStyle('K' . $ba)->applyFromArray($border);
        $sheet->getStyle('L' . $ba)->applyFromArray($border);
        $sheet->getStyle('M' . $ba)->applyFromArray($border);
    }
     public function set_kolom($sheet)
    {
        $sheet->getColumnDimension('A')->setWidth(15.09);
        $sheet->getColumnDimension('B')->setWidth(17.27);
        $sheet->getColumnDimension('C')->setWidth(8.09);
        $sheet->getColumnDimension('D')->setWidth(11.45);
        $sheet->getColumnDimension('E')->setWidth(10);
        $sheet->getColumnDimension('F')->setWidth(10);
        $sheet->getColumnDimension('G')->setWidth(13);
        $sheet->getColumnDimension('H')->setWidth(13);
        $sheet->getColumnDimension('I')->setWidth(13);
        $sheet->getColumnDimension('J')->setWidth(13);
        $sheet->getColumnDimension('K')->setWidth(13);
        $sheet->getColumnDimension('L')->setWidth(13);
        $sheet->getColumnDimension('M')->setWidth(10);
    }
    public function posting($p,$id,$id_sal,$tahun) {
        
        if ($p=='per') {

            $master = $this->Buka_peta->frd('master',$id,'id');

            $db_debug = $this->db->db_debug;
            $this->db->db_debug = FALSE;
            $this->db->where(['Id_saluran' => $id_sal,'HM' => $master[0]->HM,'tahun' => $tahun]);
            $this->db->delete('kondisi');

        }else{
            $master = $this->Buka_peta->frd('master',$id_sal,'id_saluran');

            $this->db->db_debug = FALSE;
            $this->db->where(['Id_saluran' => $id_sal,'tahun' => $tahun]);
            $this->db->delete('kondisi');
        }
        foreach($master as $mas) {
            $data = array('K_SALURAN' => $mas->K_SALURAN,
            'NOMENKLATU'    => $mas->NOMENKLATU,
            'NAMA'          => $mas->NAMA,
            'DI'            => $mas->DI,
            'KelasSalur'    =>$mas->KelasSalur,
            'Desa'          =>$mas->Desa,
            'Kecamatan'     => $mas->Kecamatan,
            'NO_DI'         => $mas->NO_DI,
            'UPTD'          => $mas->UPTD,
            'KEMANTREN'     =>$mas->KEMANTREN,
            'HM'            =>$mas->HM,
            'Id_Saluran'    => $mas->Id_Saluran,
            'geojson'       => $mas->geojson,
            'tahun'         => $tahun,
            );
           $res=  $this->Buka_peta->insert_data('kondisi',$data);
        }
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Ubah',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Kecamatan/kondisi_admin/'.$id_sal.'?tahun='.$tahun);
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Ubah',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
             redirect('Admin/Kecamatan/kondisi_admin/'.$id_sal.'?tahun='.$tahun);
        }
   
    }
}
