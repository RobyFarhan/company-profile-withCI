<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Master extends CI_Model
{
	public function get_listroleall()
	{
		$sql = "SELECT * FROM `m_role`
				ORDER BY id_role ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_role"=>$dt->id_role,
				"nm_role"=>$dt->nm_role,
				"kd_role"=>$dt->kd_role,
				"is_superuser"=>$dt->is_superuser,
				"status_role"=>$dt->status_role
			);
			$i++;
		}
		return $data_list;
	}
	
	public function get_listroleon()
	{
		$sql = "SELECT * FROM `m_role`
				WHERE status_role='1'
				ORDER BY id_role ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_role"=>$dt->id_role,
				"nm_role"=>$dt->nm_role,
				"kd_role"=>$dt->kd_role,
				"is_superuser"=>$dt->is_superuser,
				"status_role"=>$dt->status_role
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_levelrole($id_role)
	{
		$sql = "SELECT * FROM `m_role` WHERE id_role='$id_role'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function get_listprovinsiall()
	{
		$sql = "SELECT * FROM `m_provinsi` ORDER BY kd_provinsi ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"kd_provinsi"=>$dt->kd_provinsi,
				"nm_provinsi"=>$dt->nm_provinsi
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_provinsi($id)
	{
		$sql = "SELECT * FROM `m_provinsi` WHERE kd_provinsi='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function tambah_provinsi($kd_provinsi, $nm_provinsi)
	{
		$sql = "INSERT INTO `m_provinsi`(`kd_provinsi`, `nm_provinsi`) VALUES ('$kd_provinsi', '$nm_provinsi')";
		$query = $this->db->query($sql);
	}
	
	public function update_provinsi($kd_provinsi, $nm_provinsi)
	{
		$sql = "UPDATE `m_provinsi` SET `nm_provinsi`='$nm_provinsi' WHERE `kd_provinsi`='$kd_provinsi'";
		$query = $this->db->query($sql);
	}
	
	public function get_listkotaall()
	{
		$sql = "SELECT * FROM `m_kota`
				LEFT JOIN `m_provinsi` ON m_kota.kd_provinsi = m_provinsi.kd_provinsi
				ORDER BY m_kota.kd_provinsi ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"kd_kota"=>$dt->kd_kota,
				"nm_kota"=>$dt->nm_kota,
				"kd_provinsi"=>$dt->kd_provinsi,
				"nm_provinsi"=>$dt->nm_provinsi
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_kota($id)
	{
		$sql = "SELECT * FROM `m_kota`
				LEFT JOIN `m_provinsi` ON m_kota.kd_provinsi = m_provinsi.kd_provinsi
				WHERE kd_kota='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function tambah_kota($kd_provinsi, $kd_kota, $nm_kota)
	{
		$sql = "INSERT INTO `m_kota`(`kd_kota`, `kd_provinsi`, `nm_kota`) VALUES ('$kd_kota', '$kd_provinsi', '$nm_kota')";
		$query = $this->db->query($sql);
	}
	
	public function update_kota($kd_provinsi, $kd_kota, $nm_kota)
	{
		$sql = "UPDATE `m_kota` SET `kd_provinsi`='$kd_provinsi',`nm_kota`='$nm_kota' WHERE `kd_kota`='$kd_kota'";
		$query = $this->db->query($sql);
	}
	
	public function search_listprovkota($id)
	{
		$sql = "SELECT * FROM `m_kota`
				LEFT JOIN `m_provinsi` ON m_kota.kd_provinsi = m_provinsi.kd_provinsi
				WHERE m_kota.kd_provinsi = '$id'
				ORDER BY m_kota.kd_kota ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function get_listcabang()
	{
		$sql = "SELECT * FROM `cabang` ORDER BY id ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id"=>$dt->id,
				"cbcab"=>$dt->cbcab,
				"cbnamc"=>$dt->cbnamc,
				"cbalm"=>$dt->cbalm,
				"cbkota"=>$dt->cbkota,
				"cbprop"=>$dt->cbprop,
				"cbpos"=>$dt->cbpos,
				"cbtelp"=>$dt->cbtelp,
				"cbfax"=>$dt->cbfax,
				"cbmail"=>$dt->cbmail,
				"cbint"=>$dt->cbint,
				"cbnama"=>$dt->cbnama,
				"cbnpwp"=>$dt->cbnpwp,
				"cbweb"=>$dt->cbweb,
				"status_cabang"=>$dt->status_cabang
			);
			$i++;
		}
		return $data_list;
	}
	
	public function get_listcabangon()
	{
		$sql = "SELECT * FROM `cabang` WHERE status_cabang = 1 ORDER BY cbcab ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id"=>$dt->id,
				"cbcab"=>$dt->cbcab,
				"cbnamc"=>$dt->cbnamc,
				"cbalm"=>$dt->cbalm,
				"cbkota"=>$dt->cbkota,
				"cbprop"=>$dt->cbprop,
				"cbpos"=>$dt->cbpos,
				"cbtelp"=>$dt->cbtelp,
				"cbfax"=>$dt->cbfax,
				"cbmail"=>$dt->cbmail,
				"cbint"=>$dt->cbint,
				"cbnama"=>$dt->cbnama,
				"cbnpwp"=>$dt->cbnpwp,
				"cbweb"=>$dt->cbweb,
				"status_cabang"=>$dt->status_cabang
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_cabang($cbcab)
	{
		$sql = "SELECT * FROM `cabang` WHERE cbcab='$cbcab'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function search_namacabang($cbnamc)
	{
		$sql = "SELECT * FROM `cabang` WHERE cbnamc='$cbnamc'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function search_cabang_detail($cbcab)
	{
		$sql = "SELECT * FROM `cabang`
				LEFT JOIN `m_provinsi` ON cabang.cbprop = m_provinsi.kd_provinsi
				LEFT JOIN `m_kota` ON cabang.cbkota = m_kota.kd_kota
				WHERE cabang.cbcab='$cbcab'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function tambah_cabang($cbcab, $cbpwkl, $cbint, $cbnamc, $cbalm, $cbalm2, $provinsi, $kota, $cbpos, $cbtelp, $cbfax, $cbmail, $cbweb, $cbnpwp, $cbnama, $cbau, $cbss, $cbak, $status, $create_date, $create_time)
	{
		$sql = "INSERT INTO `cabang`(`cbcab`, `cbpwkl`, `cbnamc`, `cbalm`, `cbalm2`, `cbkota`, `cbprop`, `cbpos`, `cbtelp`, `cbfax`, `cbnama`, `cbnpwp`, `cbmail`, `cbweb`, `cbint`, `cbau`, `cbss`, `cbak`, `tglentry`, `jamentry`, `status_cabang`) VALUES ('$cbcab', '$cbpwkl', '$cbnamc', '$cbalm', '$cbalm2', '$kota', '$provinsi', '$cbpos', '$cbtelp', '$cbfax', '$cbnama', '$cbnpwp', '$cbmail', '$cbweb', '$cbint', '$cbau', '$cbss', '$cbak', '$create_date', '$create_time', '$status')";
		$query = $this->db->query($sql);
	}
	
	public function update_cabang($id, $cbcab, $cbpwkl, $cbint, $cbnamc, $cbalm, $cbalm2, $provinsi, $kota, $cbpos, $cbtelp, $cbfax, $cbmail, $cbweb, $cbnpwp, $cbnama, $cbau, $cbss, $cbak, $status, $create_date, $create_time)
	{
		$sql = "UPDATE `cabang` SET `cbpwkl`='$cbpwkl',`cbnamc`='$cbnamc',`cbalm`='$cbalm',`cbalm2`='$cbalm2',`cbkota`='$kota',`cbprop`='$provinsi',`cbpos`='$cbpos',`cbtelp`='$cbtelp',`cbfax`='$cbfax',`cbnama`='$cbnama',`cbnpwp`='$cbnpwp',`cbmail`='$cbmail',`cbweb`='$cbweb',`cbint`='$cbint',`cbau`='$cbau',`cbss`='$cbss',`cbak`='$cbak',`tglentry`='$create_date',`jamentry`='$create_time',`status_cabang`='$status' WHERE `id`='$id' AND `cbcab`='$cbcab'";
		$query = $this->db->query($sql);
	}
	
	public function tambah_user($username, $email, $is_superuser, $full_name, $first_name, $last_name, $is_staff, $npwp, $nik, $sts, $cbcab, $id_role)
	{
		$sql = "UPDATE `arapi_user` SET `is_superuser`='$is_superuser', `full_name`='$full_name', `first_name`='$first_name', `last_name`='$last_name', `is_staff`='$is_staff', `npwp`='$npwp', `nik`='$nik', `sts`='$sts', `cbcab`='$cbcab', `id_role`='$id_role' WHERE `username`='$username' AND `email`='$email'";
		$query = $this->db->query($sql);
	}
	
	public function update_user($userid, $is_superuser, $username, $full_name, $first_name, $last_name, $email, $is_staff, $is_active, $npwp, $nik, $sts, $cbcab, $id_role)
	{
		$sql = "UPDATE `arapi_user` SET `is_superuser`='$is_superuser',`username`='$username',`full_name`='$full_name',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`is_staff`='$is_staff',`is_active`='$is_active',`npwp`='$npwp',`nik`='$nik',`sts`='$sts',`cbcab`='$cbcab', `id_role`='$id_role' WHERE `id`='$userid'";
		$query = $this->db->query($sql);
	}
	
	public function update_password($userid, $password_fix)
	{
		$sql = "UPDATE `arapi_user` SET `password`='$password_fix' WHERE `id`='$userid'";
		$query = $this->db->query($sql);
	}
	
	public function update_profile($userid, $username, $email)
	{
		$sql = "UPDATE `arapi_user` SET `username`='$username', `email`='$email' WHERE `id`='$userid'";
		$query = $this->db->query($sql);
	}
	
	public function get_listproduk_all()
	{
		$sql = "SELECT * FROM `m_product` ORDER BY id_product ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_product"=>$dt->id_product,
				"nm_product"=>$dt->nm_product,
				"kd_product"=>$dt->kd_product,
				"deskripsi_product"=>$dt->deskripsi_product,
				"cover_product"=>$dt->cover_product,
				"status_product"=>$dt->status_product
			);
			$i++;
		}
		return $data_list;
	}
	
	public function get_listjenisproduk_all()
	{
		$sql = "SELECT * FROM `m_product_sub`
				LEFT JOIN `m_product` ON m_product_sub.id_product = m_product.id_product
				ORDER BY m_product.id_product ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_product"=>$dt->id_product,
				"nm_product"=>$dt->nm_product,
				"kd_product"=>$dt->kd_product,
				"id_product_sub"=>$dt->id_product_sub,
				"nm_product_sub"=>$dt->nm_product_sub,
				"kd_product_sub"=>$dt->kd_product_sub,
				"deskripsi_product_sub"=>$dt->deskripsi_product_sub,
				"cover_product_sub"=>$dt->cover_product_sub,
				"status_product_sub"=>$dt->status_product_sub,
				"file"=>$dt->file
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_produk($id_edit)
	{
		$sql = "SELECT * FROM `m_product` WHERE id_product='$id_edit'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function update_product($id_edit, $nm_product, $kd_product, $desk_product, $target_file, $sts_product)
	{
		if($target_file!="-"){
			$sql	= "UPDATE `m_product` SET `nm_product`='$nm_product',`kd_product`='$kd_product',`deskripsi_product`='$desk_product',`cover_product`='$target_file', `status_product`='$sts_product' WHERE `id_product`='$id_edit'";
			$query	= $this->db->query($sql);
		}else{
			$sql	= "UPDATE `m_product` SET `nm_product`='$nm_product',`kd_product`='$kd_product',`deskripsi_product`='$desk_product', `status_product`='$sts_product' WHERE `id_product`='$id_edit'";
			$query	= $this->db->query($sql);
		}
	}
	
	public function tambah_product($nm_product, $kd_product, $desk_product, $target_file, $sts_product)
	{
		$sql = "INSERT INTO `m_product`(`nm_product`, `kd_product`, `deskripsi_product`, `cover_product`, `status_product`) VALUES ('$nm_product', '$kd_product', '$desk_product', '$target_file', '$sts_product')";
		$query = $this->db->query($sql);
	}
	
	public function search_jenisproduk($id_edit)
	{
		$sql = "SELECT * FROM `m_product`
				LEFT JOIN `m_product_sub` ON m_product.id_product = m_product_sub.id_product
				WHERE m_product_sub.id_product_sub='$id_edit'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function update_jenisproduct($id_edit, $id_product, $nm_product_sub, $kd_product_sub, $deskripsi_product_sub, $target_file_foto, $target_file_file, $status_product_sub)
	{
		if($target_file_foto != "-" && $target_file_file != "-"){
			$sql	= "UPDATE `m_product_sub` SET `id_product`='$id_product',`nm_product_sub`='$nm_product_sub',`kd_product_sub`='$kd_product_sub',`deskripsi_product_sub`='$deskripsi_product_sub',`cover_product_sub`='$target_file_foto',`status_product_sub`='$status_product_sub',`file`='$target_file_file'
						WHERE `id_product_sub`='$id_edit'";
			$query	= $this->db->query($sql);
		}elseif($target_file_file == "-" && $target_file_foto != "-"){
			$sql	= "UPDATE `m_product_sub` SET `id_product`='$id_product',`nm_product_sub`='$nm_product_sub',`kd_product_sub`='$kd_product_sub',`deskripsi_product_sub`='$deskripsi_product_sub',`cover_product_sub`='$target_file_foto',`status_product_sub`='$status_product_sub'
						WHERE `id_product_sub`='$id_edit'";
			$query	= $this->db->query($sql);
		}elseif($target_file_foto == "-" && $target_file_file != "-"){
			$sql	= "UPDATE `m_product_sub` SET `id_product`='$id_product',`nm_product_sub`='$nm_product_sub',`kd_product_sub`='$kd_product_sub',`deskripsi_product_sub`='$deskripsi_product_sub',`status_product_sub`='$status_product_sub',`file`='$target_file_file'
						WHERE `id_product_sub`='$id_edit'";
			$query	= $this->db->query($sql);
		}else{
			$sql	= "UPDATE `m_product_sub` SET `id_product`='$id_product',`nm_product_sub`='$nm_product_sub',`kd_product_sub`='$kd_product_sub',`deskripsi_product_sub`='		$deskripsi_product_sub',`status_product_sub`='$status_product_sub'
						WHERE `id_product_sub`='$id_edit'";
			$query	= $this->db->query($sql);
		}
	}
	
	public function tambah_jenisproduct($id_product, $nm_product_sub, $kd_product_sub, $deskripsi_product_sub, $target_file_foto, $target_file_file, $status_product_sub)
	{
		if($target_file_foto != "-" && $target_file_file != "-"){
			$sql = "INSERT INTO `m_product_sub`(`id_product`, `nm_product_sub`, `kd_product_sub`, `deskripsi_product_sub`, `cover_product_sub`, `status_product_sub`, `file`) VALUES ('$id_product','$nm_product_sub','$kd_product_sub','$deskripsi_product_sub','$target_file_foto','$status_product_sub','$target_file_file')";
			$query = $this->db->query($sql);
		}elseif($target_file_file == "-" && $target_file_foto != "-"){
			$sql = "INSERT INTO `m_product_sub`(`id_product`, `nm_product_sub`, `kd_product_sub`, `deskripsi_product_sub`, `cover_product_sub`, `status_product_sub`) VALUES ('$id_product','$nm_product_sub','$kd_product_sub','$deskripsi_product_sub','$target_file_foto','$status_product_sub')";
			$query = $this->db->query($sql);
		}elseif($target_file_foto == "-" && $target_file_file != "-"){
			$sql = "INSERT INTO `m_product_sub`(`id_product`, `nm_product_sub`, `kd_product_sub`, `deskripsi_product_sub`, `status_product_sub`, `file`) VALUES ('$id_product','$nm_product_sub','$kd_product_sub','$deskripsi_product_sub','$status_product_sub','$target_file_file')";
			$query = $this->db->query($sql);
		}else{
			$sql = "INSERT INTO `m_product_sub`(`id_product`, `nm_product_sub`, `kd_product_sub`, `deskripsi_product_sub`, `status_product_sub`) VALUES ('$id_product','$nm_product_sub','$kd_product_sub','$deskripsi_product_sub','$status_product_sub')";
			$query = $this->db->query($sql);
		}
	}
	
	public function get_listsppa()
	{
		$sql = "SELECT * FROM `arsppa` ORDER BY id asc";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id"=>$dt->id,
				"arno"=>$dt->arno,
				"arintsppa"=>$dt->arintsppa,
				"cbint"=>$dt->cbint
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_sppa($id)
	{
		$sql = "SELECT * FROM `arsppa`
				LEFT JOIN `cabang` ON arsppa.cbint = cabang.cbint
				WHERE arsppa.id='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function tambah_sppa($arno, $arintsppa, $cbint)
	{
		$sql = "INSERT INTO `arsppa`(`arno`, `arintsppa`, `cbint`) VALUES ('$arno','$arintsppa','$cbint')";
		$query = $this->db->query($sql);
	}
	
	public function update_sppa($id, $arno, $arintsppa, $cbint)
	{
		$sql	= "UPDATE `arsppa` SET `arno`='$arno',`arintsppa`='$arintsppa',`cbint`='$cbint' WHERE `id`='$id'";
		$query	= $this->db->query($sql);
	}
	
	public function get_listmedsos()
	{
		$sql = "SELECT * FROM `m_medsos` ORDER BY id_medsos asc";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_medsos"=>$dt->id_medsos,
				"nm_medsos"=>$dt->nm_medsos,
				"icon_medsos"=>$dt->icon_medsos,
				"keterangan"=>$dt->keterangan,
				"link_medsos"=>$dt->link_medsos,
				"link_frame"=>$dt->link_frame,
				"status_medsos"=>$dt->status_medsos
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_medsos($id)
	{
		$sql = "SELECT * FROM `m_medsos` WHERE id_medsos='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function tambah_medsos($nm_medsos, $icon_medsos, $keterangan, $link_medsos, $link_frame, $status_medsos)
	{
		$sql = "INSERT INTO `m_medsos`(`nm_medsos`, `icon_medsos`, `keterangan`, `link_medsos`, `link_frame`, `status_medsos`) VALUES ('$nm_medsos', '$icon_medsos', '$keterangan', '$link_medsos', '$link_frame', '$status_medsos')";
		$query	= $this->db->query($sql);
	}
	
	public function update_medsos($id, $nm_medsos, $icon_medsos, $keterangan, $link_medsos, $link_frame, $status_medsos)
	{
		$sql = "UPDATE `m_medsos` SET `nm_medsos`='$nm_medsos',`icon_medsos`='$icon_medsos',`keterangan`='$keterangan',`link_medsos`='$link_medsos',`link_frame`='$link_frame',`status_medsos`='$status_medsos' WHERE `id_medsos`='$id'";
		$query	= $this->db->query($sql);
	}
	
	public function get_listnoregastravel()
	{
		$sql = "SELECT * FROM `m_noregastravel`
				LEFT JOIN `cabang` ON m_noregastravel.cbcab = cabang.cbcab
				ORDER BY m_noregastravel.noreg_astravel ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"no"=>$dt->no,
				"noreg_astravel"=>$dt->noreg_astravel,
				"cbcab"=>$dt->cbcab,
				"cbnamc"=>$dt->cbnamc,
				"status"=>$dt->status,
				"create_date"=>$dt->create_date
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_idreg($id)
	{
		$sql = "SELECT * FROM `m_noregastravel`
				LEFT JOIN `cabang` ON m_noregastravel.cbcab = cabang.cbcab
				WHERE m_noregastravel.no='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function search_noreg($noreg)
	{
		$sql = "SELECT * FROM `m_noregastravel` WHERE noreg_astravel='$noreg'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function add_noreg($noreg, $cabang, $status, $create_date)
	{
		$sql = "INSERT INTO `m_noregastravel`(`noreg_astravel`, `cbcab`, `status`, `create_date`) VALUES ('$noreg', '$cabang', '$status', '$create_date')";
		$query	= $this->db->query($sql);
	}
	
	public function update_noreg($id, $noreg, $cabang, $status, $create_date)
	{
		$sql = "UPDATE `m_noregastravel` SET `cbcab`='$cabang',`status`='$status',`create_date`='$create_date' WHERE `no`='$id' AND `noreg_astravel`='$noreg'";
		$query	= $this->db->query($sql);
	}
	
	public function get_listbanner()
	{
		$sql = "SELECT * FROM `tbl_banner` t1 ORDER BY t1.id_banner DESC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_banner"=>$dt->id_banner,
				"cover"=>$dt->cover,
				"urutan"=>$dt->urutan,
				"status_banner"=>$dt->status_banner,
				"create_date"=>$dt->create_date,
				"update_date"=>$dt->update_date
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_banner($id)
	{
		$sql = "SELECT * FROM `tbl_banner` WHERE `id_banner`='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function cekno_banner($thnbln)
	{
		$sql = "SELECT * FROM `tbl_banner` WHERE create_date LIKE '$thnbln%' ORDER BY id_banner DESC LIMIT 1";
		$query = $this->db->query($sql);
		$data = $query->result();
		
		return $data;
	}
	
	public function tambah_banner($id, $target_file, $urutan, $status, $create_date)
	{
		$sql = "INSERT INTO `tbl_banner`(`id_banner`, `cover`, `status_banner`, `urutan`, `create_date`) VALUES ('$id', '$target_file', '$status', '$urutan', '$create_date')";
		$query = $this->db->query($sql);
	}
	
	public function update_banner($id, $target_file, $urutan, $status, $update_date)
	{
		$sql = "UPDATE `tbl_banner` SET `cover`='$target_file',`urutan`='$urutan',`status_banner`='$status',`update_date`='$update_date' WHERE `id_banner`='$id'";
		$query = $this->db->query($sql);
	}
	
	public function update_banner_nocover($id, $urutan, $status, $update_date)
	{
		$sql = "UPDATE `tbl_banner` SET `urutan`='$urutan',`status_banner`='$status',`update_date`='$update_date' WHERE `id_banner`='$id'";
		$query = $this->db->query($sql);
	}
	
	public function list_instansiastravel()
	{
		$sql = "SELECT * FROM `m_instansi` ORDER BY nm_instansi ASC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id_instansi"=>$dt->id_instansi,
				"nm_instansi"=>$dt->nm_instansi,
				"create_date"=>$dt->create_date,
				"update_date"=>$dt->update_date
			);
			$i++;
		}
		return $data_list;
	}
	
	public function tambah_instansi($nm_instansi, $create_date)
	{
		$sql = "INSERT INTO `m_instansi`(`nm_instansi`, `create_date`) VALUES ('$nm_instansi', '$create_date')";
		$query = $this->db->query($sql);
	}
	
	public function search_instansi($id)
	{
		$sql = "SELECT * FROM `m_instansi` WHERE `id_instansi`='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function update_instansi($id, $nm_instansi, $update_date)
	{
		$sql = "UPDATE `m_instansi` SET `nm_instansi`='$nm_instansi',`update_date`='$update_date' WHERE `id_instansi`='$id'";
		$query = $this->db->query($sql);
	}
	
	public function get_listanggaran()
	{
		$sql = "SELECT * FROM `anggaran_cbg`
				LEFT JOIN `cabang` ON anggaran_cbg.cbcab = cabang.cbcab
				ORDER BY anggaran_cbg.tahun DESC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id"=>$dt->id,
				"cbcab"=>$dt->cbcab,
				"cbnamc"=>$dt->cbnamc,
				"kode"=>$dt->kode,
				"tahun"=>$dt->tahun,
				"bulan"=>$dt->bulan,
				"anggaran"=>$dt->anggaran,
				"targetpremi"=>$dt->targetpremi,
				"anggaran1"=>$dt->anggaran1,
				"anggaran2"=>$dt->anggaran2,
				"target_asperdag"=>$dt->target_asperdag,
				"target_ak"=>$dt->target_ak,
				"target_ss"=>$dt->target_ss,
				"target_au"=>$dt->target_au,
				"target_sy"=>$dt->target_sy,
				"realisasi_anggaran"=>$dt->realisasi_anggaran,
				"create_date"=>$dt->create_date,
				"update_date"=>$dt->update_date
			);
			$i++;
		}
		return $data_list;
	}
	
	public function cari_anggaran($bulan, $tahun, $cbcab, $kode)
	{
		$sql = "SELECT * FROM `anggaran_cbg` WHERE `bulan`='$bulan' AND `tahun`='$tahun' AND `cbcab`='$cbcab' AND `kode`='$kode'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function tambah_anggaran($cbcab, $cabang, $kode, $tahun, $bulan, $anggaran, $targetpremi, $target_ae, $target_ak, $target_ss, $target_au, $target_sy, $realisasianggaran, $create_date, $userid)
	{
		$sql = "INSERT INTO `anggaran_cbg`(`cbcab`, `cbnamc`, `kode`, `tahun`, `bulan`, `anggaran`, `targetpremi`, `target_asperdag`, `target_ak`, `target_ss`, `target_au`, `target_sy`, `realisasi_anggaran`, `create_date`, `create_id`) VALUES ('$cbcab', '$cabang', '$kode', '$tahun', '$bulan', '$anggaran', '$targetpremi', '$target_ae', '$target_ak', '$target_ss', '$target_au', '$target_sy', '$realisasianggaran', '$create_date', '$userid')";
		$query = $this->db->query($sql);
	}
	
	public function update_anggaran($id, $cbcab, $cabang, $kode, $tahun, $bulan, $anggaran, $targetpremi, $target_ae, $target_ak, $target_ss, $target_au, $target_sy, $realisasianggaran, $create_date, $userid)
	{
		$sql = "UPDATE `anggaran_cbg` SET `cbcab`='$cbcab', `cbnamc`='$cabang', `kode`='$kode', `tahun`='$tahun', `bulan`='$bulan', `anggaran`='$anggaran', `targetpremi`='$targetpremi', `target_asperdag`='$target_ae', `target_ak`='$target_ak', `target_ss`='$target_ss', `target_au`='$target_au', `target_sy`='$target_sy', `realisasi_anggaran`='$realisasianggaran', `update_date`='$create_date', `update_id`='$userid' WHERE `id`='$id'";
		$query = $this->db->query($sql);
	}
	
	public function get_listgaleribdmd()
	{
		$sql = "SELECT * FROM `tbl_galeri_bdmd` t1 ORDER BY t1.id DESC";
		$query = $this->db->query($sql);
		$data = $query->result();
		$data_list=array();
		
		$i=1;
		foreach($data as $dt){
			$data_list[$i]=array(
				"id"=>$dt->id,
				"cover_foto"=>$dt->cover_foto,
				"status_foto"=>$dt->status_foto,
				"create_date"=>$dt->create_date,
				"create_user"=>$dt->create_user,
				"update_date"=>$dt->update_date,
				"update_user"=>$dt->update_user
			);
			$i++;
		}
		return $data_list;
	}
	
	public function search_galeribdmd($id)
	{
		$sql = "SELECT * FROM `tbl_galeri_bdmd` WHERE `id`='$id'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
	
	public function tambah_galeribdmd($target_file, $status, $create_date, $id_user)
	{
		$sql = "INSERT INTO `tbl_galeri_bdmd`(`cover_foto`, `status_foto`, `create_date`, `create_user`) VALUES ('$target_file', '$status', '$create_date', '$id_user')";
		$query = $this->db->query($sql);
	}
	
	public function update_galeribdmd($id, $target_file, $status, $update_date, $id_user)
	{
		$sql = "UPDATE `tbl_galeri_bdmd` SET `cover_foto`='$target_file',`status_foto`='$status',`update_date`='$update_date',`update_user`='$id_user' WHERE `id`='$id'";
		$query = $this->db->query($sql);
	}
	
	public function update_galeribdmd_nocover($id, $status, $update_date, $id_user)
	{
		$sql = "UPDATE `tbl_galeri_bdmd` SET `status_foto`='$status',`update_date`='$update_date',`update_user`='$id_user' WHERE `id`='$id'";
		$query = $this->db->query($sql);
	}
	
	
}

?>