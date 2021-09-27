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
        $query = $this->db->get();
        return $query;
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
        $this->db->where('id', $post['id']);
        $this->db->update('perumahan', $params);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('perumahan');
    }
}





?>