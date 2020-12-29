<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteriabuah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("masterkriteriabuah_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["kriteriabuah"] = $this->masterkriteriabuah_model->getAll();
        $this->load->view("admin/kriteriabuah/list", $data);
    }

    public function add()
    {
        $kriteriabuah = $this->masterkriteriabuah_model;
        $validation = $this->form_validation;
        $validation->set_rules($kriteriabuah->rules());

        if ($validation->run()) {
            $kriteriabuah->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kriteriabuah/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kriteriabuah');
       
        $kriteriabuah = $this->masterkriteriabuah_model;
        $validation = $this->form_validation;
        $validation->set_rules($kriteriabuah->rules());

        if ($validation->run()) {
            $kriteriabuah->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kriteriabuah"] = $kriteriabuah->getById($id);
        if (!$data["kriteriabuah"]) show_404();
        
        $this->load->view("admin/kriteriabuah/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->masterkriteriabuah_model->delete($id)) {
            redirect(site_url('admin/kriteriabuah'));
        }
    }
}