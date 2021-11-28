<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			cek_belum_login();
			$this->load->model('m_pembelian');
			$this->load->model('m_user');
			$this->load->model('m_unit');
			$this->load->model('m_pembeli');
			$this->load->model('m_perumahan');
			$this->load->model('m_metode');
			$this->load->model('m_pembayaran');
			$this->load->model('m_pembayaran_tambahan');
			$this->load->model('m_kwitansi');
			$this->load->library('form_validation');
	}

	public function index()
	{
		cek_belum_login();
		date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d');
		$date = date('Y-m-d', strtotime("-6 days", strtotime($today)));
		$data['pengguna'] = $this->m_user->count_user();
		$data['pembelian_berjalan'] = $this->m_pembelian->count_berjalan();
		$data['unit_tersedia'] = $this->m_unit->count_tersedia();
		$data['weekly_pembelian'] = $this->m_pembelian->get_weekly_pembelian($date);
		$data['jml_weekly_pembelian'] = $this->m_pembelian->count_weekly_pembelian($date);
		$data['weekly_pemasukan'] = $this->m_pembelian->weekly_pemasukan($date);
		$data['weekly_pembayaran'] = $this->m_pembayaran->get_weekly_pembayaran($date);
		$data['menunggu_pembayaran'] = $this->m_pembayaran->count_menunggu();
		// $data['datee'] = $date;
		$content = $this->fungsi->user_login()->role . '/beranda';
		$this->template->load('template', $content, $data);
	}
}
