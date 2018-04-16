<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Web_content extends CI_Controller {
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
	
    function banner()
	{
        $data=array(
            'title'=>'Banner',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_banner'=>$this->m_back_end->getAllData('tbl_mbanner')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_banner');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function add_banner()
	{	 
			$data['text_banner'] = $this->input->post('text_banner');
			$data['isactive'] = $this->input->post('isactive');
			$data['createdate'] = date('Y-m-d H:i:s');
			//fungsi upload file 
			$nmfile = $this->input->post('text_banner').date('Y-m-d H:i:s');  
			$config['upload_path'] = 'assets/frontend/images/banner'; 
			$config['allowed_types'] = 'jpg|jpeg|bmp|gif|png';  
			$config['max_size'] = 10024; 
	 		$config['file_name'] = $nmfile; 
			$this->upload->initialize($config);
 
			if ($this->upload->do_upload('file_banner'))
			{ 
				$filebanner = $this->upload->data();
				$data['file_banner'] = $filebanner['file_name'];
			}
			else
			{
				$data['file_banner'] = NULL;
			}
			$table="tbl_mbanner";
			$proses=$this->m_back_end->insertData($table,$data);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Banner berhasil ditambahkan');
				redirect('web_content/banner');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Banner gagal ditambahkan');
				redirect('web_content/banner');
			}
	}
	
	function save_banner()
	{
			$key['id_banner'] = $this->input->post('id_banner');
			$data['text_banner'] = $this->input->post('text_banner');
			$data['isactive'] = $this->input->post('isactive');
			$data['editdate'] = date('Y-m-d H:i:s');
			//fungsi upload file 
				$nmfile = $this->input->post('text_banner').date('Y-m-d H:i:s');  
				$config['upload_path'] = 'assets/frontend/images/banner'; 
				$config['allowed_types'] = 'jpg|jpeg|bmp|gif|png';  
				$config['max_size'] = 10024; 
				$config['file_name'] = $nmfile; 
				$this->upload->initialize($config);
			if($_FILES['file_banner']['size'] > 0)
			{	
				$this->upload->do_upload('file_banner');
				$filebanner = $this->upload->data();
				$data['file_banner'] = $filebanner['file_name'];
			}
			else
			{
				$data['file_banner'] = $this->input->post('file_banner_text');
			}
			
			$table="tbl_mbanner";
			$proses=$this->m_back_end->updateData($table,$data,$key);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Banner berhasil disimpan');
				redirect('web_content/banner');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Banner gagal disimpan');
				redirect('web_content/banner');
			}
	}
	
	function remove_banner()
	{
		$key['id_banner'] = $this->uri->segment(3);
		$data['file_banner'] = NULL;
		$data['editdate'] = date('Y-m-d H:i:s');
		$table="tbl_mbanner";
		$proses=$this->m_back_end->updateData($table,$data,$key);
		if ($proses == TRUE)
		{
			$this->session->set_flashdata('notif-sukses','File banner berhasil dihapus');
			redirect('web_content/banner');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','File banner gagal dihapus');
			redirect('web_content/banner');
		}	
	}
	
	function tentangkami()
	{
        $data=array(
            'title'=>'Banner',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_tentang_kami'=>$this->m_back_end->getAllData('tbl_mtentang_kami')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_tentang_kami');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function save_tentangkami()
	{
			$key['id_tentang_kami'] = $this->input->post('id_tentang_kami');
			$data['text_tentang_kami'] = $this->input->post('text_tentang_kami');
			$data['text_visi'] = $this->input->post('text_visi');
			$data['text_misi'] = $this->input->post('text_misi');
			$data['editdate'] = date('Y-m-d H:i:s');
			$table="tbl_mtentang_kami";
			$proses=$this->m_back_end->updateData($table,$data,$key);		 
			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Info Tentang Kami berhasil disimpan');
				redirect('web_content/tentangkami');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Info Tentang Kami gagal disimpan');
				redirect('web_content/tentangkami');
			}
	}
	
	function program()
	{
        $data=array(
            'title'=>'Banner',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_program'=>$this->m_back_end->getAllData('tbl_mprogram')->result()
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_program');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	
	function add_program()
	{	 
			$kode_program=$this->m_back_end->buatKodeProgram();
			$data['kode_program'] = $kode_program;
			$data['nama_program'] = $this->input->post('nama_program');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['biaya'] = $this->input->post('biaya');
			$data['isactive'] = $this->input->post('isactive');
			$data['createdate'] = date('Y-m-d H:i:s');
			$table="tbl_mprogram";
			$proses=$this->m_back_end->insertData($table,$data);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Program berhasil ditambahkan');
				redirect('web_content/program');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Program gagal ditambahkan');
				redirect('web_content/program');
			}
	}
	
	function save_program()
	{	 
			$key['id_program'] = $this->input->post('id_program');
			$data['nama_program'] = $this->input->post('nama_program');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['biaya'] = $this->input->post('biaya');
			$data['isactive'] = $this->input->post('isactive');
			$data['editdate'] = date('Y-m-d H:i:s');
			$table="tbl_mprogram";
			$proses=$this->m_back_end->updateData($table,$data,$key);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Program berhasil dirubah');
				redirect('web_content/program');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Program gagal dirubah');
				redirect('web_content/program');
			}
	}
	
	function blog()
	{
        $data=array(
            'title'=>'Banner',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_blog'=>$this->m_back_end->getAllData('tbl_mblog')->result()
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_blog');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	
	function add_blog()
	{	 
			$data['judul_blog'] = $this->input->post('judul_blog');
			$data['deskripsi_blog'] = $this->input->post('deskripsi_blog');
			$data['alamat_blog'] = $this->input->post('alamat_blog');
			$data['isactive'] = $this->input->post('isactive');
			$data['createdate'] = date('Y-m-d H:i:s');
			$table="tbl_mblog";
			$proses=$this->m_back_end->insertData($table,$data);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Blog berhasil ditambahkan');
				redirect('web_content/blog');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Blog gagal ditambahkan');
				redirect('web_content/blog');
			}
	}
	
	function save_blog()
	{	 
			$key['id_blog'] = $this->input->post('id_blog');
			$data['judul_blog'] = $this->input->post('judul_blog');
			$data['deskripsi_blog'] = $this->input->post('deskripsi_blog');
			$data['alamat_blog'] = $this->input->post('alamat_blog');
			$data['isactive'] = $this->input->post('isactive');
			$data['editdate'] = date('Y-m-d H:i:s');
			$table="tbl_mblog";
			$proses=$this->m_back_end->updateData($table,$data,$key);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Blog berhasil dirubah');
				redirect('web_content/blog');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Blog gagal dirubah');
				redirect('web_content/blog');
			}
	}
	
	function galeri()
	{
        $data=array(
            'title'=>'Banner',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_galeri'=>$this->m_back_end->getAllData('tbl_mgaleri')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_galeri');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	
	function add_galeri()
	{	 
			$data['tipe_galeri'] = $this->input->post('tipe_galeri');
			$data['nama_galeri'] = $this->input->post('nama_galeri');
			$data['deskripsi_galeri'] = $this->input->post('deskripsi_galeri');
			$data['isactive'] = $this->input->post('isactive');
			$data['createdate'] = date('Y-m-d H:i:s');
			//fungsi upload file preview
			$nmfilepreview = $this->input->post('nama_galeri').date('Y-m-d H:i:s');  
			$configpreview['upload_path'] = 'assets/frontend/galeri'; 
			$configpreview['allowed_types'] = 'jpg|jpeg|bmp|gif|png';  
			$configpreview['max_size'] = 10024; 
	 		$configpreview['file_name'] = $nmfilepreview; 
			$this->upload->initialize($configpreview);
			if ($this->upload->do_upload('file_preview'))
			{ 
				$filepreview = $this->upload->data();
				$data['file_preview'] = $filepreview['file_name'];
				
				//fungsi upload file galeri
				$nmfilegaleri = "g".$this->input->post('nama_galeri').date('Y-m-d H:i:s');  
				$configgaleri['upload_path'] = 'assets/frontend/galeri'; 
				$configgaleri['allowed_types'] = 'jpg|jpeg|bmp|gif|png|mp4|wmv|pdf';  
				$configgaleri['max_size'] = 50024; 
				$configgaleri['file_name'] = $nmfilegaleri; 
				$this->upload->initialize($configgaleri);
				if ($this->upload->do_upload('file_galeri'))
				{
				$filegaleri = $this->upload->data();
				$data['file_galeri'] = $filegaleri['file_name'];
				}	 
				else
				{
					$this->session->set_flashdata('notif-gagal','File galeri gagal ditambahkan');
					$data['file_galeri'] = NULL;
				}
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','File gagal ditambahkan');
				$data['file_preview'] = NULL;
			}
			$table="tbl_mgaleri";
			$proses=$this->m_back_end->insertData($table,$data);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Galeri berhasil ditambahkan');
				redirect('web_content/galeri');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Galeri gagal ditambahkan');
				redirect('web_content/galeri');
			}
	}
	
	function save_galeri()
	{
			$key['id_galeri'] = $this->input->post('id_galeri');
			$data['tipe_galeri'] = $this->input->post('tipe_galeri');
			$data['nama_galeri'] = $this->input->post('nama_galeri');
			$data['deskripsi_galeri'] = $this->input->post('deskripsi_galeri');
			$data['isactive'] = $this->input->post('isactive');
			$data['createdate'] = date('Y-m-d H:i:s');
			//fungsi upload file preview
			$nmfilepreview = $this->input->post('nama_galeri').date('Y-m-d H:i:s');  
			$configpreview['upload_path'] = 'assets/frontend/galeri'; 
			$configpreview['allowed_types'] = 'jpg|jpeg|bmp|gif|png';  
			$configpreview['max_size'] = 10024; 
	 		$configpreview['file_name'] = $nmfilepreview; 
			$this->upload->initialize($configpreview);
			
			if($_FILES['file_preview']['size'] > 0)
			{	
				if ($this->upload->do_upload('file_preview'))
				{ 
					$filepreview = $this->upload->data();
					$data['file_preview'] = $filepreview['file_name'];
					
					//fungsi upload file galeri
					$nmfilegaleri = "g".$this->input->post('nama_galeri').date('Y-m-d H:i:s');  
					$configgaleri['upload_path'] = 'assets/frontend/galeri'; 
					$configgaleri['allowed_types'] = 'jpg|jpeg|bmp|gif|png|mp4|wmv|pdf';  
					$configgaleri['max_size'] = 50024; 
					$configgaleri['file_name'] = $nmfilegaleri; 
					$this->upload->initialize($configgaleri);
					if($_FILES['file_galeri']['size'] > 0)
					{	
						if ($this->upload->do_upload('file_galeri'))
						{
						$filegaleri = $this->upload->data();
						$data['file_galeri'] = $filegaleri['file_name'];
						}	 
						else
						{
							$this->session->set_flashdata('notif-gagal','File galeri gagal ditambahkan');
							$data['file_galeri'] = $this->input->post('file_galeri_text');
						}	
					}			
					else
					{
						$data['file_galeri'] = $this->input->post('file_galeri_text');
					}
				}
				else
				{
					$this->session->set_flashdata('notif-gagal','File gagal ditambahkan');
					$data['file_preview'] = $this->input->post('file_preview_text');
				}
			}
			else
			{
				$data['file_preview'] = $this->input->post('file_preview_text');
			}
			$table="tbl_mgaleri";
			$proses=$this->m_back_end->updateData($table,$data,$key);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Galeri berhasil ditambahkan');
				redirect('web_content/galeri');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Galeri gagal ditambahkan');
				redirect('web_content/galeri');
			}
	}
	
	function hubungikami()
	{
        $data=array(
            'title'=>'Banner',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_hubungi_kami'=>$this->m_back_end->getAllData('tbl_mhubungi_kami')->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/admin/v_hubungi_kami');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function save_hubungikami()
	{
			$key['id_hubungi_kami'] = $this->input->post('id_hubungi_kami');
			$data['alamat'] = $this->input->post('alamat');
			$data['no_telepon'] = $this->input->post('no_telepon');
			$data['email'] = $this->input->post('email');
			$data['maps'] = $this->input->post('maps');
			$data['facebook'] = $this->input->post('facebook');
			$data['twitter'] = $this->input->post('twitter');
			$data['googleplus'] = $this->input->post('googleplus');
			$data['linkedin'] = $this->input->post('linkedin');
			$data['editdate'] = date('Y-m-d H:i:s');
			$table="tbl_mhubungi_kami";
			$proses=$this->m_back_end->updateData($table,$data,$key);		 
			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Info Hubungi Kami berhasil disimpan');
				redirect('web_content/hubungikami');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Info Hubungi Kami gagal disimpan');
				redirect('web_content/hubungikami');
			}
	}
	
}
