<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perumahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('m_perumahan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['perumahan'] = $this->m_perumahan->get();
        $content = $this->fungsi->user_login()->role . '/perumahan/view';
        $this->template->load('template', $content, $data);
    }

    public function list_unit($id)
    {
      $data['list_unit'] = $this->m_perumahan->list_unit($id);
      $data['list_unit_tersedia'] = $this->m_perumahan->list_unit_tersedia($id);
      $data['list_unit_terjual'] = $this->m_perumahan->list_unit_terjual($id); 
      $data['perumahan'] = $this->m_perumahan->get($id)->row();
      $content = $this->fungsi->user_login()->role . '/perumahan/list_unit';
      $this->template->load('template', $content, $data);
    }

    public function add()
    {
        $content = $this->fungsi->user_login()->role . '/perumahan/add';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah_unit', 'Jumlah Unit', 'required|numeric');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
            $this->template->load('template', $content);
        }
        else{
            $post = $this->input->post(null,TRUE);
            $this->m_perumahan->add($post);
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='".site_url('perumahan')."';</script>";
        }
    }

    public function edit($id)
    {
        $content = $this->fungsi->user_login()->role . '/perumahan/edit';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah_unit', 'Jumlah Unit', 'required|numeric');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
            $query = $this->m_perumahan->get($id);
            if($query->num_rows() > 0){
                $data['perumahan'] = $query->row();
                $this->template->load('template', $content, $data);
            }
            else{
                echo "<script>alert('Data tidak ditemukan.');";
				echo "window.location='".site_url('perumahan')."';</script>";
            }
        }
        else
        {
            $post = $this->input->post(null,TRUE);
			$this->m_perumahan->edit($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('perumahan')."';</script>";
        }
    }

    public function delete()
    {
        $id = $this->input->post('perumahan_id');
        $this->m_perumahan->delete($id);
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('perumahan')."';</script>";
    }
}
