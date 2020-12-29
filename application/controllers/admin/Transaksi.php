<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
  class Transaksi extends CI_Controller {
    public function __construct() {
       parent::__construct();
       $this->load->library('form_validation');
       $this->load->model("transaksi_model");
       $this->load->model("transaksidetail_model");
       $this->load->model("masterkriteriabuah_model"); 
       $this->load->model("user_model");
       if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
     }    
    public function index(){

        $data["kriteriabuah"] = $this->masterkriteriabuah_model->getAll();
        $this->load->view('admin/transaksi/add_remove', $data);
    }   
    public function store(){
        if(!empty($this->input->post('submit'))){

          $totalbuah = 0;
         
            $transaksi = $this->transaksi_model;
            $validation = $this->form_validation;
            $validation->set_rules($transaksi->rules());
            $notrans = $this->transaksi_model->generate_notrans();


           $jumlah = $_POST['jumlah'];
           $idbuah = $_POST['idbuah'];
           if(!empty($jumlah)){
               for($i = 0; $i < count($jumlah); $i++){
                   if(!empty($jumlah[$i])){
                     $totalbuah = $totalbuah  + $jumlah[$i];
                       $data = array(
                           'notrans' => $notrans,
                           'idbuah' => $idbuah[$i],
                           'jumlah' => $jumlah[$i],
                           'lastby' => $this->session->user_logged->id,
                           'lastupdate' => date("Y-m-d h:i:s"),
                         );

                      $this->db->insert('transaksi_detail',$data);
                   }
               }
           }
    
            if ($validation->run()) {
              $_POST['notrans'] = $notrans;
              $_POST['totalbuah'] = $totalbuah ;
                $transaksi->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

       

        }          
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect(site_url('admin/transaksi'));
        
    }       

    public function listdata()
    {
        $data["transaksi"] = $this->transaksi_model->getAll();
       $this->load->view("admin/transaksi/list", $data);
    }

    public function edit($notrans = null)
    {
  
      $data["kriteriabuah"] = $this->masterkriteriabuah_model->getAll();
        if (!isset($notrans)) redirect('admin/transaksi/listdata');
       
        $transaksi = $this->transaksi_model;
        $transaksidetail = $this->transaksidetail_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());

        if ($validation->run()) {
            $transaksi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data_edit["transaksi"] = $transaksi->getById($notrans);
        if (!$data_edit["transaksi"]) show_404();


        $data_edit_detail["transaksidetail"] = $transaksidetail->getById($notrans);
        if (!$data_edit_detail["transaksidetail"]) show_404();


        // print_r($data_edit_detail["transaksidetail"]);
        // die();
        
        $this->load->view("admin/transaksi/edit_form", 
        $result = array(
          'data' => $data,
          'data_edit_detail' => $data_edit_detail,
          'data_edit' =>  $data_edit
        )
      );
    }
}