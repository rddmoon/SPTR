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

    public function list_unit($id)
    {
        $this->db->from('unit');
        $this->db->where('id_perumahan', $id);
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

    // public function unit_by_perumahan_edit($id)
    // {
    //     $this->db->from('unit');
    //     $this->db->where('id_perumahan', $id);
    //     $this->db->where('status', 'tersedia');
    //     $this->db->order_by('blok', 'asc');
    //     $query = $this->db->get();
    //     $output = '<option value="">- Pilih Unit -</option>';
    //     foreach($query->result() as $row)
    //     {
    //      $output .= '<option value="'.$row->id.'"'.$sunit == $row->id ? 'selected' : null.'>'.$row->blok.' cluster '.$row->cluster.'</option>';
    //     }
    //     return $output;
    // }

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
