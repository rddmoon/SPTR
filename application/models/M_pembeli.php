<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pembeli extends CI_Model
{

  public function get($id = null)
  {
    $this->db->from('pembeli');
    if($id != null)
    {
      $this->db->where('id', $id);
    }
    else {
      $this->db->order_by('nama_pembeli', 'asc');
    }
    $query = $this->db->get();
    return $query;
  }

  public function search($key)
    {
        $this->db->from('pembeli');
        $this->db->like('nama_pembeli', $key);
        $this->db->or_like('NIK', $key);
        $this->db->or_like('alamat', $key);
        $this->db->or_like('telepon', $key);
        $this->db->or_like('ttl', $key);
        $this->db->or_like('status_perkawinan', $key);
        $this->db->or_like('pekerjaan', $key);
        $this->db->order_by('nama_pembeli');
        $query = $this->db->get();
        return $query;
    }

  public function add($post)
  {
    $date = new DateTime($post['tl']);
    $tl = $date->format('d M Y');
    $params['nama_pembeli'] = $post['nama'];
    $params['NIK'] = $post['NIK'];
    $params['alamat'] = $post['alamat'];
    $params['telepon'] = $post['telepon'];
    $params['ttl'] = $post['tempat'].', '. $tl;
    $params['status_perkawinan'] = $post['status_perkawinan'];
    $params['pekerjaan'] = $post['pekerjaan'];
    $this->db->insert('pembeli', $params);
  }

  public function edit($post)
  {
    $date = new DateTime($post['tl']);
    $tl = $date->format('d M Y');
    $params['nama_pembeli'] = $post['nama'];
    $params['NIK'] = $post['NIK'];
    $params['alamat'] = $post['alamat'];
    $params['telepon'] = $post['telepon'];
    $params['ttl'] = $post['tempat'].', '. $tl;
    $params['status_perkawinan'] = $post['status_perkawinan'];
    $params['pekerjaan'] = $post['pekerjaan'];
    $this->db->where('id', $post['pembeli_id']);
    $this->db->update('pembeli', $params);
  }

  public function delete($id)
	{
		$this->db->where('id', $id);
    $this->db->delete('pembeli');
	}
}
