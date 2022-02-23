<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunggakan extends CI_Controller {

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
	}

	public function index()
	{
		$search = $this->input->post('search');
		if (!empty($search)) {
			$data['tagihan'] = $this->m_pembayaran->search_tunggakan($search);
			$data['sort'] = "Terlama";
			$data['site'] = "tunggakan";
			$content = $this->fungsi->user_login()->role . '/tagihan/view';
			$this->template->load('template', $content, $data);
		}
		else{
			$data['tagihan'] = $this->m_pembayaran->tagihan_tunggakan();
			$data['sort'] = "Terlama";
			$data['site'] = "tunggakan";
			$content = $this->fungsi->user_login()->role . '/tagihan/view';
			$this->template->load('template', $content, $data);
		}
	}

	public function terbaru()
	{
		$search = $this->input->post('search');
		if (!empty($search)) {
			$data['tagihan'] = $this->m_pembayaran->search_tunggakan_terbaru($search);
			$data['sort'] = "Terbaru";
			$data['site'] = "tunggakan/terbaru";
			$content = $this->fungsi->user_login()->role . '/tagihan/view';
			$this->template->load('template', $content, $data);
		}
		else{
			$data['tagihan'] = $this->m_pembayaran->tagihan_tunggakan_terbaru();
			$data['sort'] = "Terbaru";
			$data['site'] = "tunggakan/terbaru";
			$content = $this->fungsi->user_login()->role . '/tagihan/view';
			$this->template->load('template', $content, $data);
		}
	}

	public function detail($id)
	{
		$data['pembelian'] = $this->m_pembelian->get($id)->row();
		$data['metode_selected'] = $this->m_metode->get($data['pembelian']->id_metode)->row();
		$data['cicilan_ke'] = $this->m_pembelian->get_cicilan_ke($data['pembelian']->id);
		$data['pembeli_selected'] = $this->m_pembeli->get($data['pembelian']->id_pembeli)->row();
		$data['unit_selected'] = $this->m_unit->get($data['pembelian']->id_unit)->row();
		$id_perumahan = $this->m_unit->get_id_perumahan($data['pembelian']->id_unit);
		$data['perumahan_selected'] = $this->m_unit->get_nama_perumahan($id_perumahan);

		$data['pembayaran'] = $this->m_pembayaran->get_by_pembelian($id);
		$data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get_by_pembelian($data['pembelian']->id);


		$content = $this->fungsi->user_login()->role . '/tagihan/detail';
		$this->template->load('template', $content, $data);
	}

	public function cetak($id)
	{
		$data['pembelian'] = $this->m_pembelian->get($id)->row();
		$data['metode_selected'] = $this->m_metode->get($data['pembelian']->id_metode)->row();
		$data['cicilan_ke'] = $this->m_pembelian->get_cicilan_ke($id);
		$data['pembeli_selected'] = $this->m_pembeli->get($data['pembelian']->id_pembeli)->row();
		$data['unit_selected'] = $this->m_unit->get($data['pembelian']->id_unit)->row();
		$id_perumahan = $this->m_unit->get_id_perumahan($data['pembelian']->id_unit);
		$data['perumahan_selected'] = $this->m_unit->get_nama_perumahan($id_perumahan);

		$data['pembayaran'] = $this->m_pembayaran->get_by_pembelian($id);
		$data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get_by_pembelian($id);


		$content = $this->fungsi->user_login()->role . '/tagihan/cetak';
		$this->load->view($content, $data);
	}

	// public function ()
	// {
	// 	$data['tagihan'] = $this->m_pembayaran->tagihan_tunggakan();
	// 	$content = $this->fungsi->user_login()->role . '/tagihan/view';
	// 	$this->template->load('template', $content, $data);
	//
	// }

}
