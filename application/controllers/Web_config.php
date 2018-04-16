<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Web_config extends CI_Controller {
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
            'data_email'=>$this->m_back_end->getAllData('tbl_mconfigemail')->result(),
            'data_web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_web_config');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function save_web_config()
	{		
		$key['id_web_config'] = $this->input->post('id_web_config');
		$data['nama_web'] = $this->input->post('nama_web');
		$data['editdate'] = date('Y-m-d H:i:s');
		//fungsi upload file 
			$nmfile = $this->input->post('nama_web').date('Y-m-d H:i:s');  
			$config['upload_path'] = 'assets/frontend/images'; 
			$config['allowed_types'] = 'jpg|jpeg|bmp|gif|png';  
			$config['max_size'] = 10024; 
			$config['file_name'] = $nmfile; 
			$this->upload->initialize($config);
		if($_FILES['file_logo']['size'] > 0)
		{	
			$this->upload->do_upload('file_logo');
			$filelogo = $this->upload->data();
			$data['file_logo'] = $filelogo['file_name'];
		}
		else
		{
			$data['file_logo'] = $this->input->post('file_logo_text');
		}
		$table="tbl_mweb_config";
		$proses=$this->m_back_end->updateData($table,$data,$key);		 
		if ($proses == TRUE)
		{
			$this->session->set_flashdata('notif-sukses','Data berhasil dirubah');
			redirect('web_config');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','Data gagal dirubah');
			redirect('web_config');
		}

	}
	
	function remove_logo()
	{
		$key['id_web_config'] = $this->uri->segment(3);
		$data['file_logo'] = NULL;
		$data['editdate'] = date('Y-m-d H:i:s');
		$table="tbl_mweb_config";
		$proses=$this->m_back_end->updateData($table,$data,$key);
		if ($proses == TRUE)
		{
			$this->session->set_flashdata('notif-sukses','File logo berhasil dihapus');
			redirect('web_config');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','File logo gagal dihapus');
			redirect('web_config');
		}	
	}
	
	
	
	function save_email()
	{
		$key['id_config_email'] = $this->input->post('id_config_email');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['editdate'] = date('Y-m-d H:i:s');
		$table="tbl_mconfigemail";
		$proses=$this->m_back_end->updateData($table,$data,$key);
		if ($proses == TRUE)
		{
			$this->session->set_flashdata('notif-sukses','Email berhasil dihapus');
			redirect('web_config');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','Email gagal dihapus');
			redirect('web_config');
		}	
	}
	
}
