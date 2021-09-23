<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Login extends CI_Model
{
	public function search_user($username, $password)
	{
		$sql = "SELECT * FROM `m_user`
				WHERE username='$username' and password='$password'";
		$query = $this->db->query($sql);
		$data = $query->result();
		
        return $data;
	}
}
?>