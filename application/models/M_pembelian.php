<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('pembelian.id AS id, pembelian.id_unit AS id_unit, pembelian.id_pembeli AS id_pembeli, pembelian.id_metode AS id_metode,
        pembelian.status_pembelian AS status_pembelian, pembelian.tanggal_beli AS tanggal_beli, pembelian.DP AS DP, 
        pembelian.harga_beli AS harga_beli, pembelian.cicilan_perbulan AS cicilan_perbulan,  pembelian.uang_masuk AS uang_masuk,
        pembelian.uang_lainnya AS uang_lainnya, pembelian.counter AS counter, pembelian.tunggakan AS tunggakan,
        pembeli.nama_pembeli AS nama_pembeli, pembeli.NIK AS NIK, pembeli.alamat AS alamat, pembeli.telepon AS telepon,
        unit.cluster AS cluster, unit.blok AS blok, unit.tipe_rumah AS tipe_rumah,
        metode.nama_metode AS nama_metode');
        $this->db->from('pembelian');
        $this->db->join('pembeli', 'pembelian.id_pembeli=pembeli.id');
        $this->db->join('metode', 'pembelian.id_metode=metode.id');
        $this->db->join('unit', 'pembelian.id_unit=unit.id');
        if($id != null)
        {
            // $this->db->where('id', $id);
            $this->db->where('pembelian.id', $id);
        }
        else
        {
        //   $this->db->order_by('id',"DESC");
          $this->db->order_by('pembelian.id',"DESC");
        }
        $query = $this->db->get();
        return $query;
    }

    public function search($key)
    {
        $this->db->select('pembelian.id AS id, pembelian.id_unit AS id_unit, pembelian.id_pembeli AS id_pembeli, pembelian.id_metode AS id_metode,
        pembelian.status_pembelian AS status_pembelian, pembelian.tanggal_beli AS tanggal_beli, pembelian.DP AS DP, 
        pembelian.harga_beli AS harga_beli, pembelian.cicilan_perbulan AS cicilan_perbulan,  pembelian.uang_masuk AS uang_masuk,
        pembelian.uang_lainnya AS uang_lainnya, pembelian.counter AS counter, pembelian.tunggakan AS tunggakan,
        pembeli.nama_pembeli AS nama_pembeli, pembeli.NIK AS NIK, pembeli.alamat AS alamat, pembeli.telepon AS telepon,
        unit.cluster AS cluster, unit.blok AS blok, unit.tipe_rumah AS tipe_rumah,
        metode.nama_metode AS nama_metode');
        $this->db->from('pembelian');
        $this->db->join('pembeli', 'pembelian.id_pembeli=pembeli.id');
        $this->db->join('metode', 'pembelian.id_metode=metode.id');
        $this->db->join('unit', 'pembelian.id_unit=unit.id');
        $this->db->where("(pembelian.id LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR nama_metode LIKE '%".$key."%')", NULL, FALSE);
        $query = $this->db->get();
        return $query;
    }

    public function count_berjalan()
    {
        $this->db->from('pembelian');
        $this->db->where('status_pembelian', "berjalan");
        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_berjalan($key = null)
    {
        $this->db->select('pembelian.id AS id, pembelian.id_unit AS id_unit, pembelian.id_pembeli AS id_pembeli, pembelian.id_metode AS id_metode,
        pembelian.status_pembelian AS status_pembelian, pembelian.tanggal_beli AS tanggal_beli, pembelian.DP AS DP, 
        pembelian.harga_beli AS harga_beli, pembelian.cicilan_perbulan AS cicilan_perbulan,  pembelian.uang_masuk AS uang_masuk,
        pembelian.uang_lainnya AS uang_lainnya, pembelian.counter AS counter, pembelian.tunggakan AS tunggakan,
        pembeli.nama_pembeli AS nama_pembeli, pembeli.NIK AS NIK, pembeli.alamat AS alamat, pembeli.telepon AS telepon,
        unit.cluster AS cluster, unit.blok AS blok, unit.tipe_rumah AS tipe_rumah,
        metode.nama_metode AS nama_metode');
        $this->db->from('pembelian');
        $this->db->join('pembeli', 'pembelian.id_pembeli=pembeli.id');
        $this->db->join('metode', 'pembelian.id_metode=metode.id');
        $this->db->join('unit', 'pembelian.id_unit=unit.id');
        $this->db->where('status_pembelian', "berjalan");
        if($key != null){
            $this->db->where("(pembelian.id LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR nama_metode LIKE '%".$key."%')", NULL, FALSE);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_selesai($key = null)
    {
        $this->db->select('pembelian.id AS id, pembelian.id_unit AS id_unit, pembelian.id_pembeli AS id_pembeli, pembelian.id_metode AS id_metode,
        pembelian.status_pembelian AS status_pembelian, pembelian.tanggal_beli AS tanggal_beli, pembelian.DP AS DP, 
        pembelian.harga_beli AS harga_beli, pembelian.cicilan_perbulan AS cicilan_perbulan,  pembelian.uang_masuk AS uang_masuk,
        pembelian.uang_lainnya AS uang_lainnya, pembelian.counter AS counter, pembelian.tunggakan AS tunggakan,
        pembeli.nama_pembeli AS nama_pembeli, pembeli.NIK AS NIK, pembeli.alamat AS alamat, pembeli.telepon AS telepon,
        unit.cluster AS cluster, unit.blok AS blok, unit.tipe_rumah AS tipe_rumah,
        metode.nama_metode AS nama_metode');
        $this->db->from('pembelian');
        $this->db->join('pembeli', 'pembelian.id_pembeli=pembeli.id');
        $this->db->join('metode', 'pembelian.id_metode=metode.id');
        $this->db->join('unit', 'pembelian.id_unit=unit.id');
        $this->db->where('status_pembelian', "selesai");
        if($key != null){
            $this->db->where("(pembelian.id LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR nama_metode LIKE '%".$key."%')", NULL, FALSE);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_dibatalkan($key = null)
    {
        $this->db->select('pembelian.id AS id, pembelian.id_unit AS id_unit, pembelian.id_pembeli AS id_pembeli, pembelian.id_metode AS id_metode,
        pembelian.status_pembelian AS status_pembelian, pembelian.tanggal_beli AS tanggal_beli, pembelian.DP AS DP, 
        pembelian.harga_beli AS harga_beli, pembelian.cicilan_perbulan AS cicilan_perbulan,  pembelian.uang_masuk AS uang_masuk,
        pembelian.uang_lainnya AS uang_lainnya, pembelian.counter AS counter, pembelian.tunggakan AS tunggakan,
        pembeli.nama_pembeli AS nama_pembeli, pembeli.NIK AS NIK, pembeli.alamat AS alamat, pembeli.telepon AS telepon,
        unit.cluster AS cluster, unit.blok AS blok, unit.tipe_rumah AS tipe_rumah,
        metode.nama_metode AS nama_metode');
        $this->db->from('pembelian');
        $this->db->join('pembeli', 'pembelian.id_pembeli=pembeli.id');
        $this->db->join('metode', 'pembelian.id_metode=metode.id');
        $this->db->join('unit', 'pembelian.id_unit=unit.id');
        $this->db->where('status_pembelian', "dibatalkan");
        if($key != null){
            $this->db->where("(pembelian.id LIKE '%".$key."%' OR nama_pembeli LIKE '%".$key."%' OR nama_metode LIKE '%".$key."%')", NULL, FALSE);
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
        $this->db->where('id_pembelian',$id);
        $this->db->where('blokir !=',"blokir");
        $query = $this->db->count_all_results() - 1;
        return $query;
    }

    public function get_weekly_pembelian($tgl)
    {
        $this->db->select('pembelian.id AS id, pembeli.nama_pembeli AS nama_pembeli, unit.blok AS blok, unit.cluster AS cluster, pembelian.tanggal_beli AS tanggal_beli');
        $this->db->from('pembelian');
        $this->db->where('pembelian.tanggal_beli >=', $tgl);
        $this->db->where('pembelian.status_pembelian !=', 'dibatalkan');
        $this->db->join('pembeli','pembelian.id_pembeli=pembeli.id','LEFT');
        $this->db->join('unit','pembelian.id_unit=unit.id','LEFT');
        $this->db->order_by('pembelian.id',"DESC");
        $this->db->limit(3);
        $query = $this->db->get()->result();
        return $query;
    }

    public function count_weekly_pembelian($tgl)
    {
        $this->db->from('pembelian');
        $this->db->where('tanggal_beli >=', $tgl);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function weekly_pemasukan($tgl)
    {
      $this->db->select_sum('uang_masuk');
      $this->db->where('tanggal_beli >=', $tgl);
      $query = $this->db->get('pembelian')->row();
      return $query->uang_masuk;
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

    public function selesai($id)
    {
      $params['status_pembelian'] = "selesai";

      $this->db->where('id', $id);
      $this->db->update('pembelian', $params);
    }

    public function dibatalkan($id)
    {
        $params['status_pembelian'] = "dibatalkan";

        $this->db->where('id', $id);
        $this->db->update('pembelian', $params);
    }

    public function pindah_tangan($post)
    {
        $params['id_pembeli'] = $post['id_pembeli'];

        $this->db->where('id', $post['id']);
        $this->db->update('pembelian', $params);
    }

    public function uang_masuk($bayar)
    {
        $params['uang_masuk'] = $bayar['biaya'];

        $this->db->where('id', $bayar['pembelian_id']);
        $this->db->update('pembelian', $params);
    }

    public function uang_lainnya($bayar)
    {
        $params['uang_lainnya'] = $bayar['biaya'];

        $this->db->where('id', $bayar['pembelian_id']);
        $this->db->update('pembelian', $params);
    }

    public function counter_bayar($id)
    {
        $this->db->set('counter', 'counter+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('pembelian');

        $this->db->from('pembelian');
        $this->db->where('id', $id);
        $query = $this->db->get()->row()->counter;
        return $query;
    }

    public function counter_blokir($id)
    {
        $this->db->set('counter', 'counter-1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('pembelian');

        $this->db->from('pembelian');
        $this->db->where('id', $id);
        $query = $this->db->get()->row()->counter;
        return $query;
    }

    public function refresh_tunggakan($data)
    {
        $params['tunggakan'] = $data['tunggakan'];
        $this->db->where('id', $data['id_pembelian']);
        $this->db->update('pembelian', $params);
    }

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
        $this->db->delete('pembelian');
    }
}
