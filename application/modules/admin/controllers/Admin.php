<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data['title'] = 'User';
		$data['user'] = $this->db->get('user')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->admin_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah User';
			admin_page('tambah', $data);
		}
	}
	public function edit()
	{
		$model = $this->admin_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$id = $this->input->post('id');
			$data['title'] = "Ubah data";
			$data['user'] = $this->db->get_where('user', ['id_user' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->admin_model->delete();
	}
}
