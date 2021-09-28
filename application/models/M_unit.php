<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_rumah extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('unit');
        $this->db->join('perumahan', 'perumahan.id = unit.id_perumahan');
        if($id != null){
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
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