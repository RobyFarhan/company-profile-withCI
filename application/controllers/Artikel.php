<!--
	print_r($data_artikel); exit();
	-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Artikel extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		//if($this->session->userdata('islogin')=='TurnOn'){
			$this->load->model('M_Artikel');
		//}else{
		//	redirect('login');
		//}
	}
	
		// CRUD ARTIKEL
	public function index()
	{
		$list_artikel	= $this->M_Artikel->get_listartikel();

		$data_hal = array(
			"list_artikel" => $list_artikel
		);

		$this->load->view('v_header');
		$this->load->view('v_artikel', $data_hal);
	}
	
	public function list_artikel()
	{
		$list_artikel	= $this->M_Artikel->get_listartikel();

		$data_hal = array(
			"list_artikel" => $list_artikel
		);

		$this->load->view('v_header');
		$this->load->view('v_artikel', $data_hal);
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

  }

?>