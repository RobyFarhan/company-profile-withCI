<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Profil extends CI_Model
{
	public function get_profil()
	{
		$sql = "SELECT * FROM `tbl_profil_perusahaan` ORDER BY id_profil DESC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"profil_id"=>$dt->id_profil,
				"profil_judul"=>$dt->judul_profil,
				"profil_isi"=>$dt->isi_profil,
				"profil_tanggal"=>$dt->tanggal_profil
			
			);
			$i++;
		}
		return $data_list;
	}
	public function search_profil($profil_id)
	{
		$sql = "SELECT * FROM `tbl_profil_perusahaaan` WHERE profil_id='$profil_id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function ubah_profil($profil_id, $profil_judul, $profil_isi, $target_file, $profil_tanggal)
	{
		if($target_file!="-"){
			$sql	= "UPDATE `tbl_profil_perusahaan` SET `judul_profil`='$profil_judul',`isi_profil`='$profil_isi',`gambar_profil`='$target_file',`tanggal_profil`='$artikel_tanggal' WHERE `artikel_id`='$artikel_id'";
			$query	= $this->db->query($sql);
		}else{
			$sql	= "UPDATE `tbl_profil_perusahaaan` SET `judul_profil`='$profil_judul',`isi_profil`='$profil_isi',`tanggal_profil`='$profil_tanggal' WHERE `id_profil`='$profil_id'";
			$query	= $this->db->query($sql);
		}
	}
	
	public function delete_profil($profil_id)
	{
		$sql = "DELETE FROM `tbl_profil_perusahaaan` WHERE `id_profil`='$profil_id'";
		$query = $this->db->query($sql);
	}
}