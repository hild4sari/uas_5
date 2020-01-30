<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sumber extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('sumber_model');
	}
	public function index()
	{
		$data['title'] = "sumber";
		$data['sumber'] = $this->db->get('sumber')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->sumber_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah sumber';
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->sumber_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$data['title'] = "Ubah sumber";
			$data['sumber'] = $this->db->get_where('sumber', ['id_sumber' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->sumber_model->delete();
	}
}
