<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "transaksi";


    public function rules()
    {
        return [
            ['field' => 'divisi',
            'label' => 'divisi',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($notrans)
    {
        return $this->db->get_where($this->_table, ["notrans" => $notrans])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->notrans = $post["notrans"];
        $this->tanggal = $post["tanggal"];
        $this->divisi = $post["divisi"];
        $this->totalbuah = $post["totalbuah"];

        $this->createby = $this->session->user_logged->id;
        $this->createdate = date("Y-m-d h:i:s");
        $this->lastby = $this->session->user_logged->id;
        $this->lastupdate = date("Y-m-d h:i:s");
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->notrans = $post["notrans"];
        $this->tanggal = $post["tanggal"];
        $this->divisi = $post["divisi"];
        $this->totalbuah = $post["totalbuah"];
        $this->lastby = $this->session->user_logged->id;
        $this->lastupdate = date("Y-m-d h:i:s");
        return $this->db->update($this->_table, $this, array('notrans' => $post['notrans']));
    }

    public function delete($notrans)
    {
        return $this->db->delete($this->_table, array("notrans" => $notrans));
    }

    function generate_notrans() {

 
        $kode_transaksi = '001';
        $type_transaksi = '01';
        $head = 'EPCS';

        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));

        $query = $this->db->query("SELECT * FROM transaksi ORDER BY lastupdate DESC LIMIT 1");
        $data = $query->row();
        $notrans = $data->notrans;

        $year = $date->format('Y');

        $kode_fix =  substr($notrans,12,6);
        $kode_fix =  $kode_fix + 1;
        $kode_fix = str_pad($kode_fix, 6, "0", STR_PAD_LEFT);
  
        $result = $head . $kode_transaksi . $type_transaksi . substr($year, 2, 2) . $kode_fix;
        return $result;
    }
}