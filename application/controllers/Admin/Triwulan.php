<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Triwulan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buka_peta');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $datacontent['judul'] = 'Data Kecamatan';
        $datacontent['s'] = $this->Buka_peta->side('3');
        $datacontent['tabel'] = $this->Buka_peta->frd('triwulan', null, null);
        $data['content'] = $this->load->view('Admin/triwulan', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_tambah()
    {
        $datacontent['judul'] = 'Tambah Triwulan';
        $datacontent['s'] = $this->Buka_peta->side('3');
        $datacontent['tabel'] = $this->Buka_peta->frd('triwulan', null, null);
        $data['content'] = $this->load->view('Admin/tambah_triwulan', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function form_ubah($id)
    {
        $datacontent['judul'] = 'Ubah Triwulan';
        $datacontent['s'] = $this->Buka_peta->side('3');
        $datacontent['tabel'] = $this->Buka_peta->frd('triwulan', $id, 'id');
        $data['content'] = $this->load->view('Admin/ubah_triwulan', $datacontent, true);
        $this->load->view('Admin/index', $data);
    }
    function simpan()
    {
        $tabel = $this->Buka_peta->frd('triwulan', null, null);
        $tab = $tabel[0];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        //$arg = array('table_name'=>'ruas_jalan','id'=>$id);
        $res = $this->Buka_peta->insert_data('triwulan', $data);
        $insert_id = $this->db->insert_id();
        if ($_POST['publis'] == '1') {
            $this->Buka_peta->update_tampil($insert_id);
        }
        $master = $this->Buka_peta->frd('master_kondisi', null, null);
        $master_att = $this->Buka_peta->frd('master_atribut', null, null);
        $field_nya = [];
        $data1  = array();
        foreach ($master as $mas) {
            foreach ($mas as $key => $value) {
                if ($key != 'id') {
                    $field_nya[$i] = $key;
                    $d  = array($key => $value);
                    $data1 = array_merge($data1, $d);
                }
            }
            $d2 = array('Triwulan' => $insert_id);
            $data1 = array_merge($data1, $d2);
            $res = $this->Buka_peta->insert_data('kondisi_jalan', $data1);
        }
        $field_nya = [];
        $data1  = array();
        foreach ($master_att as $mas) {
            foreach ($mas as $key => $value) {
                if ($key != 'id') {
                    $field_nya[$i] = $key;
                    $d  = array($key => $value);
                    $data1 = array_merge($data1, $d);
                }
            }
            $d2 = array('Triwulan' => $insert_id);
            $data1 = array_merge($data1, $d2);
            $res = $this->Buka_peta->insert_data('atribut', $data1);
        }
        $ruas = $this->Buka_peta->frd('ruas_jalan', null, null);
        foreach ($ruas as $r) {
            $data = array('Triwulan' => $insert_id, 'Kd_Inf' => $r->Kd_Inf);
            $res = $this->Buka_peta->insert_data('attr_jalan', $data);
        }
        $ruas = $this->Buka_peta->frd('jembatan', null, null);
        foreach ($ruas as $r) {
            $data = array('Triwulan' => $insert_id, 'id_jem' => $r->id, 'kode' => $r->kode);
            $res = $this->Buka_peta->insert_data('attr_jembatan', $data);
        }
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Input',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Triwulan');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Input',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Triwulan');
        }
    }
    function ubah_simpan($id)
    {
        $tabel = $this->Buka_peta->frd('triwulan', $id, 'id');
        $tab = $tabel[0];
        $form_nya = [];
        $field_nya = [];
        $i = 0;
        $data  = array();
        foreach ($tab as $key => $value) {
            if ($key != 'id') {
                $form_nya[$i] = $_POST[$key];
                $field_nya[$i] = $key;
                $d  = array($field_nya[$i] => $form_nya[$i]);
                $data = array_merge($data, $d);
                $i++;
            }
        }
        $arg = array('table_name' => 'triwulan', 'field' => 'id', 'val' => $id);
        $res = $this->Buka_peta->edit_record($arg, $data);
        if ($_POST['publis'] == '1') {
            $this->Buka_peta->update_tampil($id);
        } else {
            $arg1 = array('table_name' => 'triwulan', 'field' => 'id', 'val' => '1');
            $data1 = array('publis' => '1');
            $res = $this->Buka_peta->edit_record($arg1, $data1);
        }
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Input',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Triwulan');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Input',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Triwulan');
        }
    }

    public function hapus($id)
    {

        $res = $this->Buka_peta->delete_record('triwulan', $id, 'id');
        $res = $this->Buka_peta->delete_record('kondisi_jalan', $id, 'Triwulan');
        $res = $this->Buka_peta->delete_record('atribut', $id, 'Triwulan');
        $res = $this->Buka_peta->delete_record('attr_jalan', $id, 'Triwulan');
        $res = $this->Buka_peta->delete_record('attr_jembatan', $id, 'Triwulan');
        if ($res) {
            $array_msg = array(
                'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"/> Data Berhasil Di Hapus',
                'alert' => 'info'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Triwulan');
        } else {
            $array_msg = array(
                'msg' => '<i style="color:#c00" class="fa fa-exclamation-triangle" aria-hidden="true"/> Data Gagal di Hapus',
                'alert' => 'danger'
            );
            $this->session->set_flashdata('status', $array_msg);
            redirect('Admin/Triwulan');
        }
    }
}
