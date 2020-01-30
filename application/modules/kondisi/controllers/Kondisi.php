<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('kondisi_model');
	}
	public function index()
	{
		$data['title'] = "Kondisi";
		$data['kondisi'] = $this->db->get('kondisi')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->kondisi_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah Kondisi';
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->kondisi_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$data['title'] = "Ubah Kondisi";
			$data['kondisi'] = $this->db->get_where('kondisi', ['id_kondisi' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->kondisi_model->delete();
	}
}
