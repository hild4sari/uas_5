<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('tahun_model');
	}
	public function index()
	{
		$data['title'] = "Tahun";
		$data['tahun'] = $this->db->get('tahun')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->tahun_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah tahun';
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->tahun_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$data['title'] = "Ubah tahun";
			$data['tahun'] = $this->db->get_where('tahun', ['id_tahun' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->tahun_model->delete();
	}
}
