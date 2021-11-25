<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			cek_belum_login();
			$this->load->model('m_pembelian');
			$this->load->model('m_pembeli');
			$this->load->model('m_perumahan');
			$this->load->model('m_metode');
			$this->load->model('m_unit');
			$this->load->model('m_pembayaran');
			$this->load->model('m_pembayaran_tambahan');
			$this->load->model('m_kwitansi');
			$this->load->library('form_validation');
	}

	public function index()
	{
		cek_belum_login();
		// $data['pengguna'] = $this->m_user->
		$content = $this->fungsi->user_login()->role . '/beranda';
		$this->template->load('template', $content);
	}
}
