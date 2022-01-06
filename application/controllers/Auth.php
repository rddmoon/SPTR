<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('m_user');
			$this->load->model('m_pembelian');
			$this->load->model('m_pembeli');
			$this->load->model('m_pembayaran');
			// $this->load->model('m_perumahan');
			// $this->load->model('m_metode');
			// $this->load->model('m_unit');
			// $this->load->model('m_pembayaran_tambahan');
			// $this->load->model('m_kwitansi');
			// $this->load->library('form_validation');
	}

	public function login()
	{
		cek_sudah_login();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login']))
		{
			$query = $this->m_user->login($post);
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
					'user_id' => $row->id,
					'nama' => $row->nama,
					'username' => $row->username,
					'role' => $row->role
				);
				$this->session->set_userdata($params);
				//echo $row->role;
				date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d');
				if($this->m_user->get_refresh_date() != $today){
					$this->refresh_data_pembayaran($today);
					$this->m_user->edit_refresh_date($today);
				}
				echo "<script>
				window.location='".site_url('beranda')."';
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
		$params = array('user_id', 'nama', 'username', 'role');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}

	public function refresh_data_pembayaran($today)
	{
		$melebihi_jatuh_tempo = $this->m_pembayaran->get_lebih_jatuh_tempo($today);
		foreach ($melebihi_jatuh_tempo as $key => $value) {
			$this->m_pembayaran->blokir_pembayaran($value->id);
			if($this->m_pembayaran->get_pembayaran_terakhir($value->id_pembelian)->row()->blokir != "buka"){
				$this->generate_pembayaran_baru($value->id_pembelian);
			}

			$counter = $this->m_pembelian->counter_blokir($value->id_pembelian);
			$data['id_pembelian'] = $value->id_pembelian;
			if($counter < 0){
				$data['tunggakan'] = abs($counter);
				$this->m_pembelian->refresh_tunggakan($data);
			}
			else {
				$data['tunggakan'] = 0;
				$this->m_pembelian->refresh_tunggakan($data);
			}
		}
	}

	public function generate_pembayaran_baru($id)
	{
		$detail = $this->m_pembayaran->get_pembayaran_terakhir($id)->row();
		$pembelian = $this->m_pembelian->get($id)->row();
		$pembeli = $this->m_pembeli->get($pembelian->id_pembeli)->row();

		$pembayaran['id_kwitansi'] = NULL;
		$pembayaran['id_user'] = NULL;
		$pembayaran['id_pembelian'] = $id;
		$pembayaran['nama_pembeli'] = $pembeli->nama_pembeli;
		$pembayaran['biaya'] = $detail->biaya;
		$pembayaran['tanggal_bayar'] = NULL;
		$pembayaran['tanggal_jatuh_tempo'] = date('Y-m-d', strtotime("+1 months", strtotime($detail->tanggal_jatuh_tempo)));
		$pembayaran['jenis'] = $detail->jenis + 1;
		$pembayaran['keterangan'] = NULL;
		$pembayaran['blokir'] = "buka";
		$this->m_pembayaran->add($pembayaran);
	}
}
