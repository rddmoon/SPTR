<?php

function cek_sudah_login()
{
  $ci =& get_instance();
  $user_session = $ci->session->userdata('user_id');
  if($user_session)
  {
    redirect('dashboard');
  }
}

function cek_belum_login()
{
  $ci =& get_instance();
  $user_session = $ci->session->userdata('user_id');
  if(!$user_session)
  {
    redirect('auth/login');
  }
}
 ?>
