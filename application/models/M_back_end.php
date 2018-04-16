<?php
class m_back_end extends CI_Model {
	
	//Function untuk ambil semua data	
	public function getAllData($table)
    {
        return $this->db->get($table);
    }
	
	//Function untuk ambil selected data
	public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
	
	//Function untuk insert data
	function insertData($table,$data)
    {
        $query=$this->db->insert($table,$data);
        if($query) {
            return TRUE; //if query is true
        } else {
            return FALSE; //if query is wrong
        }
	} 
	
	//Function untuk update data
    function updateData($table,$data,$field_key)
    {
        $query=$this->db->update($table,$data,$field_key);
        if($query) {
            return TRUE; //if query is true
        } else {
            return FALSE; //if query is wrong
        }
    }
	
	
    //Function untuk create kode siswa
    function buatKodeProgram()
	{
		$q = $this->db->query("select MAX(RIGHT(kode_program,4)) as kd_max from tbl_mprogram");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%04s", $tmp);
			}
		}
		else
		{
			$kd = "0001";
		}
		return "PROG".$kd;
	} 
	
	 //Function untuk create kode siswa
    function buatKodeAmbilProgram()
	{
		$q = $this->db->query("select MAX(RIGHT(payment_id,9)) as kd_max from tbl_ttransaction");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%09s", $tmp);
			}
		}
		else
		{
			$kd = "000000001";
		}
		return "T".$kd;
	} 

	function getUser(){
	return $this->db->query("		
		select distinct
		a.nama_role,
		b.kode_siswa,b.id_user,b.username,b.level_role,b.isactive
			from  
			tbl_muserrole a 
			left join tbl_muser b on a.level_role=b.level_role
	")->result();	
	}
	
	function getAllDataTransaksi(){
	return $this->db->query("		
		select distinct
		a.id_transaction,a.payment_id,a.payment_amount,a.tanggal_transaksi,a.status_transaksi,
		b.nama as nama_siswa,
		c.nama_program
			from  
			tbl_ttransaction a 
			left join tbl_msiswa b on a.id_siswa=b.kode_siswa
			left join tbl_mprogram c on a.id_program=c.kode_program
	")->result();	
	}
	
	
	function getAllDataProgram(){
	return $this->db->query("		
		select * from tbl_mprogram order by id_program asc
	")->result();	
	}
	
	function getAllDataHistoryTransaksi(){
	$kode_siswa=$this->session->userdata('KODE_SISWA');
	return $this->db->query("		
		select distinct
		a.id_transaction,a.payment_id,a.payment_amount,a.tanggal_transaksi,a.status_transaksi,
		b.nama as nama_siswa,
		c.nama_program
			from  
			tbl_ttransaction a 
			left join tbl_msiswa b on a.id_siswa=b.kode_siswa
			left join tbl_mprogram c on a.id_program=c.kode_program
		where a.id_siswa ='".$kode_siswa."'
	")->result();	
	}
	
	/*
	function ambilProgram(){
		$kd_program = array();
		$kd_program = $this->uri->segment(3);
		$kode_siswa = $this->session->userdata('KODE_SISWA'); 
        return $this->db->query("select distinct
		a.kode_program,a.payment_id,a.payment_amount,a.tanggal_transaksi,a.status_transaksi,
		b.nama as nama_siswa,
		c.nama_program
			from  
			tbl_ttransaction a 
			left join tbl_msiswa b on a.id_siswa=b.kode_siswa
			left join tbl_mprogram c on a.id_program=c.kode_program
		where a.id_siswa ='".$kode_siswa."'
		")->result();;
    }	
    */
}
?>
