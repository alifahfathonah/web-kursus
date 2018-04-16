<?php
class m_front_end extends CI_Model {
	
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
    function buatKodeSiswa()
		{
		    $q = $this->db->query("select MAX(RIGHT(kode_siswa,9)) as kd_max from tbl_msiswa");
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
		    return "S".$kd;
		} 
}
?>
