<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_About extends CI_Model
{
	public function get_listproduk()
	{
		$sql = "SELECT * FROM `tbl_produk` ORDER BY id_produk DESC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_produk"=>$dt->id_produk,
				"nama_produk"=>$dt->nama_produk,
				"isi_produk"=>$dt->isi_produk
			
			);
			$i++;
		}
		return $data_list;
	}
	
	public function tambah_produk($nama_produk, $isi_produk, $target_file)
	{
		$sql = "INSERT INTO `tbl_produk`(`nama_produk`, `isi_produk`) VALUES ('$nama_produk','$isi_produk','$target_file')";
		$query = $this->db->query($sql);
	}
	
	public function search_produk($id_produk)
	{
		$sql = "SELECT * FROM `tbl_produk` WHERE id_produk='$id_produk'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function ubah_produk($id_produk, $nama_produk, $isi_produk, $target_file)
	{
		if($target_file!="-"){
			$sql	= "UPDATE `tbl_produk` SET `nama_produk`='$nama_produk',`isi_produk`='$isi_produk' WHERE `id_produk`='$id_produk'";
			$query	= $this->db->query($sql);
		}else{
			$sql	= "UPDATE `tbl_produk` SET `nama_produk`='$nama_produk',`isi_produk`='$isi_produk' WHERE `id_produk`='$id_produk'";
			$query	= $this->db->query($sql);
		}
	}
	
	public function delete_produk($id_produk)
	{
		$sql = "DELETE FROM `tbl_produk` WHERE `id_produk`='$id_produk'";
		$query = $this->db->query($sql);
	}
	
}
?>