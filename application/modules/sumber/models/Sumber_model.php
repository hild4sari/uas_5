<?php
class Sumber_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'sumber',
                'label' => 'Sumber',
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
        $db->set('sumber', $post['sumber']);
        $db->set('ket_sumber', $post['ket']);
        $db->insert('sumber');
        redirect('sumber');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('sumber', $post['sumber']);
        $db->set('ket_sumber', $post['ket']);
        $db->where('id_sumber', $post['id']);
        $db->update('sumber');
        redirect('sumber');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id_sumber', $id);
        $this->db->delete('sumber');
        redirect('sumber');
    }
}
