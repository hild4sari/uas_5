<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('jenis_model');
	}
	public function index()
	{
		$data['title'] = "Jenis";
		$data['jenis'] = $this->db->get('jenis')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->jenis_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah Jenis';
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->jenis_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$data['title'] = "Ubah Jenis";
			$data['jenis'] = $this->db->get_where('jenis', ['id_jenis' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->jenis_model->delete();
	}
}
