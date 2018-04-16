<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Akuntan extends CI_Controller {
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
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/akuntan/v_Dashboard');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
    
	public function list_transaksi()
	{
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_transaksi'=>$this->m_back_end->getAllDataTransaksi(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/akuntan/v_transaksi');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	public function myprofile()
	{
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_user'=>$this->m_back_end->getSelectedData('tbl_muser',array('id_user'=>$this->session->userdata('ID_USER')))->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/akuntan/v_user');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function ganti_password()
	{		
		$key['id_user'] = $this->input->post('id_user');
		$data['password'] = md5($this->input->post('password'));
		$data['editdate'] = date('Y-m-d H:i:s');
		$table="tbl_muser";
		$proses=$this->m_back_end->updateData($table,$data,$key);		 

		if ($proses == TRUE)
		{
			$this->session->set_flashdata('notif-sukses','Password berhasil dirubah');
			redirect('akuntan/myprofile');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','Password gagal dirubah');
			redirect('akuntan/myprofile');
		}

	}
	
}
