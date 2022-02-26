<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
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
          $data['pembelian'] = $this->m_pembelian->search($search);
          $data['pembelian_berjalan'] = $this->m_pembelian->get_berjalan($search);
          $data['pembelian_selesai'] = $this->m_pembelian->get_selesai($search);
          $data['pembelian_dibatalkan'] = $this->m_pembelian->get_dibatalkan($search);
        } else {
          $data['pembelian'] = $this->m_pembelian->get();
          $data['pembelian_berjalan'] = $this->m_pembelian->get_berjalan();
          $data['pembelian_selesai'] = $this->m_pembelian->get_selesai();
          $data['pembelian_dibatalkan'] = $this->m_pembelian->get_dibatalkan();
        }

        $content = $this->fungsi->user_login()->role . '/pembelian/view';
        $this->template->load('template', $content, $data);
    }

    public function detail($id)
    {
        // date_default_timezone_set('Asia/Jakarta');
        // $now = date('Y-m-d');
        // $jatuh_tempo = $this->m_pembayaran->get_pembayaran_terakhir($id)->row()->tanggal_jatuh_tempo;
        //
        // while ($now > $jatuh_tempo) {
        //   $this->blokir_pembayaran($id);
        //   $jatuh_tempo = $this->m_pembayaran->get_pembayaran_terakhir($id)->row()->tanggal_jatuh_tempo;
        //
        // }
        $data['pembelian'] = $this->m_pembelian->get($id)->row();
        $data['metode_selected'] = $this->m_metode->get($data['pembelian']->id_metode)->row();
        $data['cicilan_ke'] = $this->m_pembelian->get_cicilan_ke($data['pembelian']->id);
        $data['pembeli_selected'] = $this->m_pembeli->get($data['pembelian']->id_pembeli)->row();
        $data['unit_selected'] = $this->m_unit->get($data['pembelian']->id_unit)->row();
        $id_perumahan = $this->m_unit->get_id_perumahan($data['pembelian']->id_unit);
        $data['perumahan_selected'] = $this->m_unit->get_nama_perumahan($id_perumahan);

        $data['pembayaran'] = $this->m_pembayaran->get_by_pembelian($id);
        $data['pembayaran_tambahan'] = $this->m_pembayaran_tambahan->get_by_pembelian($data['pembelian']->id);


        $content = $this->fungsi->user_login()->role . '/pembelian/detail';
        $this->template->load('template', $content, $data);

    }

    public function rekap($id)
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


        $content = $this->fungsi->user_login()->role . '/pembelian/rekap';
        $this->load->view($content, $data);

    }

    public function edit_dibatalkan($id)
    {
      $id_unit = $this->m_pembelian->get($id)->row()->id_unit;
      $this->m_pembelian->dibatalkan($id);
      $this->m_unit->edit_status_tersedia($id_unit);
      $pembayaran = $this->m_pembayaran->get_pembayaran_terakhir($id)->row();
      $this->m_pembayaran->delete($pembayaran->id);
      if($this->db->affected_rows() > 0){
          echo "<script>alert('Pembelian telah dibatalkan');</script>";
      }
      echo "<script>window.location='".site_url('pembelian')."';</script>";
    }

    public function get_unit_by_perumahan()
    {
      if($this->input->post('perumahan_id'))
      {
       echo $this->m_perumahan->unit_by_perumahan($this->input->post('perumahan_id'));
      }
    }

    public function get_unit_by_perumahan_edit()
    {
        if($this->input->post('perumahan_id'))
        {
         $data = $this->m_perumahan->unit_by_perumahan_edit($this->input->post('perumahan_id'));
         echo json_encode($data);
        }
        // $perumahan_id = $this->input->post('perumahan_id',TRUE);
        // $data = $this->m_perumahan->get_unit_by_perumahan_edit($perumahan_id);
        // echo json_encode($data);
    }


    public function get_harga_beli()
    {
      $value = $this->input->post('value');

      $harga = $this->m_unit->get_harga($value);

      echo $harga;
      // if($this->input->post('id_unit'))
      // {
      //  echo $this->m_unit->get_harga($this->input->post('id_unit'));
      // }
    }

    public function generate_pembayaran_cash_keras($post)
    {
      date_default_timezone_set('Asia/Jakarta');
      $perumahan = $this->m_perumahan->get($post['perumahan'])->row();
      $kwitansi['id'] = date('dmyhis');
      //generate dp
      $kwitansi['biaya'] = $post['DP'];
      $kwitansi['tanggal_bayar'] = $post['tanggal_beli'];
      $unit = $this->m_unit->get($post['id_unit'])->row();
      $kwitansi['keterangan'] = 'Pembayaran '.$perumahan->nama.' unit '.$unit->blok.' cluster '.$unit->cluster.'.';
      $pembeli = $this->m_pembeli->get($post['id_pembeli'])->row();
      $kwitansi['nama_pembeli'] = $pembeli->nama_pembeli;
      $this->m_kwitansi->add($kwitansi);

      $pembayaran_1['id_kwitansi'] = $kwitansi['id'];
      $pembayaran_1['id_user'] = $this->fungsi->user_login()->id;
      $pembayaran_1['id_pembelian'] = $post['pembelian_id'];
      $pembayaran_1['nama_pembeli'] = $kwitansi['nama_pembeli'];
      $pembayaran_1['biaya'] = $kwitansi['biaya'];
      $pembayaran_1['tanggal_bayar'] = $post['tanggal_beli'];
      $pembayaran_1['tanggal_jatuh_tempo'] = date('Y-m-d', strtotime($post['tanggal_beli']));
      $pembayaran_1['jenis'] = 0;
      $pembayaran_1['keterangan'] = $kwitansi['keterangan'];
      $pembayaran_1['blokir'] = "lunas";
      $this->m_pembayaran->add($pembayaran_1);
    }

    public function generate_dua_pembayaran($post)
    {
      date_default_timezone_set('Asia/Jakarta');
      $perumahan = $this->m_perumahan->get($post['perumahan'])->row();

      $kwitansi['id'] = date('dmyhis');
      //generate dp
      $kwitansi['biaya'] = $post['DP'];
      $kwitansi['tanggal_bayar'] = $post['tanggal_beli'];
      $unit = $this->m_unit->get($post['id_unit'])->row();
      $kwitansi['keterangan'] = 'Pembayaran DP '.$perumahan->nama.' unit '.$unit->blok.' cluster '.$unit->cluster.'.';
      $pembeli = $this->m_pembeli->get($post['id_pembeli'])->row();
      $kwitansi['nama_pembeli'] = $pembeli->nama_pembeli;
      $this->m_kwitansi->add($kwitansi);

      $pembayaran_1['id_kwitansi'] = $kwitansi['id'];
      $pembayaran_1['id_user'] = $this->fungsi->user_login()->id;
      $pembayaran_1['id_pembelian'] = $post['pembelian_id'];
      $pembayaran_1['nama_pembeli'] = $kwitansi['nama_pembeli'];
      $pembayaran_1['biaya'] = $kwitansi['biaya'];
      $pembayaran_1['tanggal_bayar'] = $post['tanggal_beli'];
      $pembayaran_1['tanggal_jatuh_tempo'] = date('Y-m-d', strtotime($post['tanggal_beli']));
      $pembayaran_1['jenis'] = 0;
      $pembayaran_1['keterangan'] = $kwitansi['keterangan'];
      $pembayaran_1['blokir'] = "lunas";
      $this->m_pembayaran->add($pembayaran_1);
      //generate cicilan 1
      $pembayaran_2['id_kwitansi'] = NULL;
      $pembayaran_2['id_user'] = NULL;
      $pembayaran_2['id_pembelian'] = $post['pembelian_id'];
      $pembayaran_2['nama_pembeli'] = $kwitansi['nama_pembeli'];
      $pembayaran_2['biaya'] = $post['cicilan_perbulan'];
      $pembayaran_2['tanggal_bayar'] = NULL;
      $pembayaran_2['tanggal_jatuh_tempo'] = date('Y-m-d', strtotime("+1 months", strtotime($post['tanggal_beli'])));
      $pembayaran_2['jenis'] = 1;
      $pembayaran_2['keterangan'] = NULL;
      $pembayaran_2['blokir'] = "buka";
      $this->m_pembayaran->add($pembayaran_2);
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

    public function check_status_pembelian($id)
    {
      $pembelian = $this->m_pembelian->get($id)->row();
      $metode = $this->m_metode->get($pembelian->id_metode)->row();
      $cicilan = $this->m_pembelian->get_cicilan_ke($pembelian->id);
      if($pembelian->uang_masuk == $pembelian->harga_beli)
      {
        $this->m_pembelian->selesai($id);
        return 1;
      }
      return 0;
    }

    public function add()
    {
        $data['perumahan'] = $this->m_perumahan->get()->result();
        $data['pembeli'] = $this->m_pembeli->get();
        $data['metode'] = $this->m_metode->get();
        $content = $this->fungsi->user_login()->role . '/pembelian/add';
        // $this->template->load('template', $content, $data);

        $this->form_validation->set_rules('perumahan', 'Perumahan', 'required');
        $this->form_validation->set_rules('id_pembeli', 'Pembeli', 'required');
        $this->form_validation->set_rules('id_unit', 'Unit', 'required');
        $this->form_validation->set_rules('DP', 'DP', 'required|numeric');
        $this->form_validation->set_rules('id_metode', 'Metode', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
        //$this->form_validation->set_rules('cicilan_perbulan', 'Cicilan Perbulan', 'required|numeric');
        // $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
          $this->template->load('template', $content, $data);
        }
        else{
            $post = $this->input->post(null,TRUE);
            $banyaknya_cicilan = $this->m_metode->get($post['id_metode'])->row()->banyaknya_cicilan;
            if($banyaknya_cicilan > 1){
              $harga_cicil = $post['harga_beli'] * (100 + 6 * $banyaknya_cicilan/12)/100;
              $post['cicilan_perbulan'] = ($harga_cicil - $post['DP'])/$banyaknya_cicilan;
              $post['harga_beli'] = $harga_cicil;
            }
            elseif ($banyaknya_cicilan == 1) {
              $post['cicilan_perbulan'] = $post['harga_beli'] - $post['DP'];
            }
            else {
              $post['cicilan_perbulan'] = 0;
            }
            $this->m_pembelian->add($post);
            $this->m_unit->edit_status_terjual($post['id_unit']);
            if($this->db->affected_rows() > 0)
            {
              $cicilan = $this->m_metode->get_banyak_cicilan($post['id_metode']);
              if($cicilan > 0)
              {
                $this->generate_dua_pembayaran($post);
              }
              else
              {
                  $return = $this->check_status_pembelian($post['pembelian_id']);
                  $this->generate_pembayaran_cash_keras($post);
              }
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='".site_url('pembelian/detail/'.$post['pembelian_id'])."';</script>";
        }
    }

    public function delete()
    {
        $id = $this->input->post('pembelian_id');
        $this->m_pembelian->delete($id);
        $this->m_unit->edit_status_tersedia($id);
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('pembelian')."';</script>";
    }
}
