<?php

class Fungsi
{
  protected $ci;
  function __construct()
  {
    $this->ci =& get_instance();
  }

  function user_login()
  {
    $this->ci->load->model('m_user');
    $user_id = $this->ci->session->user_data('id');
    $user_data = $this->ci->m_user->get($user_id)->row();
    return $user_data;
  }
}

 ?>
