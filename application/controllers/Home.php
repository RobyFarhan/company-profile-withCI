<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Home extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		if($this->session->userdata('islogin')=='TurnOn'){
			//$this->load->model('M_Menu');
			//$this->load->model('M_Master');
		}
	}
	
	public function index()
	{
		$this->load->view('v_beranda');
	}
	
	public function artikel()
	{
		$this->load->view('v_about_list');
	}

}
