<?php
class Jenis_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'jenis',
                'label' => 'Jenis',
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
        $db->set('jenis', $post['jenis']);
        $db->set('ket_jenis', $post['ket']);
        $db->insert('jenis');
        redirect('jenis');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('jenis', $post['jenis']);
        $db->set('ket_jenis', $post['ket']);
        $db->where('id_jenis', $post['id']);
        $db->update('jenis');
        redirect('jenis');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id_jenis', $id);
        $this->db->delete('jenis');
        redirect('jenis');
    }
}
