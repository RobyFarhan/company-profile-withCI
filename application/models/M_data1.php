<?php

class M_data1 extends CI_Model{
    
    //ambil data user dari database
    function get_user($limit, $start){
        $query = $this->db->get('user', $limit, $start);
        return $query;
    }
}