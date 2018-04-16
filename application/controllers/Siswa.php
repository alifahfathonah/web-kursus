<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Siswa extends CI_Controller {
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
        $this->load->view('back_end/siswa/v_dashboard');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
    
	function program()
	{
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_program'=>$this->m_back_end->getAllDataProgram(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/siswa/v_program');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	
	function ambilprogram()
	{
		$kode_program=$this->uri->segment(3);
		$kode_siswa=$this->session->userdata('KODE_SISWA'); 
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_program'=>$this->m_back_end->getSelectedData('tbl_mprogram',array('kode_program'=>$kode_program))->result(),
            'data_siswa'=>$this->m_back_end->getSelectedData('tbl_msiswa',array('kode_siswa'=>$kode_siswa))->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/siswa/v_ambil_program');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function history()
	{
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_transaksi'=>$this->m_back_end->getAllDataHistoryTransaksi(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/siswa/v_transaksi');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	function myprofile()
	{
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_user'=>$this->m_back_end->getSelectedData('tbl_muser',array('id_user'=>$this->session->userdata('ID_USER')))->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/siswa/v_user');
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
			redirect('siswa/myprofile');
		}
		else
		{
			$this->session->set_flashdata('notif-gagal','Password gagal dirubah');
			redirect('siswa/myprofile');
		}

	}

	
	function save_transaction()
	{	 
			$payment_id=$this->m_back_end->buatKodeAmbilProgram();
			$data['payment_id'] = $payment_id;
			$data['payment_amount'] = $this->input->post('payment_amount');
			$data['id_siswa'] = $this->input->post('id_siswa');
			$data['id_program'] = $this->input->post('id_program');
			$data['nama_siswa'] = $this->input->post('nama_siswa');
			$data['nama_program'] = $this->input->post('nama_program');
			$data['tanggal_transaksi'] = date('Y-m-d H:i:s');
			$data['status_transaksi'] = "Pending";
			$data['createdate'] = date('Y-m-d H:i:s');
			$table="tbl_ttransaction";
			$proses=$this->m_back_end->insertData($table,$data);		 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Program berhasil diambil');
				redirect("siswa/komfirmasiambilprogram/$payment_id");
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Program gagal diambil');
				redirect("siswa/program");
			}
	}
	
	
	function komfirmasiambilprogram()
	{
		$payment_id=$this->uri->segment(3);
		$kode_siswa=$this->session->userdata('KODE_SISWA'); 
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
            'data_transaksi'=>$this->m_back_end->getSelectedData('tbl_ttransaction',array('payment_id'=>$payment_id,'id_siswa'=>$kode_siswa))->result(),
        ); 
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/siswa/v_konfirmasi_ambil_program');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
	
	
	
	function transaksiselesai()
	{
		$data['order_id']=$_GET['order_id'];
		$data['status_code']=$_GET['status_code'];
		$data['transaction_status']=$_GET['transaction_status'];
        $data=array(
            'title'=>'User',
            'web_config'=>$this->m_back_end->getAllData('tbl_mweb_config')->result(),
        ); 
        $payment_id=$_GET['order_id'];
        $status_transaksi=$_GET['transaction_status'];
		$key1['payment_id'] = $payment_id;
		$data1['status_transaksi'] = $status_transaksi;
		$data1['editdate'] = date('Y-m-d H:i:s');
		$table="tbl_ttransaction";
		$this->m_back_end->updateData($table,$data1,$key1);	
		
        $this->load->view('back_end/v_header',$data);
        $this->load->view('back_end/v_top_menu');
        $this->load->view('back_end/v_left_menu');
        $this->load->view('back_end/siswa/v_transaksi_selesai');
        $this->load->view('back_end/v_footer');
        $this->load->view('back_end/v_footer_file');
	}
}
