<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksidetail_model extends CI_Model
{
    private $_table = "transaksi_detail";


    public function rules()
    {
        return [
            ['field' => 'notrans',
            'label' => 'notrans',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($notrans)
    {     

        $this->db->select('a.*,b.name');
        $this->db->from('transaksi_detail a'); 
        $this->db->join('master_kriteria_buah b', 'b.id=a.idbuah', 'left');
        $this->db->where('a.notrans',$notrans);    
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

}