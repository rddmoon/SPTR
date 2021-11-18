<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_pembayaran_tambahan extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('pembayaran_tambahan');
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

    public function get_by_pembelian($id)
    {
        $this->db->from('pembayaran_tambahan');
        $this->db->where('id_pembelian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_pembayaran_terakhir($id)
    {
        $this->db->from('pembayaran_tambahan');
        $this->db->where('id_pembelian', $id);
        $this->db->order_by('id',"DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function buka()
    {
      $this->db->from('pembayaran_tambahan');
      $this->db->where('tanggal_bayar');
      $this->db->order_by('id',"DESC");
      $query = $this->db->get();
      return $query;
    }

    public function lunas()
    {
      $this->db->from('pembayaran_tambahan');
      $this->db->where('tanggal_bayar IS NOT NULL');
      $this->db->order_by('id',"DESC");
      $query = $this->db->get();
      return $query;
    }

    // public function blokir()
    // {
    //   $this->db->from('pembayaran_tambahan');
    //   $this->db->where('blokir', "blokir");
    //   $this->db->order_by('id',"DESC");
    //   $query = $this->db->get();
    //   return $query;
    // }

    public function pembelian_by_pembeli($id)
    {
      $this->db->from('pembelian');
      $this->db->where('id_pembeli', $id);
      $this->db->where('status_pembelian', 'berjalan');
      $query = $this->db->get();

      $output = '<option value="">- Pilih ID Pembelian -</option>';
      foreach($query->result() as $row)
      {
       $tglbeli =  date('d M Y', strtotime($row->tanggal_beli));
       $output .= '<option value="'.$row->id.'">'.$row->id.' - Tgl Beli '.$tglbeli.'</option>';
      }
      return $output;
    }

    public function add($pembayaran)
    {
        $params['id_kwitansi'] = $pembayaran['id_kwitansi'];
        $params['id_user'] = $pembayaran['id_user'];
        $params['id_pembelian'] = $pembayaran['id_pembelian'];
        $params['nama_pembeli'] = $pembayaran['nama_pembeli'];
        $params['biaya'] = $pembayaran['biaya'];
        $params['tanggal_bayar'] = NULL;
        $params['tanggal_jatuh_tempo'] = $pembayaran['tanggal_jatuh_tempo'];
        $params['jenis_pembayaran'] = $pembayaran['jenis_pembayaran'];
        $params['keterangan'] = $pembayaran['keterangan'];
        $params['cetak_kwitansi'] = "belum";
        $this->db->insert('pembayaran_tambahan', $params);
    }

    public function bayar($pembayaran)
    {
        $params['id_kwitansi'] = $pembayaran['id_kwitansi'];
        $params['id_user'] = $pembayaran['id_user'];
        $params['tanggal_bayar'] = $pembayaran['tanggal_bayar'];
        $params['keterangan'] = $pembayaran['keterangan'];

        $this->db->where('id', $pembayaran['id']);
        $this->db->update('pembayaran_tambahan', $params);
    }

    ///////////////////////////////////////////////////////////////////////////
    // public function buka_blokir($id)
    // {
    //   $params['blokir'] = "buka";
    //
    //   $this->db->where('id', $id);
    //   $this->db->update('pembayaran_tambahan', $params);
    // }

    // public function blokir_pembayaran($id)
    // {
    //   $params['blokir'] = "blokir";
    //
    //   $this->db->where('id', $id);
    //   $this->db->update('pembayaran_tambahan', $params);
    // }
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

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pembayaran');
    }
}
