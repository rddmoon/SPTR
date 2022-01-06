<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metode extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		cek_belum_login();
		$this->load->model('m_metode');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$search = $this->input->post('search');
		if (!empty($search)) {
			$data['metode'] = $this->m_metode->search($search);
        } else {
			$data['metode'] = $this->m_metode->get();
		}
		$content = $this->fungsi->user_login()->role . '/metode/view';
		$this->template->load('template', $content, $data);

	}

	public function add()
	{
		$content = $this->fungsi->user_login()->role . '/metode/add';

		$this->form_validation->set_rules('nama_metode', 'Nama Metode', 'required');
    $this->form_validation->set_rules('banyaknya_cicilan', 'Banyak Cicilan', 'required|numeric');
		$this->form_validation->set_message('required', '%s masih kosong.');
    $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', $content);
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$this->m_metode->add($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Metode pembayarann berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('metode')."';</script>";
		}
		// $this->template->load('template', $content);
	}

	public function edit($id)
	{
		$content = $this->fungsi->user_login()->role . '/metode/edit';

    $this->form_validation->set_rules('nama_metode', 'Nama Metode', 'required');
    $this->form_validation->set_rules('banyaknya_cicilan', 'Banyak Cicilan', 'required|numeric');
		$this->form_validation->set_message('required', '%s masih kosong.');
    $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->m_metode->get($id);
			if($query->num_rows() > 0)
			{
				$data['metode'] = $query->row();
				$this->template->load('template', $content, $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan.');";
				echo "window.location='".site_url('metode')."';</script>";
			}
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$this->m_metode->edit($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Metode pembayaran berhasil diubah');</script>";
			}
			echo "<script>window.location='".site_url('metode')."';</script>";
		}
	}

	public function delete()
	{
		$id = $this->input->post('metode_id');
		$this->m_metode->delete($id);

		if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Metode pembayaran berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('metode')."';</script>";
	}
}
