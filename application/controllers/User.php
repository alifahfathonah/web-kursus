<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  User extends CI_Controller {
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
            'data_role'=>$this->m_back_end->getAllData('tbl_muserrole')->result(),
            'data_user'=>$this->m_back_end->getUser(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_user');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function add_user()
	{	 
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['level_role'] = $this->input->post('level_role');
		$data['isactive'] = $this->input->post('isactive');
		$data['createdate'] = date('Y-m-d H:i:s');
		$table="tbl_muser";
		$proses=$this->m_back_end->insertData($table,$data);		 

		if ($proses == TRUE)
		{
			$this->session->set_flashdata('notif-sukses','User berhasil ditambahkan');
			redirect('user');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','User gagal ditambahkan');
			redirect('user');
		}
	}
	
	function save_user()
	{		
		$key['id_user'] = $this->input->post('id_user');
		$data['kode_siswa'] = $this->input->post('kode_siswa');
		$data['username'] = $this->input->post('username');
		$data['level_role'] = $this->input->post('level_role');
		$data['isactive'] = $this->input->post('isactive');
		$data['editdate'] = date('Y-m-d H:i:s');
		$table="tbl_muser";
		$proses=$this->m_back_end->updateData($table,$data,$key);		 

		if ($proses == TRUE)
		{
			$this->session->set_flashdata('notif-sukses','User berhasil dirubah');
			redirect('user');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','User gagal dirubah');
			redirect('user');
		}

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
			redirect('user');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','Password gagal dirubah');
			redirect('user');
		}

	}
	
}
