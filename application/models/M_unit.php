<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_unit extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('unit');
        if($id != null){
            $this->db->where('id', $id);
        }
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

    public function get_id_perumahan($id)
    {
      $this->db->from('unit');
      $this->db->where('id', $id);
      $query = $this->db->get()->row()->id_perumahan;
      return $query;
    }
    public function get_unit_tersedia()
    {
      $this->db->from('unit');
      $this->db->where('status', 'tersedia');
      $query = $this->db->get();
      return $query;
    }

    // public function get_harga($id)
    // {
    //   $this->db->from('unit');
    //   $this->db->where('id', $id);
    //   $query = $this->db->get()->row()->harga_jual;
    //   //$output = '<input id="harga_beli" type="text" name="harga_beli" value="'.$query->harga_jual.'" class="form-control">';
    //   return $query;
    // }

    public function edit_status_terjual($id)
    {
      $params['status'] = "terjual";
      $this->db->where('id', $id);
      $this->db->update('unit', $params);
    }

    public function edit_status_tersedia($id)
    {
      $params['status'] = "tersedia";
      $this->db->where('id', $id);
      $this->db->update('unit', $params);
    }

    public function add($post)
    {
        $params['id_perumahan'] = $post['id_perumahan'];
        $params['cluster'] = $post['cluster'];
        $params['blok'] = $post['blok'];
        $params['tipe_rumah'] = $post['tipe_rumah'];
        $params['luas_tanah'] = $post['luas_tanah'];
        $params['tingkat_rumah'] = $post['tingkat_rumah'];
        $params['BEP'] = $post['BEP'];
        $params['harga_jual'] = $post['harga_jual'];
        $this->db->insert('unit', $params);
    }
    public function edit($post)
    {
        $params['id_perumahan'] = $post['id_perumahan'];
        $params['cluster'] = $post['cluster'];
        $params['blok'] = $post['blok'];
        $params['tipe_rumah'] = $post['tipe_rumah'];
        $params['luas_tanah'] = $post['luas_tanah'];
        $params['tingkat_rumah'] = $post['tingkat_rumah'];
        $params['BEP'] = $post['BEP'];
        $params['harga_jual'] = $post['harga_jual'];
        $this->db->where('id', $post['unit_id']);
        $this->db->update('unit', $params);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('unit');
    }
}
