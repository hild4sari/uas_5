<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('satuan_model');
	}
	public function index()
	{
		$data['title'] = "Satuan";
		$data['satuan'] = $this->db->get('satuan')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->satuan_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah satuan';
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->satuan_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$data['title'] = "Ubah satuan";
			$data['satuan'] = $this->db->get_where('satuan', ['id_satuan' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->satuan_model->delete();
	}
}
