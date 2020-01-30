<?php
class Ruang_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'ruang',
                'label' => 'Nama Ruangan',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'fungsi',
                'label' => 'Fungsi Ruangan',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ]

        ];
    }
    public function tambah()
    {
        $post = $this->input->post();
        $gambar = $this->_uploadImage();
        $db = $this->db;
        $db->set('nama_ruangan', $post['ruang']);
        $db->set('fungsi_ruangan', $post['fungsi']);
        $db->set('luas', $post['luas']);
        $db->set('gbr_ruangan', $gambar);
        $db->insert('ruang');
        redirect('ruang');
    }
    public function edit()
    {
        $post = $this->input->post();
        $gambar_lama = $post['gambarLama'];
        if ($_FILES["gambar"]["name"]) {
            $gambar = $this->_uploadImage();
            if ($gambar_lama != $gambar || $gambar_lama != "noimage.png") {
                unlink("assets/img/ruangan/$gambar_lama");
            }
        } else {
            $gambar = $gambar_lama;
        }
        $db = $this->db;
        $db->set('nama_ruangan', $post['ruang']);
        $db->set('fungsi_ruangan', $post['fungsi']);
        $db->set('luas', $post['luas']);
        $db->set('gbr_ruangan', $gambar);
        $db->where('id_ruangan', $post['id']);
        $db->update('ruang');
        redirect('ruang');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $ruang = $this->db->query("SELECT gbr_ruangan FROM ruang WHERE id_ruangan = $id")->row();
        if ($ruang->gbr_ruangan != 'noimage.png') {
            unlink("assets/img/ruangan/$ruang->gbr_ruangan");
        }
        $this->db->where('id_ruangan', $id);
        $this->db->delete('ruang');
        redirect('ruang');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/ruangan/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
