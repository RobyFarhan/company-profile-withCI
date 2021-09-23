<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');
		$this->load->model('M_Artikel');
	

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "telah_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}

	public function index()
	{
		// hitung jumlah artikel
		$data['jumlah_artikel'] = $this->m_data->get_data('tbl_artikel')->num_rows();
		// hitung jumlah pengguna
		$data['jumlah_pengguna'] = $this->m_data->get_data('m_user')->num_rows();

		$this->load->view('v_admin_header');
		$this->load->view('v_dashboard', $data);
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}

	// CRUD ARTIKEL
	public function Artikel()
	{	
		//load library pagination
		$this->load->library('pagination');
		
		//konfigurasi
		$config['base_url'] = 'http://localhost/peka/dashboard/artikel';
		$config['total_rows'] = $this->M_Artikel->countAllArticles();
		$config['per_page'] = 3;
		
		//inisialisasi
		$this->pagination->initialize($config);
	
		$list_artikel	= $this->M_Artikel->getAllArticles(3,0);

		$data_hal = array(
			"list_artikel" => $list_artikel //"list_artikel" disini maksudnya yang ada di views
		);

		$this->load->view('v_admin_header');
		$this->load->view('v_artikel_list', $data_hal);
	}
	
	public function add_artikel()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_artikel_add');
	}

	public function artikel_add()
	{
		$judul_artikel	= htmlentities(addslashes(strtoupper($this->input->post('judul'))));
		$isi_artikel	= htmlentities(addslashes($this->input->post('deskripsi')));
		$cover			= htmlentities(addslashes(strtolower(basename($_FILES["cover"]["name"]))));
		$date_now		= date("YmdHis");
		$create_date	= date('Y-m-d H:i:s');

		if ($cover) {
			$file_type		= strtolower(pathinfo($cover, PATHINFO_EXTENSION));

			if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
				echo "<script type='text/javascript'>alert('Maaf File Anda Bukan JPG, JPEG, PNG & GIF !!!')</script>";
				echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/add_artikel';</script>";
				exit();
			} else {
				$file_sz		= $_FILES['cover']['size'];

				if ($file_sz > 8192000) { //file size tidak boleh lebih dari 8 MB (8192 Kb)
					echo "<script type='text/javascript'>alert('File Terlalu Besar!!!')</script>";
					echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/add_artikel';</script>";
					exit();
				} elseif ($file_sz < 1024) { //file size tidak boleh kurang dari 0,001 MB (1 Kb)
					echo "<script type='text/javascript'>alert('File Terlalu Kecil!!!')</script>";
					echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/add_artikel';</script>";
					exit();
				} else {
					$file_tmp		= $_FILES['cover']['tmp_name'];

					$namafile		= 'artikel_' . $date_now; //untuk buat namafile cover yang baru
					$file_name		= $namafile . '.' . $file_type;

					$target_dir		= "uploads/artikel/"; //lokasi tempat gambar disimpan
					$target_file	= $target_dir . '' . $file_name;

					if (move_uploaded_file($file_tmp, $target_file)) {
						$add = $this->M_Artikel->tambah_artikel($judul_artikel, $isi_artikel, $target_file, $create_date);

						echo "<script type='text/javascript'>alert('File Berhasil di Upload dan di Simpan!!!')</script>";
						echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_artikel';</script>";
					}
				}
			}
		} else {
			echo "<script type='text/javascript'>alert('Gagal, Foto Tidak Ada!!!')</script>";
			echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_artikel';</script>";
			exit();
		}
	}

	public function edit_artikel($id = false)
	{
		$id_artikel	= addslashes($id);
		$list_edit	= $this->M_Artikel->search_artikel($id_artikel);

		$data_hal = array( //ARRAY MENYIMPAN BEBERAPA ELEMEN DALAM SATU VARIABEL
			"dt_edit" => $list_edit
		);

		$this->load->view('v_admin_header');
		$this->load->view('v_artikel_edit', $data_hal);
	}

	public function update_artikel()
	{
		$id_artikel		= htmlentities(addslashes($this->input->post('artikel_id'))); //artikel_id NAME dari V_ARTIKEL-EDIT
		$judul_artikel	= htmlentities(addslashes(strtoupper($this->input->post('judul'))));
		$isi_artikel	= htmlentities(addslashes($this->input->post('deskripsi')));
		$cover			= htmlentities(addslashes(strtolower(basename($_FILES["cover"]["name"]))));
		$date_now		= date("YmdHis");
		$create_date	= date('Y-m-d H:i:s');

		$data_artikel	= $this->M_Artikel->search_artikel($id_artikel); //pastikan id artikel terdaftar dulu

		if ($data_artikel) {
			if ($cover == "") {
				$target_file = "-";
				$update = $this->M_Artikel->ubah_artikel($id_artikel, $judul_artikel, $isi_artikel, $target_file, $create_date);

				echo "<script type='text/javascript'>alert('Sukses, Data Artikel Berhasil Di Perbarui!!!')</script>";
				echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_artikel';</script>";
			} else {
				$file_type		= strtolower(pathinfo($cover, PATHINFO_EXTENSION));

				if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
					echo "<script type='text/javascript'>alert('Maaf File Anda Bukan JPG, JPEG, PNG & GIF !!!')</script>";
					echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/edit_artikel/" . $id_artikel . "';</script>";
					exit();
				} else {
					$file_sz	= $_FILES['cover']['size'];

					if ($file_sz > 8192000) { //file size tidak boleh lebih dari 8 MB (8192 Kb)
						echo "<script type='text/javascript'>alert('File Terlalu Besar!!!')</script>";
						echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/edit_artikel/" . $id_artikel . "';</script>";
						exit();
					} elseif ($file_sz < 1024) { //file size tidak boleh kurang dari 0,001 MB (1 Kb)
						echo "<script type='text/javascript'>alert('File Terlalu Kecil!!!')</script>";
						echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/edit_artikel/" . $id_artikel . "';</script>";
						exit();
					} else {
						$file_tmp		= $_FILES['cover']['tmp_name'];

						$namafile		= 'artikel_' . $date_now; //untuk buat namafile cover yang baru
						$file_name		= $namafile . '.' . $file_type;

						$target_dir		= "uploads/artikel/";
						$target_file	= $target_dir . '' . $file_name;

						if (move_uploaded_file($file_tmp, $target_file)) {
							$update = $this->M_Artikel->ubah_artikel($id_artikel, $judul_artikel, $isi_artikel, $target_file, $create_date);

							echo "<script type='text/javascript'>alert('File Berhasil di Upload dan di Simpan!!!')</script>";
							echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_artikel';</script>";
						}
					}
				}
			}
		} else {
			echo "<script type='text/javascript'>alert('Data Artikel Tidak Terdaftar!!!')</script>";
			echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_artikel';</script>";
			exit();
		}
	}

	public function view_artikel($id = false)
	{
		$id_artikel	= addslashes($id);
		$list_view	= $this->M_Artikel->search_artikel($id_artikel);

		$data_hal = array(
			"dt_view" => $list_view
		);
		$this->load->view('v_header');
		$this->load->view('v_artikel_view', $data_hal);
	}

	public function delete_artikel($id = false)
	{
		$id_artikel		= addslashes($id);
		$cari_artikel	= $this->M_Artikel->search_artikel($id_artikel);

		if ($cari_artikel) {
			$delete_data		= $this->M_Artikel->delete_artikel($id_artikel);

			echo "<script type='text/javascript'>alert('Data Artikel Berhasil Terhapus!!!')</script>";
			echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_artikel';</script>";
			exit();
		} else {
			echo "<script type='text/javascript'>alert('Data Artikel Tidak Terdaftar!!!')</script>";
			echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_artikel';</script>";
			exit();
		}
	}
	
	// CRUD PROFIL
	public function profil()
	{
		$list_artikel	= $this->M_Profil->get_profil();

		$data_hal = array(
			"list_profil" => $list_profil
		);

		$this->load->view('v_admin_header');
		$this->load->view('v_profil', $data_hal);
	}
	public function list_profil()
	{
		$list_artikel	= $this->M_Profil->get_profil();

		$data_hal = array(
			"list_profil" => $list_profil
		);

		$this->load->view('v_admin_header');
		$this->load->view('v_profil', $data_hal);
	}

	public function edit_profil($id = false)
	{
		$id_artikel	= addslashes($id);
		$list_edit	= $this->M_Profil->search_profil($id_profil);

		$data_hal = array( //ARRAY MENYIMPAN BEBERAPA ELEMEN DALAM SATU VARIABEL
			"dt_edit" => $list_edit
		);

		$this->load->view('v_admin_header');
		$this->load->view('v_profil_edit', $data_hal);
	}

	public function update_profil()
	{
		$id_profil		= htmlentities(addslashes($this->input->post('artikel_id'))); //artikel_id NAME dari V_ARTIKEL-EDIT
		$judul			= htmlentities(addslashes(strtoupper($this->input->post('judul'))));
		$cover			= htmlentities(addslashes(strtolower(basename($_FILES["cover"]["name"]))));
		$isi_profil		= htmlentities(addslashes($this->input->post('deskripsi')));
		$date_now		= date("YmdHis");
		$create_date	= date('Y-m-d H:i:s');

		$data_profil	= $this->M_Profil->search_profil($id_profil); //pastikan id artikel terdaftar dulu

		if ($data_profil) {
			if ($cover == "") {
				$target_file = "-";
				$update = $this->M_Profil->ubah_profil($id_profil, $judul_profil, $isi_profil, $target_file, $create_date);

				echo "<script type='text/javascript'>alert('Sukses, Profil Berhasil Di Perbarui!!!')</script>";
				echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_profil';</script>";
			} else {
				$file_type		= strtolower(pathinfo($cover, PATHINFO_EXTENSION));

				if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
					echo "<script type='text/javascript'>alert('Maaf File Anda Bukan JPG, JPEG, PNG & GIF !!!')</script>";
					echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/edit_profil/" . $id_profil . "';</script>";
					exit();
				} else {
					$file_sz	= $_FILES['cover']['size'];

					if ($file_sz > 8192000) { //file size tidak boleh lebih dari 8 MB (8192 Kb)
						echo "<script type='text/javascript'>alert('File Terlalu Besar!!!')</script>";
						echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/edit_profil/" . $id_profil . "';</script>";
						exit();
					} elseif ($file_sz < 1024) { //file size tidak boleh kurang dari 0,001 MB (1 Kb)
						echo "<script type='text/javascript'>alert('File Terlalu Kecil!!!')</script>";
						echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/edit_profil/" . $id_profil . "';</script>";
						exit();
					} else {
						$file_tmp		= $_FILES['cover']['tmp_name'];

						$namafile		= 'profil_' . $date_now; //untuk buat namafile cover yang baru
						$file_name		= $namafile . '.' . $file_type;

						$target_dir		= "uploads/profil/";
						$target_file	= $target_dir . '' . $file_name;

						if (move_uploaded_file($file_tmp, $target_file)) {
							$update = $this->M_Profil->ubah_profil($id_profil, $judul_profil, $isi_profil, $target_file, $create_date);

							echo "<script type='text/javascript'>alert('File Berhasil di Upload dan di Simpan!!!')</script>";
							echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_profil';</script>";
						}
					}
				}
			}
		} else {
			echo "<script type='text/javascript'>alert('Data Artikel Tidak Terdaftar!!!')</script>";
			echo "<script type='text/javascript'>window.location='" . base_url() . "Dashboard/list_profil';</script>";
			exit();
		}
	}

	public function view_profil($id = false)
	{
		$id_artikel	= addslashes($id);
		$list_view	= $this->M_Profil->search_profil($id_profil);

		$data_hal = array(
			"dt_view" => $list_view
		);
		$this->load->view('v_header');
		$this->load->view('v_profil', $data_hal);
	}

	public function ganti_password()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_ganti_password');
	}

	public function ganti_password_aksi()
	{

		// form validasi
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

		// cek validasi
		if ($this->form_validation->run() != false) {

			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');

			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'id' => $this->session->userdata('id'),
				'password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('m_user', $where)->num_rows();

			// cek kesesuaikan password lama
			if ($cek > 0) {

				// update data password pengguna
				$w = array(
					'id' => $this->session->userdata('id')
				);
				$data = array(
					'password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'm_user');

				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			} else {
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}
		} else {
			$this->load->view('v_admin_header');
			$this->load->view('v_ganti_password');;
		}
	}
}

