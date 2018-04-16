<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Myapp extends CI_Controller {
function __construct(){
        parent::__construct();
        if($this->session->userdata('LOGIN_STATUS') != TRUE ){
			$this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
			redirect('login');  
        }
		else { $this->load->model('m_back_end'); }
    }

	public function index()
	{
        $data=array(
            'title'=>'Dashboard',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_dashboard');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
}
