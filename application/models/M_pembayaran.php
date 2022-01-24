<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('pembayaran');
        if($id != null)
        {
            $this->db->where('id', $id);
        }
        else
        {
          $this->db->order_by('id',"DESC");
        }
        $query = $this->db->get();
        return $query;
    }

    public function search($key)
    {
        $this->db->from('pembayaran');
        $this->db->where("(id_pembelian LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR biaya LIKE '%".$key."%' OR tanggal_bayar LIKE '%".$key."%' OR jenis LIKE '%".$key."%')", NULL, FALSE);
        $this->db->order_by('id',"DESC");
        $query = $this->db->get();
        return $query;
    }

    public function get_by_pembelian($id)
    {
        $this->db->from('pembayaran');
        $this->db->where('id_pembelian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_pembayaran_terakhir($id)
    {
        $this->db->from('pembayaran');
        $this->db->where('id_pembelian', $id);
        $this->db->order_by('id',"DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function get_weekly_pembayaran($tgl)
    {
        $this->db->select('pembayaran.id AS id, pembayaran.tanggal_bayar AS tanggal_bayar, pembayaran.keterangan AS keterangan, pembayaran.nama_pembeli AS nama_pembeli, pembayaran.biaya AS biaya, pembayaran.id_pembelian AS id_pembelian, user.nama AS nama_user');
        $this->db->from('pembayaran');
        $this->db->where('tanggal_bayar >=', $tgl);
        $this->db->where('blokir', "lunas");
        $this->db->join('user','pembayaran.id_user=user.id','LEFT');
        $this->db->order_by('id',"DESC");
        $this->db->limit(5);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_lebih_jatuh_tempo($today)
    {
      $this->db->from('pembayaran');
      $this->db->where('tanggal_jatuh_tempo <', $today);
      $this->db->where('blokir', 'buka');
      $this->db->order_by('id',"DESC");
      $query = $this->db->get()->result();
      return $query;
    }

    public function weekly_pemasukan($tgl)
    {
      $this->db->select_sum('biaya');
      $this->db->where('tanggal_bayar >=', $tgl);
      $query = $this->db->get('pembayaran')->row();
      return $query->biaya;
    }

    public function count_menunggu()
    {
      $this->db->from('pembayaran');
      $this->db->where('blokir', "buka");
      $this->db->order_by('id',"DESC");
      $query = $this->db->count_all_results();
      return $query;
    }

    public function buka($key = null)
    {
      $this->db->from('pembayaran');
      $this->db->where('blokir', "buka");
      if($key != null){
        $this->db->where("(id_pembelian LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR biaya LIKE '%".$key."%' OR tanggal_bayar LIKE '%".$key."%' OR jenis LIKE '%".$key."%')", NULL, FALSE);
      }
      $this->db->order_by('id',"DESC");
      $query = $this->db->get();
      return $query;
    }

    public function lunas($key = null)
    {
      $this->db->from('pembayaran');
      $this->db->where('blokir', "lunas");
      if($key != null){
        $this->db->where("(id_pembelian LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR biaya LIKE '%".$key."%' OR tanggal_bayar LIKE '%".$key."%' OR jenis LIKE '%".$key."%')", NULL, FALSE);
      }
      $this->db->order_by('tanggal_bayar',"DESC");
      $query = $this->db->get();
      return $query;
    }

    public function blokir($key = null)
    {
      $this->db->from('pembayaran');
      $this->db->where('blokir', "blokir");
      if($key != null){
        $this->db->where("(id_pembelian LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR biaya LIKE '%".$key."%' OR tanggal_bayar LIKE '%".$key."%' OR jenis LIKE '%".$key."%')", NULL, FALSE);
      }
      $this->db->order_by('id',"DESC");
      $query = $this->db->get();
      return $query;
    }

    public function add($pembayaran)
    {
        $params['id_kwitansi'] = $pembayaran['id_kwitansi'];
        $params['id_user'] = $pembayaran['id_user'];
        $params['id_pembelian'] = $pembayaran['id_pembelian'];
        $params['nama_pembeli'] = $pembayaran['nama_pembeli'];
        $params['biaya'] = $pembayaran['biaya'];
        $params['tanggal_bayar'] = $pembayaran['tanggal_bayar'];
        $params['tanggal_jatuh_tempo'] = $pembayaran['tanggal_jatuh_tempo'];
        $params['jenis'] = $pembayaran['jenis'];
        $params['keterangan'] = $pembayaran['keterangan'];
        $params['blokir'] = $pembayaran['blokir'];
        $params['cetak_kwitansi'] = "belum";
        $this->db->insert('pembayaran', $params);
    }

    public function bayar($pembayaran)
    {
        $params['id_kwitansi'] = $pembayaran['id_kwitansi'];
        $params['id_user'] = $pembayaran['id_user'];
        $params['tanggal_bayar'] = $pembayaran['tanggal_bayar'];
        $params['keterangan'] = $pembayaran['keterangan'];
        $params['blokir'] = $pembayaran['blokir'];

        $this->db->where('id', $pembayaran['id']);
        $this->db->update('pembayaran', $params);
    }

    public function buka_blokir($id)
    {
      $params['blokir'] = "buka";

      $this->db->where('id', $id);
      $this->db->update('pembayaran', $params);
    }

    public function blokir_pembayaran($id)
    {
      $params['blokir'] = "blokir";

      $this->db->where('id', $id);
      $this->db->update('pembayaran', $params);
    }
    public function delete($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('pembayaran');
    }

    public function tagihan_tunggakan()
    {
      $this->db->select('pembelian.id AS id_pembelian, pembayaran.id AS id, pembayaran.id_kwitansi AS id_kwitansi, pembayaran.id_user AS id_user,
      pembayaran.nama_pembeli AS nama_pembeli, pembayaran.biaya AS biaya, pembayaran.tanggal_bayar AS tanggal_bayar, pembayaran.tanggal_jatuh_tempo AS tanggal_jatuh_tempo,
      pembayaran.jenis AS jenis, pembayaran.keterangan AS keterangan, pembayaran.blokir AS blokir, pembayaran.cetak_kwitansi AS cetak_kwitansi,
      pembelian.status_pembelian AS status_pembelian, pembelian.tanggal_beli AS tanggal_beli, pembelian.DP AS DP,
      pembelian.harga_beli AS harga_beli, pembelian.cicilan_perbulan AS cicilan_perbulan, pembelian.uang_masuk AS uang_masuk,
      pembelian.uang_lainnya AS uang_lainnya, pembelian.counter AS counter, pembelian.tunggakan AS tunggakan,
      pembelian.id_unit AS id_unit, pembelian.id_metode AS id_metode');
      $this->db->from('pembayaran');
      $this->db->join('pembelian', 'pembayaran.id_pembelian=pembelian.id');
      $this->db->where('pembayaran.blokir', 'blokir');
      $this->db->where('pembelian.status_pembelian', 'berjalan');
      $this->db->order_by('pembayaran.tanggal_jatuh_tempo',"ASC");
      $query = $this->db->get()->result();
      return $query;
    }

    public function tagihan_tunggakan_terbaru()
    {
      $this->db->select('pembelian.id AS id_pembelian, pembayaran.id AS id, pembayaran.id_kwitansi AS id_kwitansi, pembayaran.id_user AS id_user,
      pembayaran.nama_pembeli AS nama_pembeli, pembayaran.biaya AS biaya, pembayaran.tanggal_bayar AS tanggal_bayar, pembayaran.tanggal_jatuh_tempo AS tanggal_jatuh_tempo,
      pembayaran.jenis AS jenis, pembayaran.keterangan AS keterangan, pembayaran.blokir AS blokir, pembayaran.cetak_kwitansi AS cetak_kwitansi,
      pembelian.status_pembelian AS status_pembelian, pembelian.tanggal_beli AS tanggal_beli, pembelian.DP AS DP,
      pembelian.harga_beli AS harga_beli, pembelian.cicilan_perbulan AS cicilan_perbulan, pembelian.uang_masuk AS uang_masuk,
      pembelian.uang_lainnya AS uang_lainnya, pembelian.counter AS counter, pembelian.tunggakan AS tunggakan,
      pembelian.id_unit AS id_unit, pembelian.id_metode AS id_metode');
      $this->db->from('pembayaran');
      $this->db->join('pembelian', 'pembayaran.id_pembelian=pembelian.id');
      $this->db->where('pembayaran.blokir', 'blokir');
      $this->db->where('pembelian.status_pembelian', 'berjalan');
      $this->db->order_by('pembayaran.tanggal_jatuh_tempo',"DESC");
      $query = $this->db->get()->result();
      return $query;
    }
    ///////////////////////////////////////////////////////////////////////////
    public function edit($post)
    {
        $params['id_unit'] = $post['id_unit'];
        $params['id_pembeli'] = $post['id_pembeli'];
        $params['DP'] = $post['DP'];
        $params['id_metode'] = $post['id_metode'];
        // $params['tanggal_beli'] = $post['tanggal_beli'];
        $params['status_pembelian'] = $post['status_pembelian'];
        $params['harga_beli'] = $post['harga_beli'];
        $params['cicilan_perbulan'] = $post['cicilan_perbulan'];
        $params['uang_masuk'] = $post['DP'];
        // $params['uang_lainnya'] = 0;
        // $params['counter'] = 0;
        // $params['tunggakan'] = 0;
        $this->db->where('id', $post['pembelian_id']);
        $this->db->update('pembelian', $params);
    }

}
