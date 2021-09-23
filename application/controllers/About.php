<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class About extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		//if($this->session->userdata('islogin')=='TurnOn'){
			//$this->load->model('M_Menu');
			//$this->load->model('M_Master');
			$this->load->model('M_About');
		//}
	}
	
	public function index()
	{
		$list_produk	= $this->M_About->get_listproduk();
		
		$data_hal = array (
			"list_produk" => $list_produk
		);
		$this->load->view('v_header');
		$this->load->view('v_about_list',$data_hal);
		$this->load->view('v_footer');
	}
	
	public function add_produk()
	{
		$this->load->view('v_about_add');
	}
	
		public function list_produk()
	{
		$list_produk	= $this->M_About->get_listproduk();
		
		$data_hal = array (
			"list_produk" => $list_produk
		);

		$this->load->view('v_about_list',$data_hal);
	}
	
	public function produk_add()
	{
		$nama_produk	= htmlentities(addslashes(strtoupper($this->input->post('nama produk'))));
		$isi_produk	= htmlentities(addslashes($this->input->post('deskripsi')));
		$create_date	= date('Y-m-d H:i:s');
		
		if(move_uploaded_file($file_tmp, $target_file)){
						$add = $this->M_About->tambah_produk($nama_produk, $isi_produk, $target_file);
						
						echo "<script type='text/javascript'>alert('Produk berhasil ditambahkan')</script>";
						echo "<script type='text/javascript'>window.location='".base_url()."About/list_produk';</script>";
					}else{
			echo "<script type='text/javascript'>alert('Produk gagal ditambahkan!!!')</script>";
			echo "<script type='text/javascript'>window.location='".base_url()."About/list_produk';</script>";
			exit();
		}
	}
	public function edit_produk($id=false)
	{
		$id_produk	= addslashes($id);
		$list_edit	= $this->M_About->search_produk($id_produk);
		
		$data_hal = array (
			"dt_edit" => $list_edit
		);
		
		$this->load->view('v_artikel_edit',$data_hal);
	}
	
		public function update_produk()
	{
		$id_produk		= htmlentities(addslashes($this->input->post('id_produk')));
		$nama_produk	= htmlentities(addslashes(strtoupper($this->input->post('nama_produk'))));
		$isi_produk	= htmlentities(addslashes($this->input->post('deskripsi')));
		//$cover			= htmlentities(addslashes(strtolower(basename($_FILES["cover"]["name"]))));
	
		
		/*$data_produk	= $this->M_About->search_produk($id_produk); //pastikan id produk terdaftar dulu
		
			if($data_produk){
			if($cover==""){
				$target_file = "-";
				$update = $this->M_About->ubah_artikel($id_produk, $nama_produk, $isi_produk, $target_file);
				
				echo "<script type='text/javascript'>alert('Sukses, Data Produk Berhasil Di Perbarui!!!')</script>";
				echo "<script type='text/javascript'>window.location='".base_url()."About/list_produk';</script>";
			}else{
				echo "<script type='text/javascript'>alert('Data Produk Tidak Diperbarui')</script>"; 
				//$file_type		= strtolower(pathinfo($cover,PATHINFO_EXTENSION));
		
				if(move_uploaded_file($file_tmp, $target_file)){
							$update = $this->M_About->ubah_produk($id_produk, $nama_produk, $isi_produk, $target_file);
							
							echo "<script type='text/javascript'>alert('File Berhasil di Upload dan di Simpan!!!')</script>";
							echo "<script type='text/javascript'>window.location='".base_url()."About/list_produk';</script>";
						}
					}
				}
			}
				else{
				echo "<script type='text/javascript'>alert('Data Produk Tidak Terdaftar!!!')</script>";
				echo "<script type='text/javascript'>window.location='".base_url()."About/list_produk';</script>";
				exit(); */
		}
		
	//}
	
	public function view_produk($id=false)
	{
		$id_produk	= addslashes($id);
		$list_view	= $this->M_About->search_produk($id_produk);
		
		$data_hal = array (
			"dt_view" => $list_view
		);
		
		$this->load->view('v_about_view',$data_hal);
	}
		
	public function delete_produk($id=false)
	{
		$id_produk	= addslashes($id);
		$cari_produk	= $this->M_Artikel->search_produk($id_produk);
		
		if($cari_aproduk){
			$delete_data		= $this->M_About->delete_produk($id_produk);
			
			echo "<script type='text/javascript'>alert('Data Produk Berhasil Terhapus!!!')</script>";
			echo "<script type='text/javascript'>window.location='".base_url()."About/list_produk';</script>";
			exit();
			
		}else{
			echo "<script type='text/javascript'>alert('Data Produk Tidak Terdaftar!!!')</script>";
			echo "<script type='text/javascript'>window.location='".base_url()."About/list_produk';</script>";
			exit();
		}
	}
		
}

