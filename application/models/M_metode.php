<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_metode extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('metode');
    if($id != null)
    {
      $this->db->where('id', $id);
    }
    else
    {
      $this->db->order_by('banyaknya_cicilan', 'asc');
    }

    $query = $this->db->get();
    return $query;
  }

  public function search($key)
  {
    $this->db->from('metode');
    $this->db->like('nama_metode', $key);
    $this->db->or_like('banyaknya_cicilan', $key);
    $query = $this->db->get();
    return $query;
  }

  public function get_banyak_cicilan($id)
  {
    $this->db->from('metode');
    $this->db->where('id', $id);
    $query = $this->db->get()->row()->banyaknya_cicilan;
    return $query;
  }

  public function add($post)
  {
    $params['nama_metode'] = $post['nama_metode'];
    $params['banyaknya_cicilan'] = $post['banyaknya_cicilan'];
    $this->db->insert('metode', $params);
  }

  public function edit($post)
  {
    $params['nama_metode'] = $post['nama_metode'];
    $params['banyaknya_cicilan'] = $post['banyaknya_cicilan'];
    $this->db->where('id', $post['metode_id']);
    $this->db->update('metode', $params);
  }

  public function delete($id)
	{
		$this->db->where('id', $id);
    $this->db->delete('metode');
	}
}
