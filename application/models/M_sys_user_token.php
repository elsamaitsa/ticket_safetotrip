<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sys_user_token extends CI_Model
{
    private $table = 'sys_user_token';

    public function all()
    {
        return $this->db->get($this->table);
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, ['id' => $id]);
    }

    public function CustomFind(array $attr)
    {
        return $this->db->get_where($this->table, $attr);
    }

    public function save($set, int $id = null)
    {
        if($id){
            $this->db->update($this->table, $set, ['id' => $id]);
        } else {
            $this->db->insert($this->table, $set);
        }
    }

    public function destroy($id)
    {
        $this->db->delete($this->table, ['email' => $id]);
    }
}
