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
        $this->load->model('m_pembayaran');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pembelian'] = $this->m_pembelian->get();
        $content = $this->fungsi->user_login()->role . '/pembelian/view';
        $this->template->load('template', $content, $data);
    }

    public function detail($id)
    {
        $data['pembelian'] = $this->m_pembelian->get($id)->row();
        $data['metode_selected'] = $this->m_metode->get($data['pembelian']->id_metode)->row();
        $data['cicilan_ke'] = $this->m_pembelian->get_cicilan_ke($data['pembelian']->id);
        $data['pembeli_selected'] = $this->m_pembeli->get($data['pembelian']->id_pembeli)->row();
        $data['unit_selected'] = $this->m_unit->get($data['pembelian']->id_unit)->row();
        $id_perumahan = $this->m_unit->get_id_perumahan($data['pembelian']->id_unit);
        $data['perumahan_selected'] = $this->m_unit->get_nama_perumahan($id_perumahan);

        $data['pembayaran'] = $this->m_pembayaran->get_by_pembelian($data['pembelian']->id)->result();

        $content = $this->fungsi->user_login()->role . '/pembelian/detail';
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
        if($this->input->post('perumahan_id'))
        {
         $data = $this->m_perumahan->unit_by_perumahan_edit($this->input->post('perumahan_id'));
         echo json_encode($data);
        }
        // $perumahan_id = $this->input->post('perumahan_id',TRUE);
        // $data = $this->m_perumahan->get_unit_by_perumahan_edit($perumahan_id);
        // echo json_encode($data);
    }

    function get_data_edit(){
      $pembelian_id = $this->input->post('pembelian_id',TRUE);
      $data['id_unit'] = $this->m_pembelian->get($pembelian_id)->row()->id_unit;
      $data['blok'] = $this->m_unit->get($pembelian_id)->row()->blok;
      $data['cluster'] = $this->m_unit->get($pembelian_id)->row()->cluster;
      // $id_perumahan = $this->m_unit->get_id_perumahan($data['pembelian']->id_unit);
      // $data['perumahan'] = $this->m_unit->get_id_perumahan($id_perumahan);
      echo json_encode($data);
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
        //$this->form_validation->set_rules('cicilan_perbulan', 'Cicilan Perbulan', 'required|numeric');
        // $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
          $this->template->load('template', $content, $data);
        }
        else{
            $post = $this->input->post(null,TRUE);
            $banyaknya_cicilan = $this->m_metode->get($post['id_metode'])->row()->banyaknya_cicilan;
            $post['cicilan_perbulan'] = ($post['harga_beli'] - $post['DP'])/$banyaknya_cicilan;
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
                $this->m_unit->edit_status_tersedia($query->row()->id_unit);
                $data['pembelian'] = $query->row();
                $id_perumahan = $this->m_unit->get_id_perumahan($data['pembelian']->id_unit);
                $data['unit_selected'] = $this->m_unit->get($data['pembelian']->id_unit)->row();
                $data['perumahan_selected'] = $this->m_unit->get_id_perumahan($id_perumahan);
                $data['list_unit_selected'] = $this->m_perumahan->list_unit_selected($data['perumahan_selected'])->result();
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
      			$this->m_pembelian->edit($post);
      			if($this->db->affected_rows() > 0)
      			{
              $this->m_unit->edit_status_terjual($query->row()->id_unit);
              if ($post['id_unit'] != $data['pembelian']->id_unit)
              {
                $this->m_unit->edit_status_terjual($post['id_unit']);
                $this->m_unit->edit_status_tersedia($data['pembelian']->id_unit);
              }
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