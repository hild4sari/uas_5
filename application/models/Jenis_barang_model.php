<?php
class Jenis_barang_model extends CI_model{

    function get_all(){
        return $this->db->get('jenis_barang')->result();
    }
    function insert($data){
        return $this->db->insert('jenis_barang',$data);
    }
}