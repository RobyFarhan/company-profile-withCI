<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Artikel extends CI_Model
{
	public function get_listartikel()
	{
		$sql = "SELECT * FROM `tbl_artikel` ORDER BY artikel_tanggal DESC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"artikel_id"=>$dt->artikel_id,
				"artikel_judul"=>$dt->artikel_judul,
				"artikel_isi"=>$dt->artikel_isi,
				"artikel_image"=>$dt->artikel_image,
				"artikel_tanggal"=>$dt->artikel_tanggal
			);
			$i++;
		}
		return $data_list;
	
	}
	
	public function getArticles() //tidak dipakai
	{
		return $this->db->get('tbl_artikel')->result_array();
	}
	
	public function getAllArticles($limit, $start) 
	{
		return $this->db->get('tbl_artikel',$limit, $start)->result_array();
	}
	
	public function countAllArticles() 
	{
		return $this->db->get('tbl_artikel')->num_rows();
	}
	
	public function tampil_data()
	{
		return $this->db->get('tbl_artikel');
	}
	
	public function tambah_artikel($artikel_judul, $artikel_isi, $target_file, $artikel_tanggal)
	{
		$sql = "INSERT INTO `tbl_artikel`(`artikel_judul`, `artikel_isi`, `artikel_image`, `artikel_tanggal`) VALUES ('$artikel_judul','$artikel_isi','$target_file','$artikel_tanggal')";
		$query = $this->db->query($sql);
	}
	
	public function search_artikel($artikel_id)
	{
		$sql = "SELECT * FROM `tbl_artikel` WHERE artikel_id='$artikel_id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function ubah_artikel($artikel_id, $artikel_judul, $artikel_isi, $target_file, $artikel_tanggal)
	{
		if($target_file!="-"){
			$sql	= "UPDATE `tbl_artikel` SET `artikel_judul`='$artikel_judul',`artikel_isi`='$artikel_isi',`artikel_image`='$target_file',`artikel_tanggal`='$artikel_tanggal' WHERE `artikel_id`='$artikel_id'";
			$query	= $this->db->query($sql);
		}else{
			$sql	= "UPDATE `tbl_artikel` SET `artikel_judul`='$artikel_judul',`artikel_isi`='$artikel_isi',`artikel_tanggal`='$artikel_tanggal' WHERE `artikel_id`='$artikel_id'";
			$query	= $this->db->query($sql);
		}
	}
	
	public function delete_artikel($artikel_id)
	{
		$sql = "DELETE FROM `tbl_artikel` WHERE `artikel_id`='$artikel_id'";
		$query = $this->db->query($sql);
	}
		
		
	
	
}

?>