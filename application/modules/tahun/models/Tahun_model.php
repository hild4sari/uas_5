<?php
class Tahun_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'tahun',
                'label' => 'tahun',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'ket',
                'label' => 'Keterangan',
                'rules'  => 'trim'
            ]

        ];
    }
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('tahun', $post['tahun']);
        $db->set('ket_tahun', $post['ket']);
        $db->insert('tahun');
        redirect('tahun');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('tahun', $post['tahun']);
        $db->set('ket_tahun', $post['ket']);
        $db->where('id_tahun', $post['id']);
        $db->update('tahun');
        redirect('tahun');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id_tahun', $id);
        $this->db->delete('tahun');
        redirect('tahun');
    }
}
