<?php 

class Masterkriteriabuah_model extends CI_Model
{
    private $_table = "master_kriteria_buah";

    public $id;
    public $name;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       // $this->id = uniqid();
        $this->name = $post["name"];
        $this->createby = $this->session->user_logged->id;
        $this->createdate = date("Y-m-d h:i:s");
        $this->lastby = $this->session->user_logged->id;
        $this->lastupdate = date("Y-m-d h:i:s");
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->name = $post["name"];
        $this->lastby = $this->session->user_logged->id;
        $this->lastupdate = date("Y-m-d h:i:s");
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
}