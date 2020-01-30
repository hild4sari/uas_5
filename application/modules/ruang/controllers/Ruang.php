<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ruang_model');
	}
	public function index()
	{
		$data['title'] = "Ruang";
		$data['ruang'] = $this->db->get('ruang')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->ruang_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah Data';
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->ruang_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$data['title'] = "Ubah Data";
			$data['ruang'] = $this->db->get_where('ruang', ['id_ruangan' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->ruang_model->delete();
	}
}
