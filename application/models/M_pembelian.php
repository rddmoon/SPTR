<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('pembelian');
        if($id != null){
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_nama_pembeli($id)
    {
        $this->db->from('pembeli');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_nama_metode($id)
    {
        $this->db->from('metode');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_cicilan_ke($id)
    {
        $this->db->from('pembayaran');
        $this->db->join('pembelian', 'pembelian.id = pembayaran.id_pembelian', 'left');
        $this->db->where('id_pembelian', $id);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function add($post)
    {
        $params['id'] = $post['pembelian_id'];
        $params['id_unit'] = $post['id_unit'];
        $params['id_pembeli'] = $post['id_pembeli'];
        $params['DP'] = $post['DP'];
        $params['id_metode'] = $post['id_metode'];
        $params['tanggal_beli'] = $post['tanggal_beli'];
        $params['status_pembelian'] = $post['status_pembelian'];
        $params['harga_beli'] = $post['harga_beli'];
        $params['cicilan_perbulan'] = $post['cicilan_perbulan'];
        $params['uang_masuk'] = $post['DP'];
        $params['uang_lainnya'] = 0;
        $params['counter'] = 0;
        $params['tunggakan'] = 0;
        $this->db->insert('pembelian', $params);
    }
    public function edit($post)
    {
        $params['nama'] = $post['nama'];
        $params['jumlah_unit'] = $post['jumlah_unit'];
        $params['lokasi'] = $post['lokasi'];
        $this->db->where('id', $post['perumahan_id']);
        $this->db->update('perumahan', $params);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pembelian');
    }
}
