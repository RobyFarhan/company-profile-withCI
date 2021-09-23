<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Profil extends CI_Controller {
	
	function __construct() {
	parent::__construct();
	
	$this->load->model('M_Profil');
	}
		
	public function index()
	{
		
		$this->load->view('v_header');
		$this->load->view('v_profil_view');
		$this->load->view('v_footer');
	}

}