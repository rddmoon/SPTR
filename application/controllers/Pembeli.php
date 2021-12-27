<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		cek_belum_login();
		$this->load->model('m_pembeli');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$search = $this->input->post('search');
		if (!empty($search)) {
			// $data['perumahan'] = $this->m_perumahan->search($search);
			$data['pembeli'] = $this->m_pembeli->search($search);
        } else {
			$data['pembeli'] = $this->m_pembeli->get();
        }
		$content = $this->fungsi->user_login()->role . '/pembeli/view';

		$this->template->load('template', $content, $data);

	}

	public function add()
	{
		$content = $this->fungsi->user_login()->role . '/pembeli/add';

    $this->form_validation->set_rules('NIK', 'NIK', 'required|exact_length[16]|numeric',
				array('exact_length' => '%s harus 16 digit.')
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
    $this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tl', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_message('required', '%s masih kosong.');
    $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', $content);
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$this->m_pembeli->add($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('pembeli')."';</script>";
		}
		// $this->template->load('template', $content);
	}

	public function edit($id)
	{
		$content = $this->fungsi->user_login()->role . '/pembeli/edit';

    $this->form_validation->set_rules('NIK', 'NIK', 'required|exact_length[16]|numeric',
				array('exact_length' => '%s harus 16 digit.')
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
		$this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tl', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_message('required', '%s masih kosong.');
    $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->m_pembeli->get($id);
			if($query->num_rows() > 0)
			{
				$data['pembeli'] = $query->row();
				$this->template->load('template', $content, $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan.');";
				echo "window.location='".site_url('pembeli')."';</script>";
			}
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$this->m_pembeli->edit($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('pembeli')."';</script>";
		}
	}

	public function delete()
	{
		$id = $this->input->post('pembeli_id');
		$this->m_pembeli->delete($id);

		if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('pembeli')."';</script>";
	}
}
