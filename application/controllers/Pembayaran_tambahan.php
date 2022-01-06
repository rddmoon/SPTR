<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_tambahan extends CI_Controller
{
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
        $search = $this->input->post('search');
        if (!empty($search)) {
          $data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->search($search);
          $data['pembayaran_tambahan_buka'] = $this->m_pembayaran_tambahan->buka($search);
          $data['pembayaran_tambahan_lunas'] = $this->m_pembayaran_tambahan->lunas($search);
        } else {
          $data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get();
          $data['pembayaran_tambahan_buka'] = $this->m_pembayaran_tambahan->buka();
          $data['pembayaran_tambahan_lunas'] = $this->m_pembayaran_tambahan->lunas();
        }
        $content = $this->fungsi->user_login()->role . '/pembayaran_tambahan/view';
        $this->template->load('template', $content, $data);
    }

    public function detail($id)
    {
        $data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get($id)->row();
        $content = $this->fungsi->user_login()->role . '/pembayaran_tambahan/detail';
        $this->template->load('template', $content, $data);

    }

    public function get_pembelian_by_pembeli()
    {
      if($this->input->post('pembeli_id'))
      {
       echo $this->m_pembayaran_tambahan->pembelian_by_pembeli($this->input->post('pembeli_id'));
      }
    }

    // public function buka_blokir($id)
    // {
    //   $this->m_pembayaran->buka_blokir($id);
    // }

    // public function blokir_pembayaran($id)
    // {
    //   $this->m_pembayaran->blokir_pembayaran($id);
    // }

    public function bayar($id)
    {
      $detail['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get($id)->row();

      date_default_timezone_set('Asia/Jakarta');
      $kwitansi['id'] = date('dmyhis');
      $kwitansi['biaya'] = $detail['pembayaran_tambahan']->biaya;
      $kwitansi['tanggal_bayar'] = date('Y-m-d');
      $detail['pembelian'] = $this->m_pembelian->get($detail['pembayaran_tambahan']->id_pembelian)->row();
      // $detail['unit'] = $this->m_unit->get($detail['pembelian']->id_unit)->row();
      // $detail['perumahan'] = $this->m_perumahan->get($detail['unit']->id_perumahan)->row();
      $kwitansi['keterangan'] = $detail['pembayaran_tambahan']->keterangan;
      // $detail['pembeli'] = $this->m_pembeli->get($detail['pembelian']->id_pembeli)->row();
      $kwitansi['nama_pembeli'] = $detail['pembayaran_tambahan']->nama_pembeli;
      $this->m_kwitansi->add($kwitansi);

      $pembayaran['id'] = $id;
      $pembayaran['id_kwitansi'] = $kwitansi['id'];
      $pembayaran['id_user'] = $this->fungsi->user_login()->id;
      $pembayaran['tanggal_bayar'] = date('Y-m-d');
      $pembayaran['keterangan'] = $kwitansi['keterangan'];
      $this->m_pembayaran_tambahan->bayar($pembayaran);

      $bayar['pembelian_id'] = $detail['pembelian']->id;
      $bayar['biaya'] = $detail['pembelian']->uang_lainnya + $detail['pembayaran_tambahan']->biaya;
      $this->m_pembelian->uang_lainnya($bayar);

      if($this->db->affected_rows() > 0)
      {
          echo "<script>alert('Pembayaran Tambahan berhasil disimpan');</script>";
      }
      echo "<script>window.location='".site_url('pembelian/detail/'.$detail['pembelian']->id)."';</script>";
    }

    public function add()
    {
        $data['pembeli'] = $this->m_pembeli->get()->result();
        $content = $this->fungsi->user_login()->role . '/pembayaran_tambahan/add';
        // $this->template->load('template', $content, $data);

        $this->form_validation->set_rules('id_pembeli', 'Pembeli', 'required');
        $this->form_validation->set_rules('id_pembelian', 'ID Pembelian', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required|numeric');
        $this->form_validation->set_rules('tanggal_jatuh_tempo', 'Tanggal Jatuh Tempo', 'required');
        $this->form_validation->set_rules('jenis_pembayaran', 'Jenis Pembayaran', 'required');

        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
          $this->template->load('template', $content, $data);
        }
        else{
            $post = $this->input->post(null,TRUE);
            if($post['keterangan'] == NULL){
              $post['keterangan'] = 'Pembayaran '.strtolower($post['jenis_pembayaran']).' pada ID pembelian '.$post['id_pembelian'].'.';
            }
            $post['nama_pembeli'] = $this->m_pembeli->get($post['id_pembeli'])->row()->nama_pembeli;
            $post['id_kwitansi'] = NULL;
            $post['id_user'] = NULL;
            $this->m_pembayaran_tambahan->add($post);

            if($post['tanggal_bayar'] != NULL){
              $terakhir = $this->m_pembayaran_tambahan->get_pembayaran_terakhir($post['id_pembelian'])->row();
              $this->bayar($terakhir);
            }
            if($this->db->affected_rows() > 0 && $post['tanggal_bayar'] == NULL )
            {
              echo "<script>alert('Pembayaran Tambahan berhasil disimpan');</script>";
              echo "<script>window.location='".site_url('pembelian/detail/'.$post['id_pembelian'])."';</script>";
            }
        }
    }

    public function add_by_id($id)
    {
        $data['pembelian'] = $this->m_pembelian->get($id)->row();
        $data['pembeli'] = $this->m_pembeli->get($data['pembelian']->id_pembeli)->row();
        $content = $this->fungsi->user_login()->role . '/pembayaran_tambahan/add_by_id';

        // $this->form_validation->set_rules('id_pembeli', 'Pembeli', 'required');
        // $this->form_validation->set_rules('id_pembelian', 'ID Pembelian', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required|numeric');
        $this->form_validation->set_rules('tanggal_jatuh_tempo', 'Tanggal Jatuh Tempo', 'required');
        $this->form_validation->set_rules('jenis_pembayaran', 'Jenis Pembayaran', 'required');

        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
          $this->template->load('template', $content, $data);
        }
        else{
            $post = $this->input->post(null,TRUE);
            if($post['keterangan'] == NULL){
              $post['keterangan'] = 'Pembayaran '.strtolower($post['jenis_pembayaran']).' pada ID pembelian '.$data['pembelian']->id.'.';
            }
            $post['id_pembelian'] = $id;
            $post['nama_pembeli'] = $data['pembeli']->nama_pembeli;
            $post['id_kwitansi'] = NULL;
            $post['id_user'] = NULL;
            $this->m_pembayaran_tambahan->add($post);

            if($post['tanggal_bayar'] != NULL){
              $terakhir = $this->m_pembayaran_tambahan->get_pembayaran_terakhir($post['id_pembelian'])->row();
              $this->bayar($terakhir->id);
            }
            if($this->db->affected_rows() > 0 && $post['tanggal_bayar'] == NULL )
            {
              echo "<script>alert('Pembayaran Tambahan berhasil disimpan');</script>";
              echo "<script>window.location='".site_url('pembelian/detail/'.$id)."';</script>";
            }
        }
    }

    // public function check_status_pembelian($id)
    // {
    //   $pembelian = $this->m_pembelian->get($id)->row();
    //   $metode = $this->m_metode->get($pembelian->id_metode)->row();
    //   $cicilan = $this->m_pembelian->get_cicilan_ke($pembelian->id);
    //   if($pembelian->uang_masuk == $pembelian->harga_beli || $cicilan == $metode->banyaknya_cicilan)
    //   {
    //     $this->m_pembelian->selesai($id);
    //     return 1;
    //   }
    //   return 0;
    // }
}
