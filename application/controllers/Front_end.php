<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_end extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->model('m_front_end'); 
		$this->load->library('email');
		$data=array(); 
    }
	public function index()
	{
		//data-data dari database
		$data_banner=array('banner'=>$this->m_front_end->getSelectedData('tbl_mbanner',array('isactive'=>'1'))->result());
		$data_tentang_kami=array(
			'tentang_kami'=>$this->m_front_end->getAllData('tbl_mtentang_kami')->result(),
			'quotes'=>$this->m_front_end->getSelectedData('tbl_mquotes',array('isactive'=>'1'))->result(),
			'jumlah_program'=>$this->m_front_end->getSelectedData('tbl_mprogram',array('isactive'=>'1'))->num_rows(),
			'jumlah_siswa'=>$this->m_front_end->getSelectedData('tbl_msiswa',array('isactive'=>'1'))->num_rows(),
			'jumlah_pengajar'=>$this->m_front_end->getSelectedData('tbl_mpengajar',array('isactive'=>'1'))->num_rows()
		);
		$data_program=array('program'=>$this->m_front_end->getSelectedData('tbl_mprogram`',array('isactive'=>'1'))->result());
		$data_blog=array('blog'=>$this->m_front_end->getSelectedData('tbl_mblog',array('isactive'=>'1'))->result());
		$data_galeri=array('galeri'=>$this->m_front_end->getSelectedData('tbl_mgaleri',array('isactive'=>'1'))->result());
		$data_hubungi_kami=array('hubungi_kami'=>$this->m_front_end->getAllData('tbl_mhubungi_kami')->result());
		$data_web_config=array('web_config'=>$this->m_front_end->getAllData('tbl_mweb_config')->result());
		//data-data dari database
		
		$this->load->view('front_end/v_header',$data_web_config);
			//bisa dituker-tuker posisinya
			$this->load->view('front_end/v_banner',$data_banner);
			$this->load->view('front_end/v_tentang_kami',$data_tentang_kami);
			$this->load->view('front_end/v_program',$data_program);
			$this->load->view('front_end/v_blog',$data_blog);
			$this->load->view('front_end/v_galeri',$data_galeri);
			$this->load->view('front_end/v_daftar');
			$this->load->view('front_end/v_hubungi_kami',$data_hubungi_kami);
			//bisa dituker-tuker posisinya
		$this->load->view('front_end/v_footer');
	}
	
	function simpanpendaftaran()
	{			
		$cek_username=$this->m_front_end->getSelectedData('tbl_muser',array('username'=>$this->input->post('username')))->num_rows();
		if($cek_username>0)
		{
			$this->session->set_flashdata('notif-gagal-daftar','Username sudah terdaftar');
			redirect('');
		}
		else
		{
			$kode_siswa=$this->m_front_end->buatKodeSiswa();
			$datauser['kode_siswa'] = $kode_siswa;
			$datauser['username'] = $this->input->post('username');
			$datauser['password'] = MD5($this->input->post('password')); 
			$datauser['level_role'] = 3;
			$datauser['isactive'] = '1';
			$datauser['createdate'] = date('Y-m-d H:i:s'); 
			$tableuser="tbl_muser";
			$prosesuser=$this->m_front_end->insertData($tableuser,$datauser);
			if ($prosesuser == TRUE)
			{
				$datasiswa['kode_siswa'] = $kode_siswa;
				$datasiswa['nama'] = $this->input->post('nama');
				$datasiswa['alamat'] = $this->input->post('alamat');
				$datasiswa['jenis_kelamin'] = $this->input->post('jenis_kelamin');
				$datasiswa['no_telepon'] = $this->input->post('no_telepon');
				$datasiswa['tanggal_lahir'] = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
				$datasiswa['email'] = $this->input->post('email'); 
				$datasiswa['isactive'] = '1';
				$datasiswa['createdate'] = date('Y-m-d H:i:s'); 
				$tablesiswa="tbl_msiswa";
				$proses=$this->m_front_end->insertData($tablesiswa,$datasiswa);
				if ($proses == TRUE)
				{
					//fungsi kirim email
					$data_confi_email=$this->m_front_end->getAllData('tbl_mconfigemail')->result();
					foreach($data_confi_email as $data_email){
					$email=$data_email->email;
					$password_email=$data_email->password;
					}
					$config = array();
					$config['charset'] = 'utf-8';
					$config['useragent'] = 'sendmail';
					$config['protocol']= "smtp";
					$config['mailtype']= "html";
					$config['smtp_host']="ssl://smtp.gmail.com";//pengaturan smtp
					$config['smtp_port']= "465";//atau587
					$config['smtp_timeout']= "400";
					$config['smtp_user']= $email; // isi dengan email kamu
					$config['smtp_pass']= $password_email; // isi dengan password kamu
					$config['crlf']="\r\n"; 
					$config['newline']="\r\n"; 
					$config['wordwrap'] = TRUE;
					//memanggil library email dan set konfigurasi untuk pengiriman email
					$this->email->initialize($config);
					//konfigurasi pengiriman
					$emailto=$this->input->post('email');
					$this->email->from($config['smtp_user']);
					$this->email->to($emailto);
					$this->email->subject("Pendaftaran Kursus Red And White");
					$this->email->message("Hallo, ".$this->input->post('nama').". <br><br> Selamat bergabung di red and white"); 
					$this->email->send();
					//fungsi kirim email
					
					$this->session->set_flashdata('notif-sukses-daftar','Pendaftaran berhasil');
					redirect('');
				}
				else
				{
					$this->session->set_flashdata('notif-gagal-daftar','Proses pendaftaran gagal.');
					redirect('');
				}
			}
			else
			{
				$this->session->set_flashdata('notif-gagal-daftar','Proses pendaftaran gagal.');
				redirect('');
			}
		}	
	}
		
}
