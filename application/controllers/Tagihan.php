<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		cek_belum_login();
		$this->load->model('m_pembayaran');
		// $this->load->library('form_validation');
	}

	function _remap($sort){
		$this->index($sort);
	}

	public function index($sort = null)
	{
		if($sort == "terbaru")
		{
			$data['tagihan'] = $this->m_pembayaran->tagihan_tunggakan_terbaru();
			$data['sort'] = "Terbaru";
			$content = $this->fungsi->user_login()->role . '/tagihan/view';
			$this->template->load('template', $content, $data);
		}
		else{
			$data['tagihan'] = $this->m_pembayaran->tagihan_tunggakan();
			$data['sort'] = "Terlama";
			$content = $this->fungsi->user_login()->role . '/tagihan/view';
			$this->template->load('template', $content, $data);
		}

	}

	// public function ()
	// {
	// 	$data['tagihan'] = $this->m_pembayaran->tagihan_tunggakan();
	// 	$content = $this->fungsi->user_login()->role . '/tagihan/view';
	// 	$this->template->load('template', $content, $data);
	//
	// }

}
