<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('m_pembelian');
        $this->load->model('m_pembeli');
        $this->load->model('m_perumahan');
        $this->load->model('m_metode');
        $this->load->model('m_unit');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pembelian'] = $this->m_pembelian->get();
        $content = $this->fungsi->user_login()->role . '/pembelian/view';
        $this->template->load('template', $content, $data);
    }

    public function get_unit_by_perumahan()
    {
      if($this->input->post('perumahan_id'))
      {
       echo $this->m_perumahan->unit_by_perumahan($this->input->post('perumahan_id'));
      }
    }

    public function get_unit_by_perumahan_edit()
    {
      $this->m_unit->edit_status_tersedia('unit_id');
      if($this->input->post('perumahan_id'))
      {
       echo $this->m_perumahan->unit_by_perumahan_edit($this->input->post('perumahan_id'));
      }
    }

    public function get_harga_beli()
    {
      $value = $this->input->post('value');

      $harga = $this->m_unit->get_harga($value);

      echo $harga;
      // if($this->input->post('id_unit'))
      // {
      //  echo $this->m_unit->get_harga($this->input->post('id_unit'));
      // }
    }

    public function add()
    {
        $data['perumahan'] = $this->m_perumahan->get()->result();
        $data['pembeli'] = $this->m_pembeli->get();
        $data['metode'] = $this->m_metode->get();
        $content = $this->fungsi->user_login()->role . '/pembelian/add';
        // $this->template->load('template', $content, $data);

        $this->form_validation->set_rules('perumahan', 'Perumahan', 'required');
        $this->form_validation->set_rules('id_pembeli', 'Pembeli', 'required');
        $this->form_validation->set_rules('id_unit', 'Unit', 'required');
        $this->form_validation->set_rules('DP', 'DP', 'required|numeric');
        $this->form_validation->set_rules('id_metode', 'Metode', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
        $this->form_validation->set_rules('cicilan_perbulan', 'Cicilan Perbulan', 'required|numeric');
        // $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
          $this->template->load('template', $content, $data);
        }
        else{
            $post = $this->input->post(null,TRUE);
            $this->m_pembelian->add($post);
            $this->m_unit->edit_status_terjual($post['id_unit']);
            // $cicilan = $this->m_metode->get_banyak_cicilan($post['id_metode']);
            // if($cicilan > 1){
            //   generate_pembayaran($post);
            // }
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='".site_url('pembelian')."';</script>";
        }
    }

    public function edit($id)
    {
      $data['perumahan'] = $this->m_perumahan->get()->result();
      $data['pembeli'] = $this->m_pembeli->get()->result();
      $data['metode'] = $this->m_metode->get()->result();
      $data['unit'] = $this->m_unit->get_unit_tersedia()->result();
      $content = $this->fungsi->user_login()->role . '/pembelian/edit';

      $this->form_validation->set_rules('perumahan', 'Perumahan', 'required');
      $this->form_validation->set_rules('id_pembeli', 'Pembeli', 'required');
      $this->form_validation->set_rules('id_unit', 'Unit', 'required');
      $this->form_validation->set_rules('DP', 'DP', 'required|numeric');
      $this->form_validation->set_rules('id_metode', 'Metode', 'required');
      $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
      $this->form_validation->set_rules('cicilan_perbulan', 'Cicilan Perbulan', 'required|numeric');
      $this->form_validation->set_rules('status_pembelian', 'Status Pembelian', 'required');
      $this->form_validation->set_message('required', '%s masih kosong.');
      $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

      $query = $this->m_pembelian->get($id);
        if($this->form_validation->run() == FALSE){
            if($query->num_rows() > 0){
                $data['pembelian'] = $query->row();
                $id_perumahan = $this->m_unit->get_id_perumahan($data['pembelian']->id_unit);
                $data['unit_selected'] = $this->m_unit->get($data['pembelian']->id_unit)->row();
                $data['perumahan_selected'] = $this->m_unit->get_id_perumahan($id_perumahan);
                $this->template->load('template', $content, $data);
            }
            else{
                echo "<script>alert('Data tidak ditemukan.');";
				        echo "window.location='".site_url('pembelian')."';</script>";
            }
        }
        else
        {
            $post = $this->input->post(null,TRUE);
            $this->m_unit->edit_status_terjual($query->row()->id_unit);
            if ($post['id_unit'] != $data['pembelian']->id_unit)
            {
              $this->m_unit->edit_status_terjual($post['id_unit']);
              $this->m_unit->edit_status_tersedia($data['pembelian']->id_unit);
            }
      			$this->m_pembelian->edit($post);
      			if($this->db->affected_rows() > 0)
      			{
      				echo "<script>alert('Data berhasil disimpan');</script>";
      			}
      			echo "<script>window.location='".site_url('pembelian')."';</script>";
          }
      }

    public function delete()
    {
        $id = $this->input->post('pembelian_id');
        $this->m_pembelian->delete($id);
        $this->m_unit->edit_status_tersedia($id);
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('pembelian')."';</script>";
    }
}
