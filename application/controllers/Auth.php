<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		cek_sudah_login();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('m_user');
			$query = $this->m_user->login($post);
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
					'user_id' => $row->id,
					'role' => $row->role
				);
				$this->session->set_userdata($params);
				// echo $row->role;
				echo "<script>
				window.location='".site_url('dashboard')."';
				</script>";
			}
			else
			{
				echo "<script>
				alert('Login gagal. Username / password salah.');
				window.location='".site_url('auth/login')."';
				</script>";
			}
		}
	}

	public function logout()
	{
		$params = array('user_id', 'role');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
