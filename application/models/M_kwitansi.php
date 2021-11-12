<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kwitansi extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('kwitansi');
        if($id != null){
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($kwitansi)
    {
        $params['id'] = $kwitansi['id'];
        $params['biaya'] = $kwitansi['biaya'];
        $params['tanggal_bayar'] = $kwitansi['tanggal_bayar'];
        $params['keterangan'] = $kwitansi['keterangan'];
        $params['id_user'] = NULL;
        $params['pencetak'] = NULL;
        $params['nama_pembeli'] = $kwitansi['nama_pembeli'];
        $params['sudah_cetak'] = "belum";

        $this->db->insert('kwitansi', $params);
    }

    public function cetak($post)
    {
        $params['id_user'] = $post['id_user'];
        $params['pencetak'] = $post['pencetak'];
        $params['sudah_cetak'] = "sudah";

        $this->db->insert('kwitansi', $params);
    }
    //////////////////////////////////////////////
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
        $this->db->delete('kwitansi');
    }
}
