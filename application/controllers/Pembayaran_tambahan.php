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
        $data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get();
        $data['pembayaran_tambahan_buka'] = $this->m_pembayaran_tambahan->buka();
        $data['pembayaran_tambahan_lunas'] = $this->m_pembayaran_tambahan->lunas();
        $content = $this->fungsi->user_login()->role . '/pembayaran_tambahan/view';
        $this->template->load('template', $content, $data);
    }

    public function detail($id)
    {
        $data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get($id)->row();
        $content = $this->fungsi->user_login()->role . '/pembayaran_tambahan/detail';
        $this->template->load('template', $content, $data);

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
      $detail['pembayaran'] = $this->m_pembayaran->get($id)->row();

      date_default_timezone_set('Asia/Jakarta');
      $kwitansi['id'] = date('dmyhis');
      $kwitansi['biaya'] = $detail['pembayaran']->biaya;
      $kwitansi['tanggal_bayar'] = date('Y-m-d');
      $detail['pembelian'] = $this->m_pembelian->get($detail['pembayaran']->id_pembelian)->row();
      $detail['unit'] = $this->m_unit->get($detail['pembelian']->id_unit)->row();
      $detail['perumahan'] = $this->m_perumahan->get($detail['unit']->id_perumahan)->row();
      $kwitansi['keterangan'] = 'Pembayaran Cicilan Ke '.$detail['pembayaran']->jenis.' Pembelian '.$detail['perumahan']->nama.' Unit '.$detail['unit']->blok.' Cluster '.$detail['unit']->cluster.'.';
      $detail['pembeli'] = $this->m_pembeli->get($detail['pembelian']->id_pembeli)->row();
      $kwitansi['nama_pembeli'] = $detail['pembeli']->nama_pembeli;
      $this->m_kwitansi->add($kwitansi);

      $pembayaran['id'] = $id;
      $pembayaran['id_kwitansi'] = $kwitansi['id'];
      $pembayaran['id_user'] = $this->fungsi->user_login()->id;
      $pembayaran['tanggal_bayar'] = date('Y-m-d');
      $pembayaran['keterangan'] = $kwitansi['keterangan'];
      $pembayaran['blokir'] = "lunas";
      $this->m_pembayaran->bayar($pembayaran);

      $bayar['pembelian_id'] = $detail['pembelian']->id;
      $bayar['biaya'] = $detail['pembelian']->uang_masuk + $detail['pembayaran']->biaya;
      $this->m_pembelian->uang_masuk($bayar);

      if($this->db->affected_rows() > 0)
      {
          echo "<script>alert('Data berhasil disimpan');</script>";
          if($this->check_status_pembelian($detail['pembelian']->id) == 0){
            $this->generate_pembayaran_baru($id);
          }
      }
      echo "<script>window.location='".site_url('pembelian/detail/'.$detail['pembelian']->id)."';</script>";
    }

    public function generate_pembayaran_baru($id)
    {
      $detail = $this->m_pembayaran->get($id)->row();
      $pembelian = $this->m_pembelian->get($detail->id_pembelian)->row();
      $pembeli = $this->m_pembeli->get($pembelian->id_pembeli)->row();

      $pembayaran['id_kwitansi'] = NULL;
      $pembayaran['id_user'] = NULL;
      $pembayaran['id_pembelian'] = $detail->id_pembelian;
      $pembayaran['nama_pembeli'] = $pembeli->nama_pembeli;
      $pembayaran['biaya'] = $detail->biaya;
      $pembayaran['tanggal_bayar'] = NULL;
      $pembayaran['tanggal_jatuh_tempo'] = date('Y-m-d', strtotime("+1 months", strtotime($detail->tanggal_jatuh_tempo)));
      $pembayaran['jenis'] = $detail->jenis + 1;
      $pembayaran['keterangan'] = NULL;
      $pembayaran['blokir'] = "buka";
      $this->m_pembayaran->add($pembayaran);
    }

    public function check_status_pembelian($id)
    {
      $pembelian = $this->m_pembelian->get($id)->row();
      $metode = $this->m_metode->get($pembelian->id_metode)->row();
      $cicilan = $this->m_pembelian->get_cicilan_ke($pembelian->id);
      if($pembelian->uang_masuk == $pembelian->harga_beli || $cicilan == $metode->banyaknya_cicilan)
      {
        $this->m_pembelian->selesai($id);
        return 1;
      }
      return 0;
    }
}
