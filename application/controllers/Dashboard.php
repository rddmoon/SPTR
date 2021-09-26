<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		cek_belum_login();
		$content = $this->fungsi->user_login()->role . '/dashboard';
		$this->template->load('template', $content);
	}
}
