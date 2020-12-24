<?php

class User_model extends CI_Model
{
    private $_table = "user";

    public $username;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[3]'],
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
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->createby = $this->session->user_logged->id;
        $this->createdate = date("Y-m-d h:i:s");
        $this->lastby = $this->session->user_logged->id;
        $this->lastupdate = date("Y-m-d h:i:s");
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->lastby = $this->session->user_logged->id;
        $this->lastupdate = date("Y-m-d h:i:s");
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function doLogin(){
		$post = $this->input->post();

        $this->db->where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        if($user){
            $isPasswordTrue = password_verify($post["password"], $user->password);
            if($isPasswordTrue){ 
                $this->session->set_userdata(['user_logged' => $user]);
                return true;
            }
		}
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}
