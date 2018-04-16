<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->model('m_back_end');  
		if($this->session->userdata('login_status') == TRUE ){ 
            redirect('myapp'); 
        }
    }

	public function index()
	{
        $data=array(
            'title'=>'Login Page',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_login');
        $this->load->view('back_end/v_footer_file');
	}
	
	
    function cek_login() {
        //cek login
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        //query ke database
        $result = $this->m_back_end->getSelectedData('tbl_muser',array('username'=>$username,'password'=>$password));
		//jika sukses 
        if($result->num_rows() > 0) {
            $sess_array = array();
            foreach($result->result() as $row) {
                //ambil data untuk session
                $sess_array = array(
                    'ID_USER' => $row->id_user,
                    'USERNAME' => $row->username,
                    'KODE_SISWA' => $row->kode_siswa,   
                    'LEVEL_ROLE' => $row->level_role,
                    'LOGIN_STATUS'=>true
                );  
                //buat session
                $this->session->set_userdata($sess_array);
                redirect('myapp');
				}
        } else {
            //jika salah
            $this->session->set_flashdata('notif-gagal','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('login');
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('ID_USER');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('LEVEL_ROLE');
        $this->session->unset_userdata('KODE_SISWA');
        $this->session->unset_userdata('LOGIN_STATUS');
        $this->session->set_flashdata('notif','THANK YOU');
        redirect('login');
    }
	
}
