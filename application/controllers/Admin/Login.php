<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Buka_peta');
        date_default_timezone_set('Asia/Jakarta');
    }
	public function index()
	{	
		$datacontent['judul']='Dashboard';
	
		$data['content'] = $this->load->view('dashboard',$datacontent,true);
		$this->load->view('login',$data);
	}
	public function authentication()
	{
		if (strtoupper($this->input->method()) !== 'POST') {
			show_404();
		}
        
		// DEFINES READ CATEROTY NAME FORM Login FORM
			$user_email = trim((string) $this->input->post('email', true));
		    $user_password = (string) $this->input->post('pass');
			$cap = trim((string) $this->input->post('cap', true));
			$cap_val = (string) $this->session->userdata('login_captcha');
			$this->session->unset_userdata('login_captcha');
			if ($cap_val === '' || !hash_equals($cap_val, $cap)) {
				$this->session->set_flashdata('login_error', 'Captcha salah. Silakan coba lagi.');
				redirect('Welcome/login');
				return;
			}
			
			
           
		if (!empty($user_email) && !empty($user_password))
		{

			// DEFINES LOAD CRUDS_MODEL FORM MODELS FOLDERS
			
			$result = $this->Buka_peta->authenticate_user($user_email, $user_password);
            if ($result != NULL) {
				$this->session->sess_regenerate(true);
                
                $userdata = array(
					'id' => $result[0]->id,
					'nama_user' => $result[0]->nama,
                    'bidang'=>$result[0]->bidang,
					'foto'=>$result[0]->file_foto,
				);
				$this->session->set_userdata('user_id', $userdata);
				$this->session->userdata('user_id');
				$array_msg = array(
					'msg' => '<i style="color:#fff" class="fa fa-check-circle-o" aria-hidden="true"></i> Login  Successfully',
					'alert' => 'info'
				);
				$this->session->set_flashdata('status', $array_msg);
			
				redirect('Admin/Index');
				
			}else{
				$this->session->set_flashdata('login_error', 'Username atau password salah.');
				redirect('Welcome/login');
				return;
            }
         
		} else {
			$this->session->set_flashdata('login_error', 'Email dan kata sandi wajib diisi.');
			redirect('Welcome/login');
		}
		
	}

	public function sign_out()
	{
		$this->session->sess_destroy();
		redirect('Welcome/login');
	}
}
