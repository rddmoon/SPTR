<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_perumahan extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('perumahan');
        if($id != null){
            $this->db->where('id', $id);
        }
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function search($key)
    {
        $this->db->from('perumahan');
        $this->db->like('nama', $key);
        $this->db->or_like('jumlah_unit', $key);
        $this->db->or_like('lokasi', $key);
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query;
    }

    public function list_unit($id, $key = null)
    {
        $this->db->from('unit');
        $this->db->where('id_perumahan', $id);
        if($key != null){
            $this->db->like('cluster', $key);
            $this->db->or_like('blok', $key);
            $this->db->or_like('tipe_rumah', $key);
        }
        $this->db->order_by('blok', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function list_unit_tersedia($id, $key = null)
    {
        $this->db->from('unit');
        $this->db->where('id_perumahan', $id);
        $this->db->where('status', 'tersedia');
        if($key != null){
            $this->db->like('cluster', $key);
            $this->db->or_like('blok', $key);
            $this->db->or_like('tipe_rumah', $key);
        }
        $this->db->order_by('blok', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function list_unit_terjual($id, $key=null)
    {
        $this->db->from('unit');
        $this->db->where('id_perumahan', $id);
        $this->db->where('status', 'terjual');
        if($key != null){
            $this->db->like('cluster', $key);
            $this->db->or_like('blok', $key);
            $this->db->or_like('tipe_rumah', $key);
        }
        $this->db->order_by('blok', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_nama_perumahan($id)
    {
      $this->db->from('perumahan');
      $this->db->where('id', $id);
      $query = $this->db->get()->row();
      return $query;
    }

    public function list_unit_selected($id)
    {
        $this->db->from('unit');
        $this->db->where('id_perumahan', $id);
        $this->db->where('status', 'tersedia');
        $this->db->order_by('blok', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function unit_by_perumahan($id)
    {
        $this->db->from('unit');
        $this->db->where('id_perumahan', $id);
        $this->db->where('status', 'tersedia');
        $this->db->order_by('blok', 'asc');
        $query = $this->db->get();
        $output = '<option value="">- Pilih Unit -</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->blok.' cluster '.$row->cluster.'</option>';
        }
        return $output;
    }

    public function unit_by_perumahan_edit($id)
    {
        $this->db->from('unit');
        $this->db->where('id_perumahan', $id);
        $this->db->where('status', 'tersedia');
        $this->db->order_by('blok', 'asc');
        $query = $this->db->get();

        //$sperumahan = $this->input->post('perumahan') ? $this->input->post('perumahan') : $perumahan_selected;
        $output = '<option value="">- Pilih Unit -</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->id.'"'.$row->id == $pembelian->id_unit ? 'selected' : null.'>'.$row->blok.' cluster '.$row->cluster.'</option>';
        }
        return $output;
    }

    public function add($post)
    {
        $params['nama'] = $post['nama'];
        $params['jumlah_unit'] = $post['jumlah_unit'];
        $params['lokasi'] = $post['lokasi'];
        $this->db->insert('perumahan', $params);
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
        $this->db->delete('perumahan');
    }
}
