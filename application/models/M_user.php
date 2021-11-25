<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $post['username']);
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function get($id = null)
  {
    $this->db->from('user');
    if($id != null)
    {
      $this->db->where('id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function check_password($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params['username'] = $post['username'];
    $params['nama'] = $post['nama'];
    $params['password'] = sha1($post['password']);
    $params['role'] = $post['role'];
    $this->db->insert('user', $params);
  }

  public function edit($post)
  {
    $params['username'] = $post['username'];
    $params['nama'] = $post['nama'];
    if (!empty($post['password']))
    {
      $params['password'] = sha1($post['password']);
    }
    $params['role'] = $post['role'];
    $this->db->where('id', $post['user_id']);
    $this->db->update('user', $params);
  }

  public function edit_profil($post)
  {
    $params['username'] = $post['username'];
    $params['nama'] = $post['nama'];
    if (!empty($post['password']))
    {
      $params['password'] = sha1($post['password']);
    }
    $this->db->where('id', $post['user_id']);
    $this->db->update('user', $params);
  }

  public function delete($id)
	{
		$this->db->where('id', $id);
    $this->db->delete('user');
	}
}
