<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		cek_belum_login();

		$this->load->model('m_user');
		$data['user'] = $this->m_user->get();

		$this->template->load('template', 'supaa/user/view', $data);
	}

	public function add()
	{
		$this->template->load('template', 'supaa/user/add');
	}
}
