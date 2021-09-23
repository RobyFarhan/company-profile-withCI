<?php 
 
class Blog extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
 
	function index(){
		$data['tbl_artikel'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_blog',$data);
	}
}