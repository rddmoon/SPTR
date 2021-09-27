<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		cek_belum_login();
		$this->load->model('m_user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->m_user->get();
		$content = $this->fungsi->user_login()->role . '/user/view';

		// $this->template->load('template', 'supaa/user/view', $data);
		$this->template->load('template', $content, $data);

	}

	public function add()
	{
		$content = $this->fungsi->user_login()->role . '/user/add';

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',
				array('is_unique' => '%s sudah terpakai, gunakan username yang lain.')
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
				array('matches' => '%s tidak sesuai.')
		);
    $this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_message('required', '%s masih kosong.');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter.');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', $content);
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$this->m_user->add($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
		// $this->template->load('template', $content);
	}

	public function edit($id)
	{
		$content = $this->fungsi->user_login()->role . '/user/edit';

		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check',
				array('is_unique' => '%s sudah terpakai, gunakan username yang lain.')
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->input->post('password'))
		{
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
			array('matches' => '%s tidak sesuai.')
			);
		}
		if ($this->input->post('passconf'))
		{
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
			array('matches' => '%s tidak sesuai.')
			);
		}
    $this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_message('required', '%s masih kosong.');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter.');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->m_user->get($id);
			if($query->num_rows() > 0)
			{
				$data['user'] = $query->row();
				$this->template->load('template', $content, $data);
			}
			else
			{
				echo "<script>alert('Data tidak ditemukan.');";
				echo "window.location='".site_url('user')."';</script>";
			}
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$this->m_user->edit($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
		// $this->template->load('template', $content);
	}

	function username_check()
  {
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id != '$post[user_id]'");
		if($query->num_rows() > 0)
		{
			$this->form_validation->set_message('username_check', '{field} sudah terpakai, gunakan username yang lain.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
  }

	public function delete()
	{
		$id = $this->input->post('user_id');
		$this->m_user->delete($id);

		if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('user')."';</script>";
	}
}
