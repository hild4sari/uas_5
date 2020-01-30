<?php
class Satuan_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'satuan',
                'label' => 'Satuan',
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
        $db->set('satuan', $post['satuan']);
        $db->set('ket_satuan', $post['ket']);
        $db->insert('satuan');
        redirect('satuan');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('satuan', $post['satuan']);
        $db->set('ket_satuan', $post['ket']);
        $db->where('id_satuan', $post['id']);
        $db->update('satuan');
        redirect('satuan');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id_satuan', $id);
        $this->db->delete('satuan');
        redirect('satuan');
    }
}
