<?php
class jenis_barang extends CI_Controller{
    public function_construct(){
}
function index(){
    $data['jenis_barang'] = $this->jenis->get_all();
    $this->load->view('jenis_barang/index',$data);
}
function add(){
    $data=array('id_barang'=>set_value('id_barang'),'jenis_barang'=> set_value('jenis_barang'), 'keterangan'=>set_value('keterangan'));
    $this->load->view('jenis_barang/from',$data);
}
function addsave(){
    $data=array(
        'jenis_barang'=> $this->input->post('jenis_barang');
        'keterangan'=>$this->input->post('keterangan'));
    $this->jenis->insert($data);
    redirect('jenis_barang');
 
}
function update(){
    $row=$this->jenis->getbyid($id);
    $data=array('jenis_barang'=> set_value('jenis_barang'), 'ket'=>set_value('ket'));
    $this->load->view('jenis_barang/from',$data);
}
function delete(){
    $data=array('id_jenis_barang=>'set_value('id_jenisbarang'=> set_value('jenis_barang'));
}