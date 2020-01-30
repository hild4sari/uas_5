<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'user',
                'label' => 'Username',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'pass',
                'label' => 'Password',
                'rules'  => 'required|min_length[8]',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong',
                    'min_length' => '%s minimal 8 karakter'
                )
            ]
        ];
    }
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('username', $post['user']);
        $db->set('password', $post['pass']);
        $db->insert('user');
        redirect('admin');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('username', $post['user']);
        $db->set('password', $post['pass']);
        $db->where('id_user', $post['id']);
        $db->update('user');
        redirect('admin');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        redirect('admin');
    }
}
