<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		cek_belum_login();
		$this->template->load('template', 'dashboard');
	}
}
