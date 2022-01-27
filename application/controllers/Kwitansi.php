<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		cek_belum_login();
		$this->load->model('m_pembayaran');
    $this->load->model('m_kwitansi');
	}

	// function _remap($id){
  //   if($id != "cetak"){
  //     $this->index($id);
  //   }
  //   else{
  //     $this->cetak(null);
  //   }
	// }

	public function index($id = null)
	{
		$data['kwitansi'] = $this->m_kwitansi->get($id)->row();
		$content = $this->fungsi->user_login()->role . '/kwitansi/view';
		$this->load->view($content, $data);
	}

  public function cetak($id)
	{
		$post['id'] = $id;
		$post['id_user'] = $this->fungsi->user_login()->id;
		$post['pencetak'] = $this->fungsi->user_login()->nama;
		$this->m_kwitansi->cetak($post);
		$data['kwitansi'] = $this->m_kwitansi->get($id)->row();
		// $this->m_pembayaran->cetak($data['kwitansi']->id_pembayaran);
		$content = $this->fungsi->user_login()->role . '/kwitansi/cetak';
		$this->load->view($content, $data);
	}

}
