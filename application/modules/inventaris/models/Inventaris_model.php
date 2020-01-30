<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris_model extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'inv',
                'label' => 'Nama Inventaris',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'kode',
                'label' => 'Kode Inventaris',
                'rules'  => 'required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'sumber',
                'label' => 'Sumber',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'ruang',
                'label' => 'Ruangan',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'jenis',
                'label' => 'Jenis',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'kondisi',
                'label' => 'Kondisi',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ]
        ];
    }
    public function join()
    {
        return $this->db->query("SELECT inventaris.*,jenis.*,sumber.*,kondisi.*,tahun.*,ruang.* FROM inventaris INNER JOIN jenis on inventaris.id_jenis=jenis.id_jenis INNER JOIN sumber on inventaris.id_sumber=sumber.id_sumber INNER JOIN kondisi on inventaris.id_kondisi=kondisi.id_kondisi INNER JOIN tahun on inventaris.id_tahun=tahun.id_tahun INNER JOIN ruang on inventaris.id_ruangan=ruang.id_ruangan")->result();
    }
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar = $this->_uploadImage();
        $date = date('Y-m-d');
        $db->set('nama_barang', $post['inv']);
        $db->set('kode_inv', $post['kode']);
        $db->set('id_ruangan', $post['ruang']);
        $db->set('id_sumber', $post['sumber']);
        $db->set('id_jenis', $post['jenis']);
        $db->set('id_kondisi', $post['kondisi']);
        $db->set('id_tahun', $post['tahun']);
        $db->set('seri', $post['seri']);
        $db->set('merek', $post['merek']);
        $db->set('nilai_wajar', $post['nilai']);
        $db->set('tanggal', $date);
        $db->set('gambar', $gambar);
        $db->insert('inventaris');
        redirect('inventaris');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar_lama = $post['gambarLama'];
        if ($_FILES["gambar"]["name"]) {
            $gambar = $this->_uploadImage();
            if ($gambar_lama != $gambar || $gambar_lama != "noimage.png") {
                unlink("assets/img/inventaris/$gambar_lama");
            }
        } else {
            $gambar = $gambar_lama;
        }
        $db->set('nama_barang', $post['inv']);
        $db->set('kode_inv', $post['kode']);
        $db->set('id_ruangan', $post['ruang']);
        $db->set('id_sumber', $post['sumber']);
        $db->set('id_kondisi', $post['kondisi']);
        $db->set('id_jenis', $post['jenis']);
        $db->set('id_tahun', $post['tahun']);
        $db->set('seri', $post['seri']);
        $db->set('merek', $post['merek']);
        $db->set('nilai_wajar', $post['nilai']);
        $db->set('gambar', $gambar);
        $db->where('id_inv', $post['id']);
        $db->update('inventaris');
        redirect('inventaris');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $inv = $this->db->query("SELECT gambar FROM inventaris WHERE id_inv = $id")->row();
        if ($inv->gambar != 'noimage.png') {
            unlink("assets/img/inventaris/$inv->gambar");
        }
        $this->db->where('id_inv', $id);
        $this->db->delete('inventaris');
        redirect('inventaris');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/inventaris/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
