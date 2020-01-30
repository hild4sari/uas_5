<?php
class Kondisi_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'kondisi',
                'label' => 'Kondisi',
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
        $db->set('kondisi', $post['kondisi']);
        $db->set('ket_kondisi', $post['ket']);
        $db->insert('kondisi');
        redirect('kondisi');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('kondisi', $post['kondisi']);
        $db->set('ket_kondisi', $post['ket']);
        $db->where('id_kondisi', $post['id']);
        $db->update('kondisi');
        redirect('kondisi');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id_kondisi', $id);
        $this->db->delete('kondisi');
        redirect('kondisi');
    }
}
