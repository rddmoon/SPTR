<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('m_unit');
        $this->load->model('m_perumahan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $search = $this->input->post('search');
        if (!empty($search)) {
            $data['unit'] = $this->m_unit->search($search);
            $data['unit_tersedia'] = $this->m_unit->get_unit_tersedia($search);
            $data['unit_terjual'] = $this->m_unit->get_unit_terjual($search);
        } else {
            $data['unit'] = $this->m_unit->get();
            $data['unit_tersedia'] = $this->m_unit->get_unit_tersedia();
            $data['unit_terjual'] = $this->m_unit->get_unit_terjual();        
        }
        // $data['perumahan'] = $this->m_perumahan->get();
        $content = $this->fungsi->user_login()->role . '/unit/view';
        $this->template->load('template', $content, $data);
    }

    public function detail($id)
    {
        $data['unit'] = $this->m_unit->get($id)->row();
        // $data['perumahan'] = $this->m_unit->get_nama_perumahan($data['unit']->id_perumahan);
        $content = $this->fungsi->user_login()->role . '/unit/detail';
        $this->template->load('template', $content, $data);
    }

    public function add($id=null)
    {
        $content = $this->fungsi->user_login()->role . '/unit/add';
        if($id != null){
            $data['perumahan'] = $this->m_perumahan->get($id);
        } else {
            $data['perumahan'] = $this->m_perumahan->get();
        }
        $this->form_validation->set_rules('id_perumahan', 'Perumahan', 'required');
        $this->form_validation->set_rules('cluster', 'Cluster', 'required');
        $this->form_validation->set_rules('blok', 'Blok', 'required');
        $this->form_validation->set_rules('tipe_rumah', 'Tipe Rumah', 'required|numeric');
        $this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'required|numeric');
        $this->form_validation->set_rules('tingkat_rumah', 'Tingkat Rumah', 'required|numeric');
        $this->form_validation->set_rules('BEP', 'BEP', 'required|numeric');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
            $this->template->load('template', $content, $data);
        }
        else{
            $post = $this->input->post(null, TRUE);
            $this->m_unit->add($post);
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            if($id != null){
                echo "<script>window.location='".site_url('perumahan/list_unit/'.$id)."';</script>";
            } else {
                echo "<script>window.location='".site_url('unit')."';</script>";
            }
        }
    }

    public function edit($id)
    {
        $content = $this->fungsi->user_login()->role . '/unit/edit';
        $data['perumahan'] = $this->m_perumahan->get()->result();
        $this->form_validation->set_rules('id_perumahan', 'Perumahan', 'required');
        $this->form_validation->set_rules('cluster', 'Cluster', 'required');
        $this->form_validation->set_rules('blok', 'Blok', 'required');
        $this->form_validation->set_rules('tipe_rumah', 'Tipe Rumah', 'required|numeric');
        $this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'required|numeric');
        $this->form_validation->set_rules('tingkat_rumah', 'Tingkat Rumah', 'required|numeric');
        $this->form_validation->set_rules('BEP', 'BEP', 'required|numeric');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_message('required', '%s masih kosong.');
        $this->form_validation->set_message('numeric', '%s tidak boleh berisi selain angka.');

        if($this->form_validation->run() == FALSE){
            $query = $this->m_unit->get($id);
            if($query->num_rows() > 0){
                $data['unit'] = $query->row();
                $this->template->load('template', $content, $data);
            }
            else{
                echo "<script>alert('Data tidak ditemukan.');";
				echo "window.location='".site_url('unit')."';</script>";
            }
        }
        else{
            $post = $this->input->post(null, TRUE);
            $this->m_unit->edit($post);
            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='".site_url('unit')."';</script>";
        }
    }

    public function delete()
    {
        $id = $this->input->post('unit_id');
        $this->m_unit->delete($id);
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('unit')."';</script>";
    }
}
